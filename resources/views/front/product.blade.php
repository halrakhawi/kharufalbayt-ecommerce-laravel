@extends('layouts.front')
@section('content')
<section class="page-title" style="background-image: url({{asset('assets/front/images/banner/banner-1.jpg')}});">
                <div class="auto-container">
                    <div class="content-box">
                        <div class="title-box">
                            <h1>تفاصيل الطلب</h1>
                        </div>
                        <ul class="bread-crumb clearfix">
                            <li><a href="#">الرئيسية</a></li>
                            <li><a href="#" class="active">|تفاصيل الطلب</a></li>
                        </ul>
                    </div>
                </div>
</section>
         
            <section class="shop-details sec-pad">
            <div class="auto-container">
               
                <div class="product-details-content">
                    <div class="row align-items-center clearfix">
                        <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                            <div>
                                <div >
                                    <div class="slider-content">                                   
                                        <div class="product-image mySlides">
                                            <figure class="image"><a href="{{asset('assets/subcategories/'.$subcat->picture)}}" class="lightbox-image" data-fancybox="gallery"><img src="{{asset('assets/subcategories/'.$subcat->picture)}}" alt=""></a></figure>
                                        </div>
                                        <div class="product-image mySlides">
                                            <figure class="image"><a href="{{asset('assets/subcategories/'.$subcat->picture)}}" class="lightbox-image" data-fancybox="gallery"><img src="{{asset('assets/subcategories/'.$subcat->picture)}}" alt=""></a></figure>
                                        </div>
                                        <div class="product-image mySlides">
                                            <figure class="image"><a href="{{asset('assets/subcategories/'.$subcat->picture)}}" alt=""></a></figure>
                                        </div>
                                        <div class="slider-pager">
                                            <ul class="thumb-box">

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                            <div class="product-details">
                           
                            <h2>{{$product->description}}</h2>
                          
                                <div class="customer-review clearfix">
                                    <ul class="rating-box clearfix">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <div class="reviews"><a href="product-single.html">(تقييمات الزبائن 2)</a></div>
                                </div>
                                <div class="item-price"><h3><span  id="total">{{$subcat->price}} </span> ريال </h3></div>
                      
                                
                                <input type="hidden" id="ptype" name="cat" value="{{$product->id}}">
                                <div class="text">
                                    <p>{{$cat->description}}</p>
                                    
                            <p id="desc">{{$product->description}}</p>
                          
                                </div>
                                <div class="other-links">
                                    <ul class="tags list clearfix">
                                        <li>العلامات:</li>
                                        <li><a href="single-shop-1.html">لحوم</a>,</li>
                                        <li><a href="single-shop-1.html">خروف</a></li>
                                    </ul>
                                </div>
                                <div class="othre-options clearfix">
                                    <div class="item-quantity">
                                        <input class="quantity-spinner" type="number" name="quantity" onchange="myFunction()" id="quantity" min="1" value="1">
                                    </div>
                                    <div class="btn-box"><a id="go1" href="#" class="theme-btn">حفظ واستمرار</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       

@endsection