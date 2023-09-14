<?php

namespace App\Http\Controllers\Admin;

use App\Exports\InvoicesExport;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Invoice_attachment;
use App\Models\Invoive_details;
use App\Models\Product;
use App\Models\Section;
use App\Models\User;
use App\Notifications\AddInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::all();
        $Invoices = Invoice::all();
        return view('Admin.invoices.index',compact('Invoices','sections'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sections = Section::all();
        $products = Product::all();
        return view('Admin.invoices.add_invoices',compact('sections','products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $Invoices = Invoice::select("id")->where(['invoice_number' => $request->invoice_number])->orderby('id', 'DESC')->first();
            if (!empty($Invoices)) {
                return redirect()->back()
                    ->with(['error' => ''])
                    ->withInput();
            }
            $data_insert['invoice_number'] = $request->invoice_number;
            $data_insert['invoice_Date'] =date("Y-m-d");
            $data_insert['Due_date'] = date("Y-m-d");
            $data_insert['product'] = $request->product;
            $data_insert['section_id'] = $request->Section;
            $data_insert['Amount_collection'] = $request->Amount_collection;
            $data_insert['Amount_Commission'] = $request->Amount_Commission;
            $data_insert['Discount'] = $request->Discount;
            $data_insert['Value_VAT'] = $request->Value_VAT;
            $data_insert['Rate_VAT'] = $request->Rate_VAT;
            $data_insert['Total'] = $request->Total;
            $data_insert['Status'] = 'غير مدفوعة';
            $data_insert['Value_Status'] = 2;
            $data_insert['note'] = $request->note;
            $data_insert['Payment_Date'] = date("Y-m-d");
            Invoice::create($data_insert);

            $invoice_id = Invoice::latest()->first()->id;
            $data_insert['id_Invoice'] = $invoice_id;
            $data_insert['invoice_number'] = $request->invoice_number;
            $data_insert['product'] = $request->product;
            $data_insert['Section'] = $request->Section;
            $data_insert['Status'] = 'غير مدفوعة';
            $data_insert['Value_Status'] = 2;
            $data_insert['note'] = $request->note;
            $data_insert['user'] = Auth::user()->name;
            Invoive_details::create($data_insert);

            if ($request->hasFile('pic')) {

                $invoice_id = Invoice::latest()->first()->id;
                $image = $request->file('pic');
                $file_name = $image->getClientOriginalName();
                $invoice_number = $request->invoice_number;

                $attachments = new Invoice_attachment();
                $attachments->file_name = $file_name;
                $attachments->invoice_number = $invoice_number;
                $attachments->Created_by = Auth::user()->name;
                $attachments->invoice_id = $invoice_id;
                $attachments->save();

                // move pic
                $imageName = $request->pic->getClientOriginalName();
                $request->pic->move(public_path('Attachments/' . $invoice_number), $imageName);
            }

            // $user = User::get(); //هان الكل بشوف الاشعارات
            // $user = User::find(auth()->user()->id); // كل واحد بشوف الفواتير الخاصة فيه
            $user = User::get(); //الادمن فقط هوا الي بشوف الاشعارات وبروح على الاشعارات بعمل جملة شرطية
            $invoices = Invoice::latest()->first();
            Notification::send($user, new \App\Notifications\AddInvoice($invoices));

            return redirect()->route('admin.invoices.index')->with('success', 'تم إضافة البيانات بنجاح');
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => "عفوا حدث خطأما" . " " . $ex->getMessage()])->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $invoices = Invoice::where('id', $id)->first();
        return view('admin.invoices.status_update', compact('invoices'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $invoices = Invoice::where('id', $id)->first();
        $sections = Section::all();
        return view('Admin.invoices.edit_invoices', compact('sections', 'invoices'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $invoices = Invoice::findOrFail($request->invoice_id);
        $invoices_updated['invoice_number'] = $request->invoice_number ;
        $invoices_updated['invoice_Date'] = $request->invoice_Date ;
        $invoices_updated['Due_date'] = $request->Due_date ;
        $invoices_updated['product'] = $request->product ;
        $invoices_updated['section_id'] = $request->Section ;
        $invoices_updated['Amount_collection'] = $request->Amount_collection ;
        $invoices_updated['Amount_Commission'] = $request->Amount_Commission ;
        $invoices_updated['Discount'] = $request->Discount ;
        $invoices_updated['Value_VAT'] = $request->Value_VAT ;
        $invoices_updated['Rate_VAT'] = $request->Rate_VAT ;
        $invoices_updated['Total'] = $request->Total ;
        $invoices_updated['note'] = $request->note ;
        Invoice::where('id',$id)->update($invoices_updated);

        session()->flash('edit', 'تم تعديل الفاتورة بنجاح');
        return redirect()->route('admin.invoices.index')->with(['success'=>'تم تعديل الفاتورة بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->invoice_id;
        $invoices = Invoice::where('id', $id)->first();
        $Details = Invoice_attachment::where('invoice_id', $id)->first();

         $id_page =$request->id_page;


        if (!$id_page==2) {

        if (!empty($Details->invoice_number)) {

            Storage::disk('public_uploads')->deleteDirectory($Details->invoice_number);
        }

        $invoices->forceDelete();

        return redirect()->route('admin.invoices.index')->with(['success'=>'تم الحدف بنجاح']);

        }

        else {

            $invoices->Delete();
            return redirect()->route('admin.Archive.index')->with(['success'=>'تم الأرشفة بنجاح']);

        }
    }

    public function add_invoices($id)
    {
        $products = DB::table("products")->where("section_id", $id)->pluck("Product_name", "id");
        return json_encode($products);
    }

    public function Status_Update($id, Request $request)
    {
        $invoices = Invoice::findOrFail($id);

        if ($request->Status === 'مدفوعة') {
            $invoices_updated['Value_Status'] = 1 ;
            $invoices_updated['Status'] =  $request->Status ;
            $invoices_updated['Payment_Date'] =  $request->Payment_Date ;
            Invoice::where('id',$id)->update($invoices_updated);

            $invoices_insert['id_Invoice'] =  $request->invoice_id ;
            $invoices_insert['invoice_number'] =  $request->invoice_number ;
            $invoices_insert['product'] =  $request->product ;
            $invoices_insert['Section'] =  $request->Section ;
            $invoices_insert['Status'] =  $request->Status ;
            $invoices_insert['Value_Status'] =1 ;
            $invoices_insert['note'] =  $request->note ;
            $invoices_insert['Payment_Date'] =  $request->Payment_Date ;
            $invoices_insert['user'] = (Auth::user()->name);
            Invoive_details::create($invoices_insert);
        }

        else {
            $invoices_updated['Value_Status'] = 3 ;
            $invoices_updated['Status'] =  $request->Status ;
            $invoices_updated['Payment_Date'] =  $request->Payment_Date ;
            Invoice::where('id',$id)->update($invoices_updated);

            $invoices_insert['id_Invoice'] =  $request->invoice_id ;
            $invoices_insert['invoice_number'] =  $request->invoice_number ;
            $invoices_insert['product'] =  $request->product ;
            $invoices_insert['Section'] =  $request->Section ;
            $invoices_insert['Status'] =  $request->Status ;
            $invoices_insert['Value_Status'] =3 ;
            $invoices_insert['note'] =  $request->note ;
            $invoices_insert['Payment_Date'] =  $request->Payment_Date ;
            $invoices_insert['user'] = (Auth::user()->name);
            Invoive_details::create($invoices_insert);
        }
        return redirect()->route('admin.invoices.index')->with(['success'=>'تم تحديث الحالة بنجاح']);

    }

    public function Print_invoice($id)
    {
        $invoices = Invoice::where('id', $id)->first();
        return view('Admin.invoices.Print_invoice',compact('invoices'));
    }



}
