@extends('layouts.frontAbout')
@section('content')
{{-- @dd(url('assets/images/resource/about-1.jpg')) --}}
<div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><i class="fas fa-times"></i></div>
    
    <nav class="menu-box">
        <div class="nav-logo"><a href="{{route('home')}}"><img src="assets/images/logo2.png" alt="" title=""></a></div>
        <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        <div class="contact-info">
            <h4>معلومات الاتصال</h4>
            <ul>
                <li>الرياض، المملكة العربية السعودية</li>
                <li><a href="tel:+96601682648101">10184628610669+</a></li>
                <li><a href="mailto:info@baytsheep.com">info@baytsheep.com</a></li>
				
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

<!-- main-slider end -->


<!-- about-section -->
<section class="about-section" id="about">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <div class="row clearfix secAbout">
                <div class="col-lg-6 col-md-6 col-sm-12 video-column">
                    <div id="video_block_1">
                        <div class="video-inner" style="background-image: url({{asset('assets/front/images/resource/about.png')}});">
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
                                <li>100% لحوم عضوية</li>
                                <li>دفع آمن</li>
								<li><b>الرقم الضريبي: 3110440546</b></li> 
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

<!-- about-section -->
<section class="about-section" id="about2">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <div class="row clearfix Secreverse">
                <div class="col-lg-6 col-md-6 col-sm-12 video-column">
                    <div id="video_block_1">
                        <div class="video-inner" style="background-image: url({{asset('assets/front/images/resource/about.png')}});">
                            <a href="{{asset('assets/about.mp4')}}" class="lightbox-image video-btn" data-caption=""><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 content-column">
                    <div id="content_block_1">
                        <div class="content-box">
                            <div class="sec-title">
                                <span>رؤيتنا</span>
                                <h2>ما نتطلع اليه</h2>
                            </div>
                            <div class="text">
                                <p>     نسعى الى أن نكون المتجر الأول لاختيار العملاء على مستوى المملكة والخليج وذلك بجودة اللحوم وتنوع منتجاتنا وان نواكب التطور في هذا المجال.</p>
                            </div>
                            
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
        <!-- about-section -->
<section class="about-section" id="about3">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 video-column">
                    <div id="video_block_1">
                        <div class="video-inner" style="background-image: url({{asset('assets/front/images/resource/about.png')}});">
                            <a href="{{asset('assets/about.mp4')}}" class="lightbox-image video-btn" data-caption=""><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 content-column">
                    <div id="content_block_1">
                        <div class="content-box">
                            <div class="sec-title">
                                <span>قيمنا</span>
                                <h2>مستمدة من الدين الاسلامي</h2>
                            </div>
                            <div class="text">
                                <p> مستوحاه من تربية أبائنا لنا بمراقبة الله، وان نخدم عملائنا بأحسن مما يظنون ونحن في حاجة لتوجيه زبائننا لنا فهم ابائنا واخواننا واخواتنا.</p>
                            </div>
                            <ul class="list clearfix">
                                <li>100% لحوم عضوية</li>
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
        <!-- about-section -->
<section class="about-section" id="about4">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <div class="row clearfix Secreverse">
                <div class="col-lg-6 col-md-6 col-sm-12 video-column">
                    <div id="video_block_1">
                        <div class="video-inner" style="background-image: url({{asset('assets/front/images/resource/about.png')}});">
                            <a href="{{asset('assets/about.mp4')}}" class="lightbox-image video-btn" data-caption=""><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 content-column">
                    <div id="content_block_1">
                        <div class="content-box">
                            <div class="sec-title">
                                <span>هدفنا</span>
                                <h2>نحن نقدم افضل اللحوم</h2>
                            </div>
                            <div class="text">
                                <p>          لرضا المولى عز وجل عنا ثم رضا عملائنا ووصولنا الى القمة والثبات فيها بجودة عالية جداً وبمنتجات عالية الجودة والتنوع.</p>
                            </div>
                            
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
@endsection