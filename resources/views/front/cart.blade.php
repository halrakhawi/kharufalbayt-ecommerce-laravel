@extends('layouts.front')
@section('content')
  <!-- Mobile Menu  -->
  <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><i class="fas fa-times"></i></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><a href="index.php"><img src="{{asset('assets/front/images/logo.jpeg')}}" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
                <div class="contact-info">
                    <h4>معلومات الاتصال</h4>
                    <ul>
                        <li>الرياض، المملكة العربية السعودية</li>
                        <li><a href="tel:+96601682648101">+966 01682648101</a></li>
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
        </div>
        <!-- End Mobile Menu -->
        <section class="page-title" style="background-image: url({{asset('assets/front/images/banner/banner-3.jpg')}});">
            <div class="auto-container">
                <div class="content-box">
                    <div class="title-box">
                        <h1>عربة التسوق</h1>

                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="#">الرئيسية</a></li>
                        <li><a href="#" class="active">|عربة التسوق</a></li>
                    </ul>
                </div>
                
            </div>
        </section>
        <div class="container">
        <div style="text-align:right">جميع الاسعار تشمل 15% قيمة الضريبة المضافة</div>
            @if(count($cartItems)>0)
        @foreach($cartItems as $item)
            <div class="row rowShoppingCart">
                <div class="col-lg-3 col-md-6 col-12">
                
                    <div class="ProductImgCart">
                        <img src="{{asset('assets/categories/'.$item['attributes']['picture'])}}" alt="">
                    </div>
                </div>
               
                <div class="col-lg-3 col-md-6 col-12">
                    <h3 class="ProductImgCartprice">{{$item['price']*$item['quantity']+(($item['price']*$item['quantity'])*0.15)}} ريال</h3>
                    <p class="PProductImgCart">{{$item['name']}}</p>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <p class="PProductImgCart">عدد {{$item['quantity']}}</p>
                </div>
                <div class="col-lg-3 col-md-6 col-12 divDeleteCart">
                    <a href="{{route('deletecartItem',$item['id'])}}"><i class="fas fa-trash-alt DeleteCart"></i></a>
                </div>
               
            </div>
            @endforeach
            <div class="divPricandCoupon">
            <div class="divCoupon">
                <form id="dis">
                    {{-- @csrf  --}}
                <input id="code" class="txtCoupon" type="text" name="code" placeholder="أدخل كود الخصم">
                <button class="btnCoupon">تفعيل</button><p class="pTotalCart"></p>
                <span class="text-danger error-text code_error"></span>
                </form>
            </div>
            <div>
                <p class="pTotalCart" style="text-align: right;">الاجمالي: {{$total+($total*0.15)}} ريال</p>
                <p class="pTotalCart" style="text-align: right;">الخصم: 0 ريال</p>
                <p class="pTotalCart" style="text-align: right;">المبلغ للدفع: {{$total+($total*0.15)}} ريال</p>
            </div>
            </div>
            <div class="divbtnBuyNow">
                <a class="btnBuyNow" href="{{route('checkout')}}">الشراء الآن</a>
            </div>
        </div>
        @else
        <p style="text-align: center;font-size: 60px;margin-top: 10%;margin-bottom: 50px">لا توجد منتجات</p>
        <a style="text-align: center;margin-bottom: 20%;" class="btnBuyNow"  href="{{route('allproducts')}}">تسوق الآن</a>
        @endif
@endsection