<?php

namespace App\Http\Controllers\Admin;

use App\Exports\InvoicesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class Invoive_PController extends Controller
{
    public function Invoice_Paid()
    {
        $invoices = Invoice::where('Value_Status', 1)->get();
        return view('admin.invoices.invoices_paid',compact('invoices'));
    }

    public function Invoice_unPaid()
    {
        $invoices = Invoice::where('Value_Status',2)->get();
        return view('admin.invoices.invoices_unpaid',compact('invoices'));
    }

    public function Invoice_Partial()
    {
        $invoices = Invoice::where('Value_Status',3)->get();
        return view('admin.invoices.invoices_Partial',compact('invoices'));
    }
    public function export()
    {
        return Excel::download(new InvoicesExport, 'قائمة الفواتير.xlsx');
    }

    public function MarkAsRead_all (Request $request)
    {

        $userUnreadNotification= auth()->user()->unreadNotifications;

        if($userUnreadNotification) {
            $userUnreadNotification->markAsRead();
            return back();
        }


    }
}
