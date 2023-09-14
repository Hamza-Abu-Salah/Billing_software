@extends('Admin.include.master')

@section('title')
    لوحة تحكم - برنامج الفواتير
@endsection

@section('content')
    <!-- main-content -->


    <!-- container -->


    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Hi, welcome back!</h2>
                <p class="mg-b-0">Sales monitoring dashboard template.</p>
            </div>
        </div>
        <div class="main-dashboard-header-right">
            <div>
                <label class="tx-13">Customer Ratings</label>
                <div class="main-star">
                    <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i
                        class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i
                        class="typcn typcn-star"></i> <span>(14,873)</span>
                </div>
            </div>
            <div>
                <label class="tx-13">Online Sales</label>
                <h5>563,275</h5>
            </div>
            <div>
                <label class="tx-13">Offline Sales</label>
                <h5>783,675</h5>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-primary-gradient">
                <div class="px-3 pt-3  pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">إجمالي الفواتير</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 fw-bold mb-1 text-white">${{number_format(\App\Models\Invoice::sum('Total'),2)  }}</h4>
                                <p class="mb-0 tx-12 text-white op-7">{{ \App\Models\Invoice::count() }}</p>
                            </div>
                            <span class="float-end my-auto ms-auto">
                                <i class="fas fa-arrow-circle-up text-white"></i>
                                <span class="text-white op-7">100%</span>
                            </span>
                        </div>
                    </div>
                </div>
                <span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-danger-gradient">
                <div class="px-3 pt-3  pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">الفواتير الغير مدفوعة</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                {{-- {{ number_format(\App\Models\Invoice::where('Value_Status', 2)->sum('Total'), 2) }} --}}
                                {{-- {{ \App\Models\Invoice::where('Value_Status', 2)->count()  }} --}}
                                <h4 class="tx-20 fw-bold mb-1 text-white"> $</h4>
                                <p class="mb-0 tx-12 text-white op-7"></p>
                            </div>
                            <span class="float-end my-auto ms-auto">
                                <i class="fas fa-arrow-circle-down text-white"></i>
                                <span class="text-white op-7">
                                    {{-- {{ round(\App\Models\Invoice::where('Value_Status', 2)->count() / \App\Models\Invoice::count() * 100 ) }} --}}

                                    {{-- @php
                                    $count_all= \App\Models\Invoice::count();
                                    $count_invoices2 = \App\Models\Invoice::where('Value_Status', 2)->count();

                                    if($count_invoices2 == 0){
                                       echo $count_invoices2 = 0;
                                    }
                                    else{
                                       echo $count_invoices2 = $count_invoices2 / $count_all *100;
                                    }
                                    @endphp --}}
                                    %
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                <span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-success-gradient">
                <div class="px-3 pt-3  pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">الفواتير المدفوعة</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                {{-- {{ number_format(\App\Models\Invoice::where('Value_Status', 1)->sum('Total'), 2) }} --}}
                                {{-- {{ \App\Models\Invoice::where('Value_Status', 1)->count()  }} --}}
                                <h4 class="tx-20 fw-bold mb-1 text-white">$</h4>
                                <p class="mb-0 tx-12 text-white op-7"></p>
                            </div>
                            <span class="float-end my-auto ms-auto">
                                <i class="fas fa-arrow-circle-up text-white"></i>
                                <span class="text-white op-7">
                                    {{-- @php
                                    $count_all= \App\Models\Invoice::count();
                                    $count_invoices2 = \App\Models\Invoice::where('Value_Status', 1)->count();

                                    if($count_invoices2 == 0){
                                       echo $count_invoices2 = 0;
                                    }
                                    else{
                                       echo $count_invoices2 = $count_invoices2 / $count_all *100;
                                    }
                                    @endphp --}}
                                    {{-- {{ round(\App\Models\Invoice::where('Value_Status', 1)->count() / \App\Models\Invoice::count() * 100 ) }} --}}

                                    %</span>
                            </span>
                        </div>
                    </div>
                </div>
                <span id="compositeline3" class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-warning-gradient">
                <div class="px-3 pt-3  pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">الفواتير المدفوعة جزئيا</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                {{-- {{ number_format(\App\Models\Invoice::where('Value_Status', 3)->sum('Total'), 2) }} --}}
                                {{-- {{ \App\Models\Invoice::where('Value_Status', 3)->count()  }} --}}
                                <h4 class="tx-20 fw-bold mb-1 text-white">$</h4>
                                <p class="mb-0 tx-12 text-white op-7"></p>
                            </div>
                            <span class="float-end my-auto ms-auto">
                                <i class="fas fa-arrow-circle-down text-white"></i>
                                <span class="text-white op-7">
                                    {{-- @php
                                    $count_all= \App\Models\Invoice::count();
                                    $count_invoices2 = \App\Models\Invoice::where('Value_Status', 1)->count();

                                    if($count_invoices2 == 0){
                                       echo $count_invoices2 = 0;
                                    }
                                    else{
                                       echo $count_invoices2 = $count_invoices2 / $count_all *100;
                                    }
                                    @endphp --}}
                                    {{--  {{ round(\App\Models\Invoice::where('Value_Status', 3)->count() / \App\Models\Invoice::count() * 100 ) }} --}}

                                    %
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                <span id="compositeline4" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
            </div>
        </div>
    </div>
    <!-- row closed -->

    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-md-12 col-lg-12 col-xl-7">
            <div class="card">
                <div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-0">نسبة احصائية الفواتير</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>

                </div>
                <div class="card-body">
                    {!! $chartjs->render() !!}

                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-5">
            <div class="card card-dashboard-map-one">
                <label class="main-content-label">نسبة احصائية الفواتير</label>
                <div class="">
                    {!! $chartjs_2->render() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

    <!-- /main-content -->
@endsection
