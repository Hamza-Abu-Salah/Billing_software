@extends('Admin.include.master')
@section('title')
    الفواتير المدفوعة جزئيا
@stop
@section('linkcontentheader')
    <a href="{{ route('admin.invoices.index') }}"> الفواتير المدفوعة جزئيا</a>
@endsection

@section('headercontent')
    قائمة الفواتير
@endsection
@section('content')

    <!-- row -->
@section('content')

    <!-- row -->
    <div class="row">
        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <a href="invoices/create" class="modal-effect btn btn-sm btn-primary" style="color:white"><i
                                class="fas fa-plus"></i>&nbsp; اضافة فاتورة</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="file-datatable"
                            class="border-top-0  table table-bordered text-nowrap key-buttons border-bottom">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">رقم الفاتورة</th>
                                    <th class="border-bottom-0">تاريخ القاتورة</th>
                                    <th class="border-bottom-0">تاريخ الاستحقاق</th>
                                    <th class="border-bottom-0">المنتج</th>
                                    <th class="border-bottom-0">القسم</th>
                                    <th class="border-bottom-0">الخصم</th>
                                    <th class="border-bottom-0">نسبة الضريبة</th>
                                    <th class="border-bottom-0">قيمة الضريبة</th>
                                    <th class="border-bottom-0">الاجمالي</th>
                                    <th class="border-bottom-0">الحالة</th>
                                    <th class="border-bottom-0">ملاحظات</th>
                                    <th class="border-bottom-0">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($invoices as $invoice)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $invoice->invoice_number }} </td>
                                        <td>{{ $invoice->invoice_Date }}</td>
                                        <td>{{ $invoice->Due_date }}</td>
                                        <td>{{ $invoice->product }}</td>
                                        <td><a
                                                href="{{ url('InvoicesDetails') }}/{{ $invoice->id }}">{{ $invoice->section->section_name }}</a>
                                        </td>
                                        <td>{{ $invoice->Discount }}</td>
                                        <td>{{ $invoice->Rate_VAT }}</td>
                                        <td>{{ $invoice->Value_VAT }}</td>
                                        <td>{{ $invoice->Total }}</td>
                                        <td>
                                            @if ($invoice->Value_Status == 1)
                                                <span class="text-success">{{ $invoice->Status }}</span>
                                            @elseif($invoice->Value_Status == 2)
                                                <span class="text-danger">{{ $invoice->Status }}</span>
                                            @else
                                                <span class="text-warning">{{ $invoice->Status }}</span>
                                            @endif

                                        </td>

                                        <td>{{ $invoice->note }}</td>
                                        <td>
                                            <div class="btn-group mb-2 mt-2">
                                                <button type="button" class="btn btn-info dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fe fe-more-horizontal"></i>
                                                </button>
                                                <ul class="dropdown-menu" style="">
                                                    <li><a href="{{ route('admin.invoices.edit', $invoice->id) }}"
                                                            class="dropdown-item" href="javascript:void(0);">
                                                            <i
                                                            class="text-primary fas fa-edit"></i>&nbsp;&nbsp;تعديل
                                                        الفاتورة</a></li>
                                                    <li> <a class="modal-effect dropdown-item"
                                                            data-invoice_id="{{ $invoice->id }}"
                                                            data-bs-effect="effect-sign" data-bs-toggle="modal"
                                                            href="#modaldemo10"> <i
                                                            class="text-danger fas fa-trash-alt"></i>&nbsp;&nbsp;حذف
                                                        الفاتورة</a></li>
                                                    <li><a href="{{ route('admin.invoices.show', $invoice->id) }}"
                                                            class="dropdown-item" href="javascript:void(0);"><i
                                                            class=" text-success fas fa-money-bill"></i>&nbsp;&nbsp;تغير
                                                        حالة
                                                        الدفع</a></li>

                                                    <li>
                                                        <a class="modal-effect dropdown-item"
                                                            data-invoice_id="{{ $invoice->id }}"
                                                            data-bs-effect="effect-sign" data-bs-toggle="modal"
                                                            href="#Transfer_invoice"><i
                                                            class="text-warning fas fa-exchange-alt"></i>&nbsp;&nbsp;نقل
                                                        الي
                                                        الارشيف</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.invoices.Print_invoice', $invoice->id) }}"><i
                                                                class="text-success fas fa-print"></i>&nbsp;&nbsp;طباعة
                                                            الفاتورة
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>

    <!-- حذف الفاتورة -->
    <div class="modal fade" id="modaldemo10" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">حذف الفاتورة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('admin.invoices.destroy', 'test') }}" method="post">
                        @method('delete')
                        @csrf
                </div>
                <div class="modal-body">
                    هل انت متاكد من عملية الحذف ؟
                    <input type="hidden" name="invoice_id" id="invoice_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                    <button type="submit" class="btn btn-danger">تاكيد</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- ارشيف الفاتورة -->
    <div class="modal fade" id="Transfer_invoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ارشفة الفاتورة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('admin.invoices.destroy', 'test') }}" method="post">
                        @method('delete')
                        @csrf
                </div>
                <div class="modal-body">
                    هل انت متاكد من عملية الارشفة ؟
                    <input type="hidden" name="invoice_id" id="invoice_id" value="">
                    <input type="hidden" name="id_page" id="id_page" value="2">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                    <button type="submit" class="btn btn-success">تاكيد</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <script src="{{ asset('adminassets/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminassets/assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('adminassets/assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminassets//assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('adminassets/assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('adminassets/assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('adminassets/assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('adminassets/assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('adminassets/assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('adminassets/assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('adminassets/assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminassets/assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ asset('adminassets/assets/js/table-data.js') }}"></script>
    <!--Internal  Notify js -->
    <script src="{{ asset('adminassets/assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ asset('adminassets/assets/plugins/notify/js/notifit-custom.js') }}"></script>
    <script>
        $('#modaldemo10').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var invoice_id = button.data('invoice_id')
            var modal = $(this)
            modal.find('.modal-body #invoice_id').val(invoice_id);
        })
    </script>

    <script>
        $('#Transfer_invoice').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var invoice_id = button.data('invoice_id')
            var modal = $(this)
            modal.find('.modal-body #invoice_id').val(invoice_id);
        })
    </script>

@endsection
