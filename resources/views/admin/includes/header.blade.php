    <div class="page-main-header">
        <div class="main-header-right row">
            <div class="main-header-left d-lg-none">
                <div class="logo-wrapper"><a href="{{route('admin.dashboard')}}"><img class="blur-up lazyloaded" src="{{asset('assets/front/images/logo1.png')}}" alt=""></a></div>
            </div>
            <div class="mobile-sidebar">
                <div class="media-body text-right switch-sm">
                    <label class="switch"><a href="#"><i id="sidebar-toggle" data-feather="align-left"></i></a></label>
                </div>
            </div>
            <div class="nav-right col">
                <ul class="nav-menus">
                   
                    <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize-2"></i></a></li>
                    
                    <li class="onhover-dropdown"><i data-feather="bell"></i><span class="badge badge-pill badge-primary pull-right notification-badge"></span><span class="dot"></span>
                        <ul class="notification-dropdown onhover-show-div p-0">
                            <li>إشعارات<span class="badge badge-pill badge-primary pull-right"> 1</span></li>
						                           
						   <li>
                                <div class="media">
								<a href="#">
                                    <div class="media-body">
                                        <h6 class="mt-0"><span><i class="shopping-color" data-feather="shopping-bag"></i></span>طلب جديد</h6>
                                        <p class="mb-0">totalprice</p>
                                    </div>
									</a>
                                </div>
                            </li>
							 
                            
                            <li class="txt-dark"><a href="new-orders.php">كل</a> الطلبات</li>
                        </ul>
                    </li>
                   
                    <li class="onhover-dropdown">
                        <div class="media align-items-center"><img class="align-self-center pull-right img-50 rounded-circle blur-up lazyloaded" src="{{asset('assets/front/images/logo1.png')}}" alt="header-user">
                            <div class="dotted-animation"><span class="animate-circle"></span><span class="main-circle"></span></div>
                        </div>
                        <ul class="profile-dropdown onhover-show-div p-20 profile-dropdown-hover">
                            <li><a href="edit-profile.php"><i data-feather="user"></i>تعديل الملف</a></li>
                            
                            <li><a href="{{route('admin.logout')}}"><i data-feather="log-out"></i>تسجيل الخروج</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
            </div>
        </div>
    </div>
    <!-- Page Header Ends -->

    <!-- Page Body Start-->
    <div class="page-body-wrapper">

        <!-- Page Sidebar Start-->
        <div class="page-sidebar">
            <div class="main-header-left d-none d-lg-block">
                <div class="logo-wrapper"><a href="{{route('admin.dashboard')}}"><img height="40" class="blur-up lazyloaded" src="{{asset('assets/front/images/logo1.png')}}" alt=""> خروف البيت </a></div>
            </div>
            <div class="sidebar custom-scrollbar">
                <div class="sidebar-user text-center">
                    <div><img class="img-60 rounded-circle lazyloaded blur-up" src="{{asset('assets/front/images/logo1.png')}}" alt="#">
                    </div>
                    <h6 class="mt-3 f-14">admin</h6>
                    <p>المدير العام</p>
                </div>
                <ul class="sidebar-menu">
                    <li><a class="sidebar-header" href="{{route('admin.dashboard')}}"><i data-feather="home"></i><span>الرئيسية</span></a></li>
                    <li><a class="sidebar-header" href=""><i data-feather="box"></i> <span>الانعام</span><i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="sidebar-submenu">
                        <li>
                                <a href=""><i class="fa fa-circle"></i>
                                    <span>التصنيفات</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="sidebar-submenu">
                                    <li><a href="{{route('admin.topcategories.index')}}"><i class="fa fa-circle"></i>عرض الكل</a></li>
                                    <li><a href="{{route('admin.topcategories.create')}}"><i class="fa fa-circle"></i>اضافة جديد</a></li>
                                   
                                </ul>
                            </li>
                            <li>
                                <a href=""><i class="fa fa-circle"></i>
                                    <span>الاصناف</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="sidebar-submenu">
                                    <li><a href="{{route('admin.categories.index')}}"><i class="fa fa-circle"></i>عرض الكل</a></li>
                                    <li><a href="{{route('admin.categories.create')}}"><i class="fa fa-circle"></i>اضافة جديد</a></li>
                                   
                                </ul>
                            </li>
							    <li>
                                <a href=""><i class="fa fa-circle"></i>
                                    <span>الاصناف الفرعية</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="sidebar-submenu">
                                    <li><a href="{{route('admin.subcategories.index')}}"><i class="fa fa-circle"></i>عرض الكل</a></li>
                                    <li><a href="{{route('admin.subcategories.create')}}"><i class="fa fa-circle"></i>اضافة جديد</a></li>
                                    
                                </ul>
                            </li>
                            <li>
                                <a href=""><i class="fa fa-circle"></i>
                                    <span>الانواع</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="sidebar-submenu">
                                    <li><a href="{{route('admin.products.index')}}"><i class="fa fa-circle"></i>عرض الكل</a></li>
                                    <li><a href="{{route('admin.products.create')}}"><i class="fa fa-circle"></i>اضافة جديد</a></li>
                                    
                                </ul>
                            </li>
                        </ul>
                    </li>
					<li><a class="sidebar-header" href=""><i data-feather="clipboard"></i> <span>التقطيع والتغليف</span><i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href=""><i class="fa fa-circle"></i>
                                    <span>التقطيع</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="sidebar-submenu">
                                    <li><a href="{{route('admin.segmentations.index')}}"><i class="fa fa-circle"></i>عرض الكل</a></li>
                                    <li><a href="{{route('admin.segmentations.create')}}"><i class="fa fa-circle"></i>اضافة جديد</a></li>
                                   
                                </ul>
                            </li>
                            <li>
                                <a href=""><i class="fa fa-circle"></i>
                                    <span>التغليف</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="sidebar-submenu">
                                    <li><a href="{{route('admin.packages.index')}}"><i class="fa fa-circle"></i>عرض الكل</a></li>
                                    <li><a href="{{route('admin.packages.create')}}"><i class="fa fa-circle"></i>اضافة جديد</a></li>
                                    
                                </ul>
                            </li>
                            <li>
                                <a href=""><i class="fa fa-circle"></i>
                                    <span>خيارات الكرش</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="sidebar-submenu">
                                    <li><a href="{{route('admin.internals.index')}}"><i class="fa fa-circle"></i>عرض الكل</a></li>
                                    <li><a href="{{route('admin.internals.create')}}"><i class="fa fa-circle"></i>اضافة جديد</a></li>
                                   
                                </ul>
                            </li>
                            <li>
                                <a href=""><i class="fa fa-circle"></i>
                                    <span>خيارات الرأس</span> <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="sidebar-submenu">
                                    <li><a href="{{route('admin.headoptions.index')}}"><i class="fa fa-circle"></i>عرض الكل</a></li>
                                    <li><a href="{{route('admin.headoptions.create')}}"><i class="fa fa-circle"></i>اضافة جديد</a></li>
                                   
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a class="sidebar-header" href=""><i data-feather="dollar-sign"></i><span>الطلبات</span><i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{route('admin.orders.neworders')}}"><i class="fa fa-circle"></i>طلبات جديدة</a></li>
							<li><a href="{{route('admin.orders.confirmorders')}}"><i class="fa fa-circle"></i>طلبات مؤكدة</a></li>
                            <li><a href="{{route('admin.orders.completeorders')}}"><i class="fa fa-circle"></i>طلبات مكتملة</a></li>
							<li><a href="{{route('admin.orders.rejectorders')}}"><i class="fa fa-circle"></i>طلبات مرفوضة</a></li>
							 <li><a href="{{route('admin.orders.index')}}"><i class="fa fa-circle"></i>عرض الكل</a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-header" href=""><i data-feather="tag"></i><span>طرق الدفع</span><i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{route('admin.paymentmethods.create')}}"><i class="fa fa-circle"></i>اضافة جديد</a></li>
							<li><a href="{{route('admin.paymentmethods.index')}}"><i class="fa fa-circle"></i>عرض الطرق</a></li>
                       
                        </ul>
                    </li>
					 <li><a class="sidebar-header" href=""><i data-feather="tag"></i><span>أكواد الخصم</span><i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{route('admin.coupons.create')}}"><i class="fa fa-circle"></i>اضافة جديد</a></li>
							<li><a href="{{route('admin.coupons.index')}}"><i class="fa fa-circle"></i>عرض الأكواد</a></li>
                       
                        </ul>
                    </li>
                    <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>العملاء</span><i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{route('admin.users.index')}}"><i class="fa fa-circle"></i>قائمة العملاء</a></li>
                          
                        </ul>
                    </li>
                   
                    <li><a class="sidebar-header" href=""><i data-feather="tag"></i><span>الاعلانات</span><i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{route('admin.advertis.create')}}"><i class="fa fa-circle"></i>اضافة جديد</a></li>
							<li><a href="{{route('admin.advertis.index')}}"><i class="fa fa-circle"></i>عرض الاعلانات</a></li>
                       
                        </ul>
                    </li>
                    {{-- <li><a class="sidebar-header" href="#"><i data-feather="bar-chart"></i><span>التقارير</span></a></li>
					 <li><a class="sidebar-header" href="#"><i data-feather="bar-chart"></i><span>تقييمات العملاء</span></a></li>
                    
					<li><a class="sidebar-header" href="#"><i data-feather="chrome"></i><span>الاعدادات</span></a></li>
                    --}}
                </ul>
            </div>
        </div>