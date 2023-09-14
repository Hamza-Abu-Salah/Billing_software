@extends('Admin.include.master')

@section('title')
    منتجات - الفواتير
@endsection

@section('titleheader')
    الإعدادت
@endsection

@section('linkcontentheader')
    <a href="{{ route('admin.invoices.index') }}">الإعدادت</a>
@endsection

@section('headercontent')
منتجات - الفواتير
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
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header" style="direction: rtl;">
                    <div class="col-md-3">
                        <a class="modal-effect btn btn-outline-primary btn-block" data-bs-effect="effect-sign"
                            data-bs-toggle="modal" href="#modaldemo8">إضافة منتج</a>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="file-datatable"
                            class="border-top-0  table table-bordered text-nowrap key-buttons border-bottom">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">إسم المنتج</th>
                                    <th class="border-bottom-0">إسم القسم</th>
                                    <th class="border-bottom-0">الملاحظات</th>
                                    <th class="border-bottom-0"></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $info)
                                    <tr>
                                        <td>{{ $info->id }}</td>
                                        <td>{{ $info->Product_name }}</td>
                                        <td>{{ $info->section->section_name }}</td>
                                        <td>{{ $info->description }}</td>
                                        <td>
                                            <a class="modal-effect btn-sm  btn-primary"  data-bs-effect="effect-sign"
                                                data-bs-toggle="modal" href="#modaldemo9"
                                                data-name="{{ $info->Product_name }}" data-pro_id="{{ $info->id }}"
                                                data-section_name="{{ $info->section->section_name }}"
                                                data-description="{{ $info->description }}"><i class="las la-pen"></i>
                                            </a>
                                            <a class="modal-effect btn-sm btn-danger"
                                            data-pro_id="{{ $info->id }}"
                                            data-product_name="{{ $info->Product_name }}"
                                            data-bs-effect="effect-sign"
                                                data-bs-toggle="modal" href="#modaldemo10"><i class="las la-trash"></i></a>
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
    <div class="modal fade" id="modaldemo8">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">إضافة قسم </h6><button aria-label="Close" class="close" data-bs-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.product.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">اسم المنتج</label>
                                <input type="text" class="form-control" id="Product_name" name="Product_name" required>
                            </div>

                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">القسم</label>
                            <select name="section_id" id="section_id" class="form-control" required>
                                <option value="" selected disabled> --حدد القسم--</option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                                @endforeach
                            </select>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">ملاحظات</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">تاكيد</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="modaldemo9">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">تعديل قسم </h6><button aria-label="Close" class="close" data-bs-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action='product/update' method="post">
                        @method('PUT')
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="title">اسم المنتج :</label>

                                <input type="hidden" class="form-control" name="pro_id" id="pro_id" value="">

                                <input type="text" class="form-control" name="Product_name" id="Product_name">
                            </div>

                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">القسم</label>
                            <select name="section_name" id="section_name" class="form-select my-1 mr-sm-2" required>
                                @foreach ($sections as $section)
                                    <option>{{ $section->section_name }}</option>
                                @endforeach
                            </select>

                            <div class="form-group">
                                <label for="des">ملاحظات :</label>
                                <textarea name="description" cols="20" rows="5" id='description'
                                    class="form-control"></textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">تعديل البيانات</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="modaldemo10">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حدف منتج </h6><button aria-label="Close" class="close"
                        data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="product/destroy" method="post">
                        @method('delete')
                        @csrf
                        <div class="modal-body">
                            <p>هل انت متاكد من عملية الحذف ؟</p><br>
                            <input type="hidden" name="pro_id" id="pro_id" value="">
                            <input class="form-control" name="product_name" id="product_name" type="text" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-danger">تاكيد</button>
                        </div>
                    </form>
            </div>

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
         $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var Product_name = button.data('name')
            var section_name = button.data('section_name')
            var pro_id = button.data('pro_id')
            var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #Product_name').val(Product_name);
            modal.find('.modal-body #section_name').val(section_name);
            modal.find('.modal-body #description').val(description);
            modal.find('.modal-body #pro_id').val(pro_id);
        })


        $('#modaldemo10').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var pro_id = button.data('pro_id')
            var product_name = button.data('product_name')
            var modal = $(this)

            modal.find('.modal-body #pro_id').val(pro_id);
            modal.find('.modal-body #product_name').val(product_name);
        })

    </script>

@endsection
