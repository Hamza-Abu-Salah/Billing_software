@extends('Admin.include.master')

@section('title')
    أرشفة الفواتير
@endsection


@section('linkcontentheader')
    <a href="{{ route('admin.invoices.index') }}">الفواتير</a>
@endsection

@section('headercontent')
أرشفة الفواتير
@endsection

@section('css')
    <!-- Internal Data table css -->
    <link href="{{ asset('adminassets/assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminassets/assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminassets/assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminassets/assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminassets/assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminassets/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ asset('adminassets/assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">

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
                                    $i++
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
                                                    <li><a
                                                            class="modal-effect dropdown-item" href="#Transfer_invoice" data-invoice_id="{{ $invoice->id }}"
                                                            data-bs-effect="effect-sign" data-bs-toggle="modal"><i
                                                            class="text-warning fas fa-exchange-alt"></i>&nbsp;&nbsp;نقل الي
                                                        الفواتير</a>

                                                    </li>
                                                    <li> <a class="modal-effect dropdown-item" href="#delete_invoice"
                                                        data-invoice_id="{{ $invoice->id }}"
                                                        data-bs-effect="effect-sign" data-bs-toggle="modal" ><i
                                                            class="text-danger fas fa-trash-alt"></i>&nbsp;&nbsp;حذف
                                                        الفاتورة</a></li>


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
    <div class="modal fade" id="delete_invoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">حذف الفاتورة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('admin.Archive.destroy', 'test') }}" method="post">
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

    <!--الغاء الارشفة-->
    <div class="modal fade" id="Transfer_invoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">الغاء ارشفة الفاتورة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="{{ route('admin.Archive.update', 'test') }}" method="post">
                        @method('PUT')
                        @csrf
                </div>
                <div class="modal-body">
                    هل انت متاكد من عملية الغاء الارشفة ؟
                    <input type="hidden" name="invoice_id" id="invoice_id" value="">

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
        $('#delete_invoice').on('show.bs.modal', function(event) {
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
