<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\Customers_Report;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Invoice_attachmentController;
use App\Http\Controllers\Admin\InvoiceArchiveController;
use App\Http\Controllers\Admin\Invoices_Report;
use App\Http\Controllers\Admin\InvoicesController;
use App\Http\Controllers\Admin\Invoive_detailsController;
use App\Http\Controllers\Admin\Invoive_PController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::prefix('admin/')->middleware('auth')->name('admin.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('settings', SettingController::class);
    /*  start  invoices  */
    Route::resource('invoices', InvoicesController::class);
    Route::post('invoices/Status_Update/{id}', [InvoicesController::class, 'Status_Update'])->name('invoices.Status_Update');
    Route::get('invoice/export/', [Invoive_PController::class, 'export'])->name('invoice.export');
    Route::get('invoices/section/{id}', [InvoicesController::class, 'add_invoices'])->name('section.add_invoices');
    Route::get('invoices/Print_invoice/{id}', [InvoicesController::class, 'Print_invoice'])->name('invoices.Print_invoice');
    Route::get('invoicesP/Invoice_Paid', [Invoive_PController::class, 'Invoice_Paid'])->name('invoicesP.Invoice_Paid');
    Route::get('invoicesP/Invoice_UnPaid', [Invoive_PController::class, 'Invoice_unPaid'])->name('invoicesP.Invoice_UnPaid');
    Route::get('invoicesP/Invoice_Partial', [Invoive_PController::class, 'Invoice_Partial'])->name('invoicesP.Invoice_Partial');
    Route::get('invoicesP/MarkAsRead_al', [Invoive_PController::class, 'MarkAsRead_all'])->name('invoicesP.MarkAsRead_al');


    /*  end  invoices  */

    /*  start  Invoive_details  */
    Route::get('invoices/invoicesDetails/{id}', [Invoive_detailsController::class, 'invoicesDetails'])->name('invoices.invoicesDetails');
    Route::get('invoices/View_file/{invoices_number}/{file_name}', [Invoive_detailsController::class, 'open_file'])->name('invoices.open_file');
    Route::get('invoices/download/{invoices_number}/{file_name}', [Invoive_detailsController::class, 'download'])->name('invoices.download');
    Route::post('invoices/delete_file', [Invoive_detailsController::class, 'destroy'])->name('invoices.delete_file');

    /*  end  Invoive_details  */

    /*  start  Invoice_attachment  */
    Route::post('invoices/InvoiceAttachments', [Invoice_attachmentController::class, 'store'])->name('invoices.InvoiceAttachments');
    /*  end  Invoice_attachment  */

    /*  start  Section  */
    Route::resource('section', SectionController::class);

    /*  end  Section  */

    /*  start  product  */
    Route::resource('product', ProductController::class);
    /*  end  product  */

    /*  start  Archive  */
    Route::resource('Archive', InvoiceArchiveController::class);

    /*  end  Archive  */
    /*  start  permission  */
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    /*  end  permission  */

/*  start  reports  */
    Route::get('invoices_report',[Invoices_Report::class,'index'])->name('invoices_report.index');
    Route::post('Search_invoices',[Invoices_Report::class,'Search_invoices'])->name('invoices_report.Search_invoices');
    Route::get('customers_report',[Customers_Report::class,'index'])->name('customers_report.index');
    Route::post('Search_customers',[Customers_Report::class,'Search_customers'])->name('Search_customers.search');
    /*  end  reports  */
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    Route::resource('products', 'ProductController');
});
