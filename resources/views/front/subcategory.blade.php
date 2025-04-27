@extends('layouts.front')
@section('content')

<section class="page-title" style="background-image: url({{asset('assets/front/images/banner/banner-1.jpg')}});">
            <div class="auto-container">
                <div class="content-box">
                    <div class="title-box">
                        <h1>{{$cat->name}}</h1>
                    </div>
                    <!-- <ul class="bread-crumb clearfix">
                        <li><a href="#">الرئيسية</a></li>
                        <li><a href="#" class="active">|كل التصنيفات</a></li>
                    </ul> -->
                </div>
            </div>
        </section>
        <div class="container">
            <div class="row clearfix">
                @foreach($subcat as $item)
            
                <div class="col-lg-3 col-md-6 col-12 shop-block">
                    <div class="shop-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{asset('assets/subcategories/'.$item->picture)}}" alt="" width="320px" height="320px">
                                <ul class="list clearfix">
                                   <li><a href="{{route('showcategory',$item->id)}}"><i class="flaticon-cart"></i></a></li>
                                    
                                </ul>
                            </figure>
                            <div class="lower-content">
                                <h6><a href="{{route('showcategory',$item->id)}}">{{$item->name}}</a></h6>
                                <ul class="rating clearfix">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                                {{-- @auth()
                                <span class="price">{{$item->price}} ريال</span>
                                @endauth --}}
                            </div>
                        </div>  
                        </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>


@endsection
