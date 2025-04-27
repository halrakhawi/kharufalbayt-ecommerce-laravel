@extends('layouts.frontdtable')
@section('content')
<section class="page-title" style="background-image: url({{asset('assets/front/images/banner/banner-1.jpg')}});">
            <div class="auto-container">
                <div class="content-box">
                    <div class="title-box">
                        <h1>تفاصيل الطلب</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="#">الرئيسية</a></li>
                        <li><a href="#" class="active">طلباتي| تفاصيل الطلب</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <div style="padding:20px; text-align:right;">
            
                  <table id="orderdetails-datatable" class="table table-striped table-bordered"></table>
                <!-- <div class="col-lg-3 col-md-6 col-12 shop-block">
                    <div class="shop-block-one wow fadeInUp animated animated" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="assets/images/resource/shop/shop-2.jpg" alt="">
                                <ul class="list clearfix">
                                    <li><a href="shop-1.html"><i class="flaticon-cart"></i></a></li>
                                    <li><a href="shop-details.html">الشراء الآن</a></li>
                                </ul>
                            </figure>
                            <div class="lower-content">
                                <h6><a href="shop-details.html">تيس عارضي</a></h6>
                                <ul class="rating clearfix">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                                <span class="price">950 ريال</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 shop-block">
                    <div class="shop-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="assets/images/resource/shop/shop-1.jpg" alt="">
                                <ul class="list clearfix">
                                    <li><a href=""><i class="flaticon-cart"></i></a></li>
                                    <li><a href="">الشراء الآن</a></li>
                                </ul>
                            </figure>
                            <div class="lower-content">
                                <h6><a href="shop-details.html">خروف نعيمي</a></h6>
                                <ul class="rating clearfix">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                                <span class="price">1500 ريال</span>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 shop-block">
                    <div class="shop-block-one wow fadeInUp animated animated" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="assets/images/resource/shop/shop-2.jpg" alt="">
                                <ul class="list clearfix">
                                    <li><a href="shop-1.html"><i class="flaticon-cart"></i></a></li>
                                    <li><a href="shop-details.html">الشراء الآن</a></li>
                                </ul>
                            </figure>
                            <div class="lower-content">
                                <h6><a href="shop-details.html">تيس عارضي</a></h6>
                                <ul class="rating clearfix">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                                <span class="price">950 ريال</span>
                            </div>
                        </div>
                    </div>
                </div> -->
            
        </div>

@endsection

