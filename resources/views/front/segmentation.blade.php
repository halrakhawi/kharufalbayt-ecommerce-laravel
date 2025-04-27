@extends('layouts.front')
@section('content')
<section class="page-title" style="background-image: url({{asset('assets/front/images/banner/banner-1.jpg')}});">
            <div class="auto-container">
                <div class="content-box">
                    <div class="title-box">
                        <h1>تفاصيل التقطيع</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="#">الرئيسية</a></li>
                        <li><a href="#">تفاصيل الطلب</a></li>
                        <li><a href="#">تفاصيل التغليف</a></li>
                        <li><a href="#">|تفاصيل التقطيع</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->
        <!-- shop-details -->
        <section class="shop-details sec-pad">
            <div class="auto-container">
               
                <div class="product-details-content">
                    <div class="row align-items-center clearfix rowShredding">
                        <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                            <div class="slider-inner">
                                <div class="bxslider">
                                    <div class="slider-content">                                   
                                        <div class="product-image">
                                            <figure class="image"><a href="{{asset('assets/front/images/shredding.jpg')}}" class="lightbox-image" data-fancybox="gallery"><img src="{{asset('assets/segmentations/lamb.jpg')}}" id="segpic" alt=""></a></figure>
                                        </div>
                                       
                                    </div>
                                    <!-- <div class="slider-content">
                                        <div class="product-image">
                                            <figure class="image"><a href="{{asset('assets/front/images/shredding.jpg')}}" class="lightbox-image" data-fancybox="gallery"><img src="{{asset('assets/front/images/shredding.jpg')}}" class="lightbox-image" data-fancybox="gallery"><img src="{{asset('assets/front/images/shredding.jpg')}}" class="lightbox-image" data-fancybox="gallery"><img src="{{asset('assets/front/images/shredding.jpg')}}" alt=""></a></figure>
                                        </div>
                                        
                                    </div>
                                    <div class="slider-content">
                                        <div class="product-image">
                                            <figure class="image"><a href="{{asset('assets/front/images/shredding.jpg')}}" class="lightbox-image" data-fancybox="gallery"><img src="{{asset('assets/front/images/shredding.jpg')}}" class="lightbox-image" data-fancybox="gallery"><img src="{{asset('assets/front/images/shredding.jpg')}}" class="lightbox-image" data-fancybox="gallery"><img src="{{asset('assets/front/images/shredding.jpg')}}" alt=""></a></figure>
                                        </div>
                                       
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 content-column colProductDetails" >
                        <form action="{{route('package')}}" method="post">
                                    @csrf
                            @if($subcat->options==1)
                            <div class="product-details">
                                <div class="PackageChoices">
                                    <h4 class="hChoice">حدد نوع التقطيع من فضلك</h4>
                                    <div class="btn-group">
                                    <select class="FlexSignUp selectCat" id="stype" name="segm" onChange="segFunction()">
                                        <option style="background-color:#eee; color:#707070" selected>اختر نوع التقطيع</option>
                                    @foreach($segs as $seg)
                                        <option style="background-color:#eee; color:#707070" value="{{$seg->id}}">{{$seg->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>

                                <div class="divchoiceshredding">
                                <h4 class="hChoice">خيارات أخرى</h4>
                                <div class="btn-group btnChoice">
                                    <select class="FlexSignUp selectCat" id="stype" name="withhead" onChange="segFunction()">
                                        <option style="background-color:#eee; color:#707070" selected>خيارات الرأس</option>
                                        <option  style="background-color:#eee; color:#707070" value="مع الرأس">مع الرأس</option>
                                        <option  style="background-color:#eee; color:#707070" value="بدون الرأس">بدون الرأس</option>
                                    </select>
                                </div>
                                <!-- <br>
                                <br> -->
                                <div class="btn-group ">
                                    <select class="FlexSignUp selectCat" id="stype" name="with" onChange="segFunction()">
                                        <option style="background-color:#eee; color:#707070" selected>خيارات الكرش</option>
                                        <option  style="background-color:#eee; color:#707070" value="مع الكرش">مع الكرش</option>
                                        <option  style="background-color:#eee; color:#707070" value="بدون الكرش">بدون الكرش</option>
                                    </select>
                                </div>
                              
                               
                                </div>
                                @else
                                <div class="product-details">
                                <div class="PackageChoices">
                                    <h4 class="hChoice">حدد نوع التقطيع من فضلك</h4>
                                    <div class="btn-group">
                                    <select class="FlexSignUp selectCat" id="stype" name="segm" onChange="segFunction()">
                                        <option style="background-color:#eee; color:#707070" selected>اختر نوع التقطيع</option>
                                        <option style="background-color:#eee; color:#707070" value="4">تقطيع ثلاجة</option>
                                        <option style="background-color:#eee; color:#707070" value="9">تقطيع شوربة</option>
                                    
                                    </select>
                                    <input type="hidden" name="withhead" value="بدون رأس">
                                    <input type="hidden" name="with" value="بدون الكرش">
                                </div>
                            </div>
                               @endif
                                <div class="btn-box"><button type="submit" class="theme-btn">حفظ واستمرار</button></div>
                                
                            </div>
                        </div>
                    </form>
                        
                    </div>
                </div>
            </div>
        </section>
@endsection