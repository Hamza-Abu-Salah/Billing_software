<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Invoice_attachment;
use App\Models\Invoive_details;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class Invoive_detailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $invoices = Invoice_attachment::findOrFail($request->id_file);
        $invoices->delete();
        Storage::disk('public_uploads')->delete($request->invoice_number.'/'.$request->file_name);
        return redirect()->back()->with(['success'=>'تم حذف المرفق بنجاح']);
    }

    public function invoicesDetails($id)
    {
        $invoices = Invoice::where('id',$id)->first();
        $details  = Invoive_details::where('id_Invoice',$id)->get();
        $attachments  = Invoice_attachment::where('invoice_id',$id)->get();
        return view('Admin.invoices.invoicesDetails',compact('invoices','details','attachments'));
    }

    public function download($invoices_number,$file_name)

    {
        $contents= Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($invoices_number.'/'.$file_name);
        // $contents = Storage::disk('public_uploads')->put('download',$invoices_number.'/'.$file_name);

        return response()->download( $contents);
    }

    public function open_file($invoices_number,$file_name)
    {
        // $files = Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($invoices_number.'/'.$file_name);
        $files = Storage::disk('public_uploads')->put('open_file',$invoices_number.'/'.$file_name);
        return response()->file($files);
    }
}
