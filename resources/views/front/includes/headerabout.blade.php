
<header class="main-header">
    <div class="header-top">
        <div class="auto-container ArabicHeadTop">
            <div class="top-info">
                <ul class="info-list clearfix">
                    <li>
                        <p>الرياض، المملكة العربية السعودية</p>
                        <i class="flaticon-location-pin"></i>
                    </li>
                    <li>
                        
                        <a href="mailto:nfo@baytsheep.com">info@kharufalbayt.com.sa</a>
                        <i class="flaticon-envelope"></i>
                    </li>
                    <li class="phone">
                       
                        <a style="direction:ltr" href="tel:0557448850">0557448850</a>
                         <i class="flaticon-dial"></i>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="header-upper">
        <div class="auto-container">
            <div class="outer-box clearfix">
                <div class="logo-box logoMainHead">
                    <figure class="logo"><a href="{{route('home')}}"><img src="{{asset('assets/front/images/logo1.png')}}" alt=""></a></figure>
                </div>
                <div class="menu-area pull-right">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation scroll-nav clearfix ulHead">
                                <li><a href="{{route('home')}}" style="color:#05486D;">الرئيسية</a>    
                                </li>  
                                 <li><a href="{{route('about')}}">من نحن</a></li>
                                 <li><a href="{{route('allcategories')}}">منتجاتنا</a></li>
                            </ul>
                        </div>
                    </nav>
                    <ul class="menu-right-content pull-left clearfix">
                        <li class="user-box">
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="flaticon-user-symbol-of-thin-outline"></i>
                            </a>
                            @if(auth('user')->user())
                            <div class="dropdown-menu ddlistuser" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item listuser" href="{{route('myorders')}}">طلباتي</a>   
                                <a class="dropdown-item listuser" href="{{route('logout')}}">تسجيل خروج</a>   
                              </div>
                              <li class="cart-box"><a href="{{route('getcart')}}"><i class="flaticon-shopping-cart-1"></i><span>{{count((Cart::session(auth('user')->user()->mobile)->getContent())->toArray())}}</span></a></li>
                            @else
                            <div class="dropdown-menu ddlistuser" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item listuser" href="{{route('login')}}">دخول</a>
                                <a class="dropdown-item listuser" href="{{route('signup').'#signup'}}">اشتراك</a>   
                              </div>
                             
                              </div>
                        </li>
                        <li class="search-box-outer">
                            <div class="dropdown">
                                <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu3">
                                    <li class="panel-outer">
                                        <div class="form-container">
                                            <form method="post" action="">
                                                <div class="form-group">
                                                    <input type="search" name="field-name" value="" placeholder="بحث" required="">
                                                    <button type="submit" class="search-btn"><span class="fas fa-search"></span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @endif
                        <li class="nav-box">
                            <div class="nav-btn nav-toggler navSidebar-button clearfix">
                                <i class="flaticon-list"></i>
                            </div>
                        </li>
                    </ul>
                   
                </div>
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="auto-container">
            <div class="outer-box clearfix">
                <figure class="logo-box pull-left"><a href="{{route('home')}}"><img src="assets/front/images/logo4.png" style="width: 130px" alt=""></a></figure>
                <div class="menu-area pull-right">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>