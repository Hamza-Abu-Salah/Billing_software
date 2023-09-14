@extends('Admin.include.master')

@section('title')
    أقسام - الفواتير
@endsection

@section('titleheader')
    الإعدادت
@endsection

@section('linkcontentheader')
    <a href="{{ route('admin.invoices.index') }}">الإعدادت</a>
@endsection

@section('headercontent')
    أقسام - الفواتير
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
                            data-bs-toggle="modal" href="#modaldemo8">إضافة قسم</a>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="file-datatable"
                            class="border-top-0  table table-bordered text-nowrap key-buttons border-bottom">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">إسم القسم</th>
                                    <th class="border-bottom-0">الملاحظات</th>
                                    <th class="border-bottom-0"></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $info)
                                    <tr>
                                        <td>{{ $info->id }}</td>
                                        <td>{{ $info->section_name }}</td>
                                        <td>{{ $info->description }}</td>
                                        <td>
                                            <a class="modal-effect btn-sm  btn-primary" data-id="{{ $info->id }}"
                                                data-section_name="{{ $info->section_name }}"
                                                data-description="{{ $info->description }}" data-id="{{ $info->id }}"
                                                data-section_name="{{ $info->section_name }}" data-bs-effect="effect-sign"
                                                data-bs-toggle="modal" href="#modaldemo9"><i class="las la-pen"></i></a>
                                            <a class="modal-effect btn-sm btn-danger"
                                            data-id="{{ $info->id }}"
                                                data-section_name="{{ $info->section_name }}"
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
                    <form action="{{ route('admin.section.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputEmail1">اسم القسم</label>
                            <input type="text" class="form-control" id="section_name" value="{{ old('section_name') }}"
                                name="section_name">
                            @error('section_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">ملاحظات</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="modal-footer">

                            <button type="submit" class="btn ripple btn-primary">إرسال</button>
                            <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">إغلاق</button>

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
                    <form action="section/update" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="">
                            <label for="exampleInputEmail1">اسم القسم</label>
                            <input type="text" class="form-control" id="section_name"
                                value="{{ old('section_name') }}" name="section_name">
                            @error('section_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">ملاحظات</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="modal-footer">

                            <button type="submit" class="btn ripple btn-primary">إرسال</button>
                            <button class="btn ripple btn-secondary" data-bs-dismiss="modal"
                                type="button">إغلاق</button>

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
                    <h6 class="modal-title">حدف قسم </h6><button aria-label="Close" class="close"
                        data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="section/destroy" method="post">
                        @method('delete')
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id" value="">
                            <p>هل انت متاكد من عملية الحذف ؟</p><br>
                            <input type="hidden" name="id" id="id" value="">
                            <input class="form-control" name="section_name" id="section_name" type="text" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-danger">تاكيد</button>
                        </div>
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
            var id = button.data('id')
            var section_name = button.data('section_name')
            var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #section_name').val(section_name);
            modal.find('.modal-body #description').val(description);
        })
    </script>
    <script>
        $('#modaldemo10').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var section_name = button.data('section_name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #section_name').val(section_name);
        })

    </script>
@endsection
