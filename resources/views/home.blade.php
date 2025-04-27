@extends('layouts.front')
@section('content')

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><i class="fas fa-times"></i></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><a href="{{route('home')}}"><img src="assets/front/images/logo2.png" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
                <div class="contact-info">
                    <h4>معلومات الاتصال</h4>
                    <ul>
                        <li>الرياض، المملكة العربية السعودية</li>
                        <li>  <a style="direction:ltr" href="tel:+96601682648101">+96601682648101</a></li>
                        <li><a href="mailto:info@baytsheep.com">لأنك تهمنا سهلنا عليك</a></li>
                    </ul>
                </div>
                <div class="social-links">
                    <ul class="clearfix">
                        <li><a href="index.php"><span class="fab fa-twitter"></span></a></li>
                        <li><a href="index.php"><span class="fab fa-facebook-square"></span></a></li>
                        <li><a href="index.php"><span class="fab fa-pinterest-p"></span></a></li>
                        <li><a href="index.php"><span class="fab fa-instagram"></span></a></li>
                        <li><a href="index.php"><span class="fab fa-youtube"></span></a></li>
                    </ul>
                </div>
            </nav>
        </div><!-- End Mobile Menu -->

        
        <!-- main-slider -->
        <section class="main-slider HomeSlider">
            <div class="main-slider-carousel owl-theme owl-carousel owl-dots-none">
                <div class="slide-item">
                    <div class="image-layer" style="background-image:url(assets/front/images/banner/banner-1.jpg)"></div>
                    <div class="auto-container">
                        <div class="content-box">
                            <h1>لحوم ممتازة، جودة عالية</h1>
                            <p>اختيارك لخروف البيت يعني مشاركتك تجربة فريدة في انتقاء اجود اللحوم </p>
                            <div class="btn-box">
                                <a href="{{route('allproducts')}}" class="theme-btn"><i class="fas fa-long-arrow-alt-left"></i>اعرف أكثر</a>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="slide-item">
                    <div class="image-layer" style="background-image:url(assets/front/images/banner/banner-2.jpg)"></div>
                    <div class="auto-container">
                        <div class="content-box centred">
                            <h1>لحوم طازجة يتم الذبح ضمن معايير وبدقة عالية</h1>
                            <p>تحت إشراف كادر طبي لضمان جودة اللحوم</p>
                            <div class="btn-box">
                                <a href="{{route('allproducts')}}" class="theme-btn"><i class="fas fa-long-arrow-alt-left"></i>تعرف أكثر</a>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="slide-item">
                    <div class="image-layer" style="background-image:url(assets/front/images/banner/banner-3.jpg)"></div>
                    <div class="auto-container">
                        <div class="content-box">
                            <h1>التغليف والتقطيع</h1>
                            <div class="btn-box">
                                <a href="{{route('allproducts')}}" class="theme-btn"><i class="fas fa-long-arrow-alt-left"></i>تعرف أكثر</a>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </section>
        <!-- main-slider end -->


        <!-- about-section -->
        <section class="about-section" id="about">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12 video-column">
                            <div id="video_block_1">
                                <div class="video-inner" style="background-image: url(assets/front/images/resource/about.png);">
                                    <a href="{{asset('assets/about.mp4')}}" class="lightbox-image video-btn" data-caption=""><i class="fas fa-play"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 content-column">
                            <div id="content_block_1">
                                <div class="content-box">
                                    <div class="sec-title">
                                        <span>من نحن</span>
                                        <h2>نحن نقدم افضل اللحوم</h2>
                                    </div>
                                    <div class="text">
                                        <p>نوفر لكم أجود أنواع اللحوم الطازجة تحت إشراف كوادر سعوديين وأطباء بيطرين متميزين بأفضل الأجهزة للمحافظة على سلامة وجودة اللحم.</p>
                                    </div>
                                    <ul class="list clearfix">
                                        <li>فحص طبي</li>
                                        <li>دفع آمن</li>
                                    </ul>
                                    <div class="btn-box">
                                        <a href="about.php" class="theme-btn">عرض المزيد<i class="fas fa-long-arrow-alt-right rowRight"></i>
                                            <i class="fas fa-long-arrow-alt-left rowLeft"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-section end -->


        <!-- clients-section -->
        <section class="clients-section">
            <div class="auto-container ClientsSlider">
                <div class="clients-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">
                    <figure class="logo-image"><a href="index.html"><img src="assets/front/images/clients/clients-logo-1.jpg" style="height:80px" alt=""></a></figure>
                    <figure class="logo-image"><a href="index.html"><img src="assets/front/images/clients/clients-logo-2.png" alt=""></a></figure>
                    <figure class="logo-image"><a href="index.html"><img src="assets/front/images/clients/clients-logo-3.png" alt=""></a></figure>
                    <figure class="logo-image"><a href="index.html"><img src="assets/front/images/clients/clients-logo-4.png" alt=""></a></figure>
                  
                </div>
            </div>
        </section>
        <!-- clients-section end -->


        <!-- service-section -->
        <section class="service-section bg-color-1" id="services">
            <div class="icon-layer" style="background-image: url(assets/front/images/icons/bg-icon-1.png);"></div>
            <div class="auto-container">
                <div class="sec-title text-center">
                    <span>ماذا نقدم</span>
                    <h2>خدماتنا مخصصة لك</h2>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                        <div class="service-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="icon-box"><i class="flaticon-meat-4"></i></div>
                                <h3><a href="{{route('allproducts')}}">التقطيع</a></h3>
                                <p>خبرتنا تضمن تقطيع فائق الدقة  وذلك حسب رغبتك</p>
                                <div class="btn-box">
                                    <a href="{{route('allproducts')}}" class="theme-btn">تعرف أكثر</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                        <div class="service-block-one wow fadeInUp animated animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="icon-box"><i class="flaticon-medal"></i></div>
                                <h3><a href="{{route('allproducts')}}">الذبح</a></h3>
                                <p>وفق التعاليم الاسلامية الحنيفة، بايدي متخصصين </p>
                                <div class="btn-box">
                                    <a href="{{route('allproducts')}}" class="theme-btn">تعرف أكثر</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                        <div class="service-block-one wow fadeInUp animated animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="icon-box"><i class="flaticon-chicken-breast"></i></div>
                                <h3><a href="{{route('allproducts')}}">تغليف اللحوم</a></h3>
                                <p>نوفر خدمة تغليف اللحوم حسب الطلب تحت معايير نظافة ممتازة</p>
                                <div class="btn-box">
                                    <a href="{{route('allproducts')}}" class="theme-btn">تعرف أكثر</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- service-section end -->


        <!-- about-style-two -->
        <section class="about-style-two">
            <div class="auto-container">
                <div class="row align-items-center clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div id="content_block_2">
                            <div class="content-box">
                                <div class="sec-title style-two">
                                    <span>تعرف أكثر</span>
                                    <h2>عن خروف البيت</h2>
                                </div>
                                <div class="text">
                                    <p>خروف البيت ملتزمة بجميع معايير السلامة والنظافة التامة، وانعامنا تحصل على الرعاية اللازمة والتغذية الصحية المتكاملة</p>
                                </div>
                                <ul class="list clearfix">
                                    <li>
                                        <i class="flaticon-call-center-agent"></i>
                                        <label class="lblAbou lblAboutMeat">فحص طبي</label>
                                        
                                    </li>
                                    <li>
                                        <i class="flaticon-free-delivery"></i>
                                        <label class="lblAbout">توصيل مجاني</label>
                                        
                                    </li>
                                    <li>
                                        <i class="flaticon-return-of-investment"></i>
                                        <label class="lblAbout">ضمان</label>
                                        
                                    </li>
                                    <li>
                                        <i class="flaticon-winner"></i>
                                        <label class="lblAbout">عروض مدهشة</label>
                                        
                                    </li>
                                </ul>
                                <div class="link-box"><a href="about.html">تصفح المزيد من مزايا التعامل مع خروف البيت<i class="fas fa-long-arrow-alt-right rowRight"></i>
                                    <i class="fas fa-long-arrow-alt-left rowLeft"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <div id="image_block_1">
                            <div class="image-box">
                                <figure class="image image-1"><img src="assets/front/images/resource/about-2.jpg" alt=""></figure>
                                <figure class="image image-2"><img src="assets/front/images/resource/about-3.jpg" alt=""></figure>
                                <figure class="image image-3"><img src="assets/front/images/resource/about-2.png" alt=""></figure>
                                <figure class="image image-4"><img src="assets/front/images/resource/about-2.png" alt=""></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-style-two end -->


        <!-- shop-section -->
        <section class="shop-section" id="shop">
            <div class="auto-container">
                <div class="sec-title style-two text-center">
                    <span>منتجاتنا</span>
                    <h2>أفضل المنتجات</h2>
                </div>
                <div class="row clearfix">
                    
                    @foreach($categories as $cat)
                    <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                        <div class="shop-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <img src="{{asset('assets/topcategories/'.$cat->picture)}}" alt="" width="320px" height="320px">
                                    <ul class="list clearfix">
                                        <li><a href="{{route('showcategorybyid',$cat->id)}}">الشراء الآن</a></li>
                                    </ul>
                                </figure>
                                <div class="lower-content">
                                    <h6><a href="{{route('showcategorybyid',$cat->id)}}">{{$cat->name}}</a></h6>
                                    <ul class="rating clearfix">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="more-btn centred">
                    <a href="{{route('allcategories')}}" class="theme-btn">تسوق الآن</a>
                </div>
            </div>
        </section>
        <!-- shop-section end -->


        <!-- portfolio-section -->
        <section class="portfolio-section">
            <div class="auto-container PortfolioSlider">
                <div class="single-item-carousel owl-carousel owl-theme owl-dots-none">
                    <div class="portfolio-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img src="assets/front/images/resource/portfolio-1.jpg" alt=""></figure>
                            <div class="lower-content">
                                <div class="inner">
                                    <span>لحوم</span>
                                    <h4><a href="{{route('allproducts')}}">ذبائح كاملة</a></h4>
                                    <div class="link"><a href="{{route('allproducts')}}"><i class="flaticon-right rowRight"></i>
                                        <i class="flaticon-left rowLeft"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img src="assets/front/images/resource/portfolio-2.jpg" alt=""></figure>
                            <div class="lower-content">
                                <div class="inner">
                                    <span>مفروم</span>
                                    <h4><a href="{{route('allproducts')}}">لحوم مفرومة</a></h4>
                                    <div class="link"><a href="{{route('allproducts')}}"><i class="flaticon-right rowRight"></i>
                                        <i class="flaticon-left rowLeft"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img src="assets/front/images/resource/portfolio-3.jpg" alt=""></figure>
                            <div class="lower-content">
                                <div class="inner">
                                    <span>تقطيع & تغليف</span>
                                    <h4><a href="{{route('allproducts')}}">إختر طريقة التقطيع والتغليف</a></h4>
                                    <div class="link"><a href="{{route('allproducts')}}"><i class="flaticon-right rowRight"></i>
                                        <i class="flaticon-left rowLeft"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- portfolio-section end -->


        <!-- testimonial-section -->
        <section class="testimonial-section">
            <div class="auto-container">
                <div class="sec-title style-two">
                    <span class="testimonialSpan">ماذا قالو عنا</span>
                    <h2  class="testimonialHead">لماذا يثق الناس في خروف البيت!</h2>
                </div>
                <div class="two-column-carousel owl-carousel owl-theme owl-dots-none sliderTestimonials">
                    <div class="testimonial-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="flaticon-quote"></i></div>
                            <p>جاء اللحم حسب طلبي وطازج الله يكثر من امثالكم</p>
                            <div class="author-box">
                                <figure class="image-box"><img src="assets/front/images/resource/avatar-1606914_1280.png" alt=""></figure>
                                <h5>ام بندر</h5>
                                <span class="designation">موجهه في التعليم سابقا</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="flaticon-quote"></i></div>
                            <p>اللحم طيب والمذاق اطيب فجزاكم الله خير </p>
                            <div class="author-box">
                                <figure class="image-box"><img src="assets/front/images/resource/istockphoto-519463590-170667a.jpg" alt=""></figure>
                                <h5>عبدالله سعد</h5>
                                <span class="designation">مدير موارد بشرية</span>
                            </div>
                        </div>
                    </div>
					 <div class="testimonial-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="flaticon-quote"></i></div>
                            <p>جزاكم الله خير جاء طازج ومغلف حسب ما اريد</p>
                            <div class="author-box">
                                <figure class="image-box"><img src="assets/front/images/resource/avatar-1606914_1280.png" alt=""></figure>
                                <h5>ام مهند</h5>
                                <span class="designation">دكتورة في جامعه الملك سعود</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="flaticon-quote"></i></div>
                            <p>جزاكم الله خير لحم طيب وجاء في وقته </p>
                            <div class="author-box">
                                <figure class="image-box"><img src="assets/front/images/resource/320-3205720_dome-clipart-arabian-arab-man-icon-png.png" alt=""></figure>
                                <h5>عبدالله عبدالعزيز</h5>
                                <span class="designation">مذيع</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="flaticon-quote"></i></div>
                            <p>اللحم طيب والمذاق اطيب فجزاكم الله خير</p>
                            <div class="author-box">
                                <figure class="image-box"><img src="assets/front/images/resource/320-3205720_dome-clipart-arabian-arab-man-icon-png.png" alt=""></figure>
                                <h5>د. عبدالعزيز المصيبيح </h5>
                                <span class="designation">دكتور في المستشفى العسكري </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial-section end -->


        <!-- funfact-section -->
        <section class="funfact-section centred bg-color-2" id="achievements">
            <div class="auto-container">
                <div class="counter-inner wow slideInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="line"></div>
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6 col-sm-12 counter-block">
                            <div class="counter-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="flaticon-user-symbol-of-thin-outline"></i></div>
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="100" data-stop="200">0</span>
                                    </div>
                                    <span class="text">الموظفين</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 counter-block">
                            <div class="counter-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="flaticon-dial"></i></div>
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="1500" data-stop="2000">0</span>
                                    </div>
                                    <span class="text">تحميل التطبيق</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 counter-block">
                            <div class="counter-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="flaticon-quote"></i></div>
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="2000" data-stop="5240">0</span>
                                    </div>
                                    <span class="text">العملاء</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 counter-block">
                            <div class="counter-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="flaticon-winner"></i></div>
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="1500" data-stop="250">0</span>
                                    </div>
                                    <span class="text">الجوائز المهنية</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection