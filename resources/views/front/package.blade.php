@extends('layouts.front')
@section('content')
<section class="page-title" style="background-image: url({{asset('assets/front/images/banner/banner-1.jpg')}});">
            <div class="auto-container">
                <div class="content-box">
                    <div class="title-box">
                        <h1>تفاصيل التغليف</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="#">الرئيسية</a></li>
                        <li><a href="#">تفاصيل الطلب</a></li>
                        <li><a href="#">|تفاصيل التغليف</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->
        <!-- shop-details -->
        <section class="shop-details sec-pad">
            <div class="auto-container">
               
                <div class="product-details-content">
                    <div class="row align-items-center clearfix">
                        <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                            <div class="slider-inner">
                                <div class="bxslider">
                                    <div class="slider-content">                                   
                                        <div class="product-image">
                                            <figure class="image"><a href="{{asset('assets/front/images/package.jpg')}}" class="lightbox-image" data-fancybox="gallery"><img src="{{asset('assets/front/images/package.jpg')}}" id="pacpic" alt=""></a></figure>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <form action="{{route('cart')}}" method="post">
                            @csrf
                            <div class="product-details">
                                <div class="PackageChoices">
                                    <h4 class="hChoice">حدد نوع التغليف من فضلك</h4>
                                    <div class="divPoverPrice">
                                    <p class="pPackageChoices">تكلفة تغليف إضافية:</p>
                                    <p class="poverPrice">بدون</p>
                                    </div>
                                    <div class="btn-group">
                                    <select class="FlexSignUp selectCat" name="pack" id="pctype" onChange="pacFunction()">
                                        <option style="background-color:#eee; color:#707070" selected>اختر نوع التغليف</option>
                                    @foreach($pacs as $pack)
                                        <option style="background-color:#eee; color:#707070" value="{{$pack->id}}">{{$pack->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                </div>
                                <div>
                                <h4 class="hChoice">خيارات أخرى</h4>
                                <div class="btn-group">
                                    <select class="FlexSignUp selectCat" id="pacstype" name="withstamp" onChange="pacsegFunction()">
                                        <option style="background-color:#eee; color:#707070" selected>ختم المسلخ</option>
                                        <option  style="background-color:#eee; color:#707070" value="مع ختم المسلخ">مع ختم المسلخ</option>
                                        <option  style="background-color:#eee; color:#707070" value="بدون ختم المسلخ">بدون ختم المسلخ</option>
                                    </select>
                                </div>
                                <div>
                                    <textarea cols="30" rows="4" placeholder="ملاحظات" name="notes" class="textAreaNote">لا يوجد ملاحظات</textarea>
                                </div>
                                </div>
                                <div class="btn-box"><button type="submit" class="theme-btn">حفظ واستمرار</button></div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection