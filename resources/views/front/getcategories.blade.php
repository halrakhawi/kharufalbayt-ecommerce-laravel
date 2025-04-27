@extends('layouts.front')
@section('content')
<section class="page-title" style="background-image: url({{asset('assets/front/images/banner/banner-1.jpg')}});">
            <div class="auto-container">
                <div class="content-box">
                    <div class="title-box">
                        <h1>كل الاصناف</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="#">الرئيسية</a></li>
                        <li><a href="#" class="active">|كل الاصناف</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="row clearfix">
            
                @foreach($catss as $item)
              
                {{-- <div class="col-12" style="text-align:right;padding-bottom:40px;"><h1>{{$item->name}}</h1></div>  --}}
                 {{-- @foreach($item->products as $product ) --}}
            
                <div class="col-lg-3 col-md-6 col-12 shop-block">
                    <div class="shop-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{asset('assets/categories/'.$item->picture)}}" alt="" width="320px" height="320px">
                                <ul class="list clearfix">
                                    <!-- <li><a href=""><i class="flaticon-cart"></i></a></li> -->
                                    <li><a href="{{route('showsubcategory',$item->id)}}">التفاصيل</a></li>
                                </ul>
                            </figure>
                            <div class="lower-content">
                                <h6><a href="{{route('showsubcategory',$item->id)}}">{{$item->name}}</a></h6>
                                <ul class="rating clearfix">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                                {{-- @auth()
                                <span class="price">{{$item->price+( $item->price*0.15)}} ريال</span>
                                @endauth  --}}
                            </div>
                        </div>  
                        </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>


@endsection

