@extends('Admin.include.master')
@section('css')
<!--Internal  Font Awesome -->
<link href="{{asset('adminassets/assets/plugins/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
<!--Internal  treeview -->
<link href="{{asset('adminassets/assets/plugins/treeview/treeview-rtl.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('page-header')
@section('title')
    صلاحيات المستخدمين
@stop
@section('linkcontentheader')
    <a href="{{ route('admin.invoices.index') }}">المستخدمين</a>
@endsection

@section('headercontent')
عرض الصلاحيات
@endsection

@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12">
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    <div class="pull-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.roles.index') }}">رجوع</a>
                    </div>
                </div>
                <div class="row">
                    <!-- col -->
                    <div class="col-lg-4">
                        <ul id="treeview1">
                            <li><a href="#">{{ $role->name }}</a>
                                <ul>
                                    @if(!empty($rolePermissions))
                                    @foreach($rolePermissions as $v)
                                    <li>{{ $v->name }}</li>
                                    @endforeach
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /col -->
                </div>
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
<script src="{{asset('adminassets/assets/plugins/treeview/treeview.js')}}"></script>

@endsection
