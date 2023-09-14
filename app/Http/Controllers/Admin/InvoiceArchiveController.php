<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::onlyTrashed()->get();
        // onlyTrashed()->get(); =>يعني هات الفواتير الي عمل عليها سوفت ديليت
        return view('Admin.Invoices.Archive_Invoices ',compact('invoices'));
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
        $id = $request->invoice_id;
        $flight = Invoice::withTrashed()->where('id', $id)->restore();
        // withTrashed=>يعني لو سمحت فوق على جدول االداتا بيز وشوفلي اي عمود عندو ديليت ات
        //restore=>استعادة
        return redirect()->route('admin.invoices.index')->with(['success'=>'تم استعادة الفاتورة بنجاح']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $invoices = Invoice::withTrashed()->where('id',$request->invoice_id)->first();
        // withTrashed=>دور عالشي الي فيه ارشفه
         $invoices->forceDelete();
         return redirect()->route('admin.Archive.index')->with(['success'=>'تم حذف الفاتورة بنجاح']);

    }
}
