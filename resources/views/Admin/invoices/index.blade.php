@extends('Admin.include.master')

@section('title')
    قائمة الفواتير
@endsection


@section('linkcontentheader')
    <a href="{{ route('admin.invoices.index') }}">الفواتير</a>
@endsection

@section('headercontent')
    قائمة الفواتير
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
    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header" style="direction: rtl;">
                    <div class="col-md-3">
                        <a href="{{ route('admin.invoices.create') }}" class="btn btn-sm btn-primary" style="color:white"><i
                                class="fas fa-plus"></i>&nbsp; اضافة فاتورة</a>
                                <a class="modal-effect btn btn-sm btn-primary" href="{{ route('admin.invoice.export') }}"
                                style="color:white"><i class="fas fa-file-download"></i>&nbsp;تصدير اكسيل</a>
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
                                    <th class="border-bottom-0"></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Invoices as $info)
                                    <tr>
                                        <td>{{ $info->id }}</td>
                                        <td>{{ $info->invoice_number }} </td>
                                        <td>{{ $info->invoice_Date }}</td>
                                        <td>{{ $info->Due_date }}</td>
                                        <td>{{ $info->product }}</td>
                                        <td><a
                                                href="{{ route('admin.invoices.invoicesDetails', $info->id) }}">{{ $info->section->section_name }}</a>
                                        </td>
                                        <td>{{ $info->Discount }}</td>
                                        <td>{{ $info->Rate_VAT }}</td>
                                        <td>{{ $info->Value_VAT }}</td>
                                        <td>{{ $info->Total }}</td>
                                        <td>
                                            @if ($info->Value_Status == 1)
                                                <span class="text-success">{{ $info->Status }}</span>
                                            @elseif($info->Value_Status == 2)
                                                <span class="text-danger">{{ $info->Status }}</span>
                                            @else
                                                <span class="text-warning">{{ $info->Status }}</span>
                                            @endif

                                        </td>

                                        <td>{{ $info->note }}</td>
                                        <td>
                                            <div class="btn-group mb-2 mt-2">
                                                <button type="button" class="btn btn-info dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fe fe-more-horizontal"></i>
                                                </button>
                                                <ul class="dropdown-menu" style="">
                                                    <li><a href="{{ route('admin.invoices.edit', $info->id) }}"
                                                            class="dropdown-item" href="javascript:void(0);"><i
                                                            class="text-primary fas fa-edit"></i>&nbsp;&nbsp;تعديل
                                                        الفاتورة</a></li>
                                                    <li> <a class="modal-effect dropdown-item"
                                                            data-invoice_id="{{ $info->id }}"
                                                            data-bs-effect="effect-sign" data-bs-toggle="modal"
                                                            href="#modaldemo10"><i
                                                            class="text-danger fas fa-trash-alt"></i>&nbsp;&nbsp;حذف
                                                        الفاتورة</a></li>
                                                    <li><a href="{{ route('admin.invoices.show', $info->id) }}"
                                                            class="dropdown-item" href="javascript:void(0);"><i
                                                                class=" text-success fas fa-money-bill"></i>&nbsp;&nbsp;تغير
                                                            حالة
                                                            الدفع</a>
                                                    </li>

                                                    <li>
                                                        <a class="modal-effect dropdown-item"
                                                            data-invoice_id="{{ $info->id }}"
                                                            data-bs-effect="effect-sign" data-bs-toggle="modal"
                                                            href="#Transfer_invoice"><i
                                                            class="text-warning fas fa-exchange-alt"></i>&nbsp;&nbsp;نقل
                                                        الي
                                                        الارشيف</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('admin.invoices.Print_invoice',$info->id) }}"><i
                                                            class="text-success fas fa-print"></i>&nbsp;&nbsp;طباعة
                                                        الفاتورة
                                                    </li>
                                                </a>
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
    </div>
    <div class="modal fade" id="modaldemo10">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حدف الفاتورة </h6><button aria-label="Close" class="close"
                        data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
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
    <div class="modal fade" id="Transfer_invoice">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">أرشفة الفاتورة </h6><button aria-label="Close" class="close"
                        data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
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
    <!-- End Row -->
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
