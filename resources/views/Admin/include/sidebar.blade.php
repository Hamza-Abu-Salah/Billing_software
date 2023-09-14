<aside class="app-sidebar ps ps--active-y">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="index.html"><img
                src="{{ asset('adminassets/assets/img/brand/logo.png') }}" class="main-logo" alt="logo"></a>
        <a class="desktop-logo logo-dark active" href="index.html"><img
                src="{{ asset('adminassets/assets/img/brand/logo-white.png') }}" class="main-logo" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="index.html"><img
                src="{{ asset('adminassets/assets/img/brand/favicon.png') }}" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="index.html"><img
                src="{{ asset('adminassets/assets/img/brand/favicon-white.png') }}" alt="logo"></a>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="main-img-user avatar-xl">
                    <img alt="user-img" src="{{ asset('adminassets/assets/img/users/6.jpg') }}"><span
                        class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                    <h4 class="fw-semibold mt-3 mb-0">{{ auth()->user()->name }}</h4>
                    <span class="mb-0 text-muted">{{ auth()->user()->email }}</span>
                </div>
            </div>
        </div>
        <div class="slide-left disabled d-none" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                width="24" height="24" viewBox="0 0 24 24">
                <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
            </svg></div>
        <ul class="side-menu" style="margin-right: 0px; margin-left: 0px;">
            <li class="side-item side-item-category">Main</li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.dashboard') }}"><svg xmlns="http://www.w3.org/2000/svg"
                        class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"></path>
                        <path
                            d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z">
                        </path>
                    </svg><span class="side-menu__label">الرئيسية</span><span
                        class="badge bg-success text-light bg-side-text">1</span></a>
            </li>
            @can('الفواتير')
                <li class="slide">

                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none"></path>
                            <path
                                d="M12 4c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm3.5 4c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5-1.5-.67-1.5-1.5.67-1.5 1.5-1.5zm-7 0c.83 0 1.5.67 1.5 1.5S9.33 11 8.5 11 7 10.33 7 9.5 7.67 8 8.5 8zm3.5 9.5c-2.33 0-4.32-1.45-5.12-3.5h1.67c.7 1.19 1.97 2 3.45 2s2.76-.81 3.45-2h1.67c-.8 2.05-2.79 3.5-5.12 3.5z"
                                opacity=".3"></path>
                            <circle cx="15.5" cy="9.5" r="1.5"></circle>
                            <circle cx="8.5" cy="9.5" r="1.5"></circle>
                            <path
                                d="M12 16c-1.48 0-2.75-.81-3.45-2H6.88c.8 2.05 2.79 3.5 5.12 3.5s4.32-1.45 5.12-3.5h-1.67c-.69 1.19-1.97 2-3.45 2zm-.01-14C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z">
                            </path>
                        </svg><span class="side-menu__label">الفواتير</span><i class="angle fe fe-chevron-down"></i></a>

                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="tab-menu-heading p-0 pb-2 border-0">
                                <div class="tabs-menu ">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs">
                                        <li><a href="#side11" class="active" data-bs-toggle="tab"><i
                                                    class="fe fe-airplay"></i>
                                                <p>Home</p>
                                            </a></li>
                                        <li><a href="#side12" data-bs-toggle="tab"><i class="fe fe-package"></i>
                                                <p>Events</p>
                                            </a></li>
                                        <li><a href="#side13" data-bs-toggle="tab"><i class="fe fe-move"></i>
                                                <p>Activity</p>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane tab-content-show active" id="side11">
                                        <ul class="sidemenu-list">
                                            <li class="side-menu__label1"><a href="javascript:void(0);">Icons</a></li>
                                            @can('قائمة الفواتير')
                                                <li><a class="slide-item" href="{{ route('admin.invoices.index') }}">قائمة
                                                        الفواتير</a></li>
                                            @endcan
                                            @can('الفواتير المدفوعة')
                                                <li><a class="slide-item"
                                                        href="{{ route('admin.invoicesP.Invoice_Paid') }}">الفواتير
                                                        المدفوعة
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('الفواتير الغير مدفوعة')
                                                <li>
                                                    <a class="slide-item"
                                                        href="{{ route('admin.invoicesP.Invoice_UnPaid') }}"> الفواتير غير
                                                        مدفوعة
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('الفواتير المدفوعة جزئيا')
                                                <li>
                                                    <a class="slide-item"
                                                        href="{{ route('admin.invoicesP.Invoice_Partial') }}"> الفواتير
                                                        المدفوعة جزئيا
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('ارشيف الفواتير')
                                                <li>
                                                    <a class="slide-item" href="{{ route('admin.Archive.index') }}">أرشفة
                                                        الفواتير
                                                    </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            @endcan

            @can('التقارير')
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none"></path>
                            <path d="M4 12c0 4.08 3.06 7.44 7 7.93V4.07C7.05 4.56 4 7.92 4 12z" opacity=".3"></path>
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93s3.05-7.44 7-7.93v15.86zm2-15.86c1.03.13 2 .45 2.87.93H13v-.93zM13 7h5.24c.25.31.48.65.68 1H13V7zm0 3h6.74c.08.33.15.66.19 1H13v-1zm0 9.93V19h2.87c-.87.48-1.84.8-2.87.93zM18.24 17H13v-1h5.92c-.2.35-.43.69-.68 1zm1.5-3H13v-1h6.93c-.04.34-.11.67-.19 1z">
                            </path>
                        </svg><span class="side-menu__label">التقارير</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="tab-menu-heading p-0 pb-2 border-0">
                                <div class="tabs-menu ">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs">
                                        <li><a href="#side17" class="active" data-bs-toggle="tab"><i
                                                    class="fe fe-airplay"></i>
                                                <p>Home</p>
                                            </a></li>
                                        <li><a href="#side18" data-bs-toggle="tab"><i class="fe fe-package"></i>
                                                <p>Events</p>
                                            </a></li>
                                        <li><a href="#side19" data-bs-toggle="tab"><i class="fe fe-move"></i>
                                                <p>Activity</p>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane tab-content-show active" id="side17">
                                        <ul class="sidemenu-list">

                                            <li class="side-menu__label1">
                                                <a href="javascript:void(0);">تقارير
                                                    الفواتير
                                                </a>
                                            </li>

                                            @can('تقرير الفواتير')
                                                <li>
                                                    <a class="slide-item" href="{{ route('admin.invoices_report.index') }}">
                                                        تقارير الفواتير
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('تقرير العملاء')
                                                <li><a class="slide-item" href="{{ route('admin.customers_report.index') }}">تقارير العملاء</a></li>
                                            @endcan
                                        </ul>
                                    </div>
                                    <div class="tab-pane tab-content-double" id="side18">
                                        <h5 class="mt-3 mb-4 tx-16">Events</h5>
                                        <div class="latest-timeline">
                                            <div class="timeline">
                                                <div class="mt-0 event-text">
                                                    <h6 class="mb-0"><a target="_blank" href="#"
                                                            class="timeline-head">Employees Meeting</a></h6>
                                                    <small class="text-muted mb-2">20 Feb, 2019</small>
                                                    <p class="tx-13">sed do eiusmod tempor incididunt ut labore et. </p>
                                                </div>
                                                <div class="event-text">
                                                    <h6 class="mb-0"><a href="#"
                                                            class="timeline-head">Anniversary Celebration</a></h6>
                                                    <small class="mb-2 text-muted">14 Feb, 2019</small>
                                                    <p class="tx-13">sed do eiusmod tempor magna aliqua nisi ut. </p>
                                                </div>
                                                <div class="event-text">
                                                    <h6 class="mb-0"><a href="#" class="timeline-head">Best
                                                            Employee Announcement</a></h6>
                                                    <small class="mb-2 text-muted">13 Feb, 2019</small>
                                                    <p class="tx-13">sed do eiusmod tempor incididunt ut aliquip.</p>
                                                </div>
                                                <div class="event-text">
                                                    <h6 class="mb-0"><a href="#" class="timeline-head">Weekend
                                                            trip</a></h6>
                                                    <small class="mb-2 text-muted">11 Feb, 2019</small>
                                                    <p class="tx-13">sed do eiusmod tempor incididunt ut aliquip.</p>
                                                </div>
                                                <div class="event-text">
                                                    <h6 class="mb-0"><a href="#" class="timeline-head">New
                                                            Project Started..</a></h6>
                                                    <small class="mb-2 text-muted">09 Feb, 2019</small>
                                                    <p class="tx-13">sed do eiusmod tempor incididunt ut aliquip.</p>
                                                </div>
                                                <div class="mb-0 event-text">
                                                    <h6 class="mb-0"><a href="#" class="timeline-head">Gradening
                                                            working</a></h6>
                                                    <small class="mb-2 text-muted">02 Feb, 2019</small>
                                                    <p class="tx-13">sed do eiusmod tempor aliqua nisi ut aliquip. </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane tab-content-double" id="side19">
                                        <h5 class="mt-3 mb-4 tx-16">Activity</h5>
                                        <div class="activity mt-3 p-0">
                                            <img src="{{ asset('adminassets/assets/img/users/8.jpg') }}" alt=""
                                                class="img-activity">
                                            <div class="time-activity">
                                                <div class="item-activity">
                                                    <p class="mb-0 tx-13"><b>Samantha Melon</b> Add a new projects <b>
                                                            AngularJS Template</b></p>
                                                    <small class="text-muted ">30 mins ago</small>
                                                </div>
                                            </div>
                                            <img src="{{ asset('adminassets/assets/img/users/5.jpg') }}" alt=""
                                                class="img-activity">
                                            <div class="time-activity">
                                                <div class="item-activity">
                                                    <p class="mb-0 tx-13"><b>Allie Grater</b> Add a new projects <b>Free
                                                            HTML Template</b></p>
                                                    <small class="text-muted ">1 days ago</small>
                                                </div>
                                            </div>
                                            <img src="{{ asset('adminassets/assets/img/users/6.jpg') }}" alt=""
                                                class="img-activity">
                                            <div class="time-activity">
                                                <div class="item-activity">
                                                    <p class="mb-0 tx-13"><b>Gabe Lackmen</b> Add a new projects <b>Free
                                                            PSD Template</b></p>
                                                    <small class="text-muted ">3 days ago</small>
                                                </div>
                                            </div>
                                            <img src="{{ asset('adminassets/assets/img/users/7.jpg') }}" alt=""
                                                class="img-activity">
                                            <div class="time-activity">
                                                <div class="item-activity">
                                                    <p class="mb-0 tx-13"><b>Abigail John</b> Add a new projects <b>Free UI
                                                            Template</b></p>
                                                    <small class="text-muted ">5 days ago</small>
                                                </div>
                                            </div>
                                            <img src="{{ asset('adminassets/assets/img/users/14.jpg') }}" alt=""
                                                class="img-activity">
                                            <div class="time-activity">
                                                <div class="item-activity">
                                                    <p class="mb-0 tx-13"><b>Jiggel mossin</b> Add a new projects <b>
                                                            AngularJS Template</b></p>
                                                    <small class="text-muted ">30 mins ago</small>
                                                </div>
                                            </div>
                                            <img src="{{ asset('adminassets/assets/img/users/3.jpg') }}" alt=""
                                                class="img-activity">
                                            <div class="time-activity">
                                                <div class="item-activity">
                                                    <p class="mb-0 tx-13"><b>Raven Chanan</b> Add a new projects <b>Free
                                                            HTML Template</b></p>
                                                    <small class="text-muted ">1 days ago</small>
                                                </div>
                                            </div>
                                            <img src="{{ asset('adminassets/assets/img/users/1.jpg') }}" alt=""
                                                class="img-activity">
                                            <div class="time-activity">
                                                <div class="item-activity">
                                                    <p class="mb-0 tx-13"><b>Anna Ogden</b> Add a new projects <b>Free PSD
                                                            Template</b></p>
                                                    <small class="text-muted ">3 days ago</small>
                                                </div>
                                            </div>
                                            <img src="{{ asset('adminassets/assets/img/users/11.jpg') }}" alt=""
                                                class="img-activity">
                                            <div class="time-activity">
                                                <div class="item-activity">
                                                    <p class="mb-0 tx-13"><b>Allie Grater</b> Add a new projects <b>Free UI
                                                            Template</b></p>
                                                    <small class="text-muted ">5 days ago</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            @endcan

            @can('المستخدمين')
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none"></path>
                            <path d="M4 12c0 4.08 3.06 7.44 7 7.93V4.07C7.05 4.56 4 7.92 4 12z" opacity=".3"></path>
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93s3.05-7.44 7-7.93v15.86zm2-15.86c1.03.13 2 .45 2.87.93H13v-.93zM13 7h5.24c.25.31.48.65.68 1H13V7zm0 3h6.74c.08.33.15.66.19 1H13v-1zm0 9.93V19h2.87c-.87.48-1.84.8-2.87.93zM18.24 17H13v-1h5.92c-.2.35-.43.69-.68 1zm1.5-3H13v-1h6.93c-.04.34-.11.67-.19 1z">
                            </path>
                        </svg><span class="side-menu__label">المستخدمين</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="tab-menu-heading p-0 pb-2 border-0">
                                <div class="tabs-menu ">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs">
                                        <li><a href="#side17" class="active" data-bs-toggle="tab"><i
                                                    class="fe fe-airplay"></i>
                                                <p>Home</p>
                                            </a></li>
                                        <li><a href="#side18" data-bs-toggle="tab"><i class="fe fe-package"></i>
                                                <p>Events</p>
                                            </a></li>
                                        <li><a href="#side19" data-bs-toggle="tab"><i class="fe fe-move"></i>
                                                <p>Activity</p>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane tab-content-show active" id="side17">
                                        <ul class="sidemenu-list">
                                            <li class="side-menu__label1"><a href="javascript:void(0);">المستخدمين</a>
                                            </li>
                                            @can('قائمة المستخدمين')
                                                <li>
                                                    <a class="slide-item" href="{{ route('admin.users.index') }}">قائمة المستخدمين
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('صلاحيات المستخدمين')
                                                <li><a class="slide-item" href="{{ route('admin.roles.index') }}">صلاحيات
                                                        المستخدمين </a>
                                                </li>
                                            @endcan

                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            @endcan
            @can('الاعدادات')
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><svg
                            xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" class="side-menu__icon"
                            viewBox="0 0 24 24">
                            <g></g>
                            <g>
                                <g></g>
                                <g>
                                    <path
                                        d="M21,5c-1.11-0.35-2.33-0.5-3.5-0.5c-1.95,0-4.05,0.4-5.5,1.5c-1.45-1.1-3.55-1.5-5.5-1.5S2.45,4.9,1,6v14.65 c0,0.25,0.25,0.5,0.5,0.5c0.1,0,0.15-0.05,0.25-0.05C3.1,20.45,5.05,20,6.5,20c1.95,0,4.05,0.4,5.5,1.5c1.35-0.85,3.8-1.5,5.5-1.5 c1.65,0,3.35,0.3,4.75,1.05c0.1,0.05,0.15,0.05,0.25,0.05c0.25,0,0.5-0.25,0.5-0.5V6C22.4,5.55,21.75,5.25,21,5z M3,18.5V7 c1.1-0.35,2.3-0.5,3.5-0.5c1.34,0,3.13,0.41,4.5,0.99v11.5C9.63,18.41,7.84,18,6.5,18C5.3,18,4.1,18.15,3,18.5z M21,18.5 c-1.1-0.35-2.3-0.5-3.5-0.5c-1.34,0-3.13,0.41-4.5,0.99V7.49c1.37-0.59,3.16-0.99,4.5-0.99c1.2,0,2.4,0.15,3.5,0.5V18.5z">
                                    </path>
                                    <path
                                        d="M11,7.49C9.63,6.91,7.84,6.5,6.5,6.5C5.3,6.5,4.1,6.65,3,7v11.5C4.1,18.15,5.3,18,6.5,18 c1.34,0,3.13,0.41,4.5,0.99V7.49z"
                                        opacity=".3"></path>
                                </g>
                                <g>
                                    <path
                                        d="M17.5,10.5c0.88,0,1.73,0.09,2.5,0.26V9.24C19.21,9.09,18.36,9,17.5,9c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,10.69,16.18,10.5,17.5,10.5z">
                                    </path>
                                    <path
                                        d="M17.5,13.16c0.88,0,1.73,0.09,2.5,0.26V11.9c-0.79-0.15-1.64-0.24-2.5-0.24c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,13.36,16.18,13.16,17.5,13.16z">
                                    </path>
                                    <path
                                        d="M17.5,15.83c0.88,0,1.73,0.09,2.5,0.26v-1.52c-0.79-0.15-1.64-0.24-2.5-0.24c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,16.02,16.18,15.83,17.5,15.83z">
                                    </path>
                                </g>
                            </g>
                        </svg><span class="side-menu__label">الإعدادت</span><i class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="tab-menu-heading p-0 pb-2 border-0">
                                <div class="tabs-menu ">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs">
                                        <li><a href="#side38" class="active" data-bs-toggle="tab"><i
                                                    class="fe fe-airplay"></i>
                                                <p>Home</p>
                                            </a></li>
                                        <li><a href="#side39" data-bs-toggle="tab"><i class="fe fe-package"></i>
                                                <p>Events</p>
                                            </a></li>
                                        <li><a href="#side40" data-bs-toggle="tab"><i class="fe fe-move"></i>
                                                <p>Activity</p>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane tab-content-show active" id="side38">
                                        <ul class="sidemenu-list">
                                            <li class="side-menu__label1"><a href="javascript:void(0);">الإعدادت</a></li>
                                            @can('الاقسام')
                                                <li><a class="slide-item" href="{{ route('admin.section.index') }}">الأقسام
                                                        </a>
                                                </li>
                                            @endcan
                                            @can('المنتجات')
                                                <li><a class="slide-item" href="{{ route('admin.product.index') }}">المنتجات
                                                        </a></li>
                                            @endcan
                                            {{-- <li><a class="slide-item" href="about.html">About-Us</a></li>
                                            <li><a class="slide-item" href="settings.html">Settings</a></li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            @endcan
        </ul>
        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                width="24" height="24" viewBox="0 0 24 24">
                <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
            </svg></div>
    </div>
    <div class="ps__rail-x" style="left: 0px; bottom: -4px;">
        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
    </div>
    <div class="ps__rail-y" style="top: 4px; height: 261px; right: 0px;">
        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 37px;"></div>
    </div>
</aside>
