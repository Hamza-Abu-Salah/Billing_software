@extends('Admin.include.master')
@section('css')

@section('title')
    المستخدمين
@stop

@section('titleheader')
المستخدمين
@endsection

@section('linkcontentheader')
    <a href="{{ route('admin.invoices.index') }}">المستخدمين</a>
@endsection

@section('headercontent')
     قائمة المستخدمين
@endsection

<!-- Internal Data table css -->
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

<!-- row opened -->
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="col-sm-1 col-md-2">
                    @can('اضافة مستخدم')
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.users.create') }}">اضافة مستخدم</a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="file-datatable"
                    class="border-top-0  table table-bordered text-nowrap key-buttons border-bottom">
                        <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">اسم المستخدم</th>
                                <th class="wd-20p border-bottom-0">البريد الالكتروني</th>
                                <th class="wd-15p border-bottom-0">حالة المستخدم</th>
                                <th class="wd-15p border-bottom-0">نوع المستخدم</th>
                                <th class="wd-10p border-bottom-0">العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $user)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->Status == 'مفعل')
                                            <span class="label text-success d-flex">
                                                <div class="dot-label bg-success ml-1"></div>{{ $user->Status }}
                                            </span>
                                        @else
                                            <span class="label text-danger d-flex">
                                                <div class="dot-label bg-danger ml-1"></div>{{ $user->Status }}
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $v)
                                                <label class="btn btn-sm btn-success">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                    </td>

                                    <td>
                                        @can('تعديل مستخدم')
                                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-info"
                                                title="تعديل"><i class="las la-pen"></i></a>
                                        @endcan

                                        @can('حذف مستخدم')
                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-user_id="{{ $user->id }}" data-username="{{ $user->name }}"
                                                data-toggle="modal" href="#modaldemo8" title="حذف"><i
                                                    class="las la-trash"></i></a>
                                        @endcan
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

    <!-- Modal effects -->
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف المستخدم</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('admin.users.destroy', 'test') }}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="user_id" id="user_id" value="">
                        <input class="form-control" name="username" id="username" type="text" readonly>
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
<!-- /row -->
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
    $('#modaldemo8').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var user_id = button.data('user_id')
        var username = button.data('username')
        var modal = $(this)
        modal.find('.modal-body #user_id').val(user_id);
        modal.find('.modal-body #username').val(username);
    })

</script>


@endsection
