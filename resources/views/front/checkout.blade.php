@extends('layouts.front')
@section('content')

<section class="page-title" style="background-image: url({{asset('assets/front/images/banner/banner-1.jpg')}});">
        <div class="auto-container">
            <div class="content-box">
                <div class="title-box">
                    <h1>الدفع</h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="#">الرئيسية</a></li>
                    <li><a href="#" class="active">عربة التسوق</a></li>
                    <li><a href="#" class="active">|الدفع</a></li>
                    <li><b>الرقم الضريبي: 3110440546</b></li>
                </ul>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            
            <div class="col-md-6 col-12">
            {{-- <form action="{{route('completepayment')}}" method="post"> --}}
            <form action="{{route('fatoorah.pay')}}" method="post">
                @csrf
                <div class="DivInfoPayment">
                    <h2>معلومات الدفع</h2>
                    <div class="PaymentMethod">
                        <h5>طريقة الدفع</h5>
                        <div class="divSelect">
                            <select name="payment_method" class="js-example-placeholder-single js-states form-control js-select-time1" required>
                            <option></option>
                            @foreach ($pay as $item )
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="DeliverInfo">
                        <h5>معلومات التوصيل</h5>
                        <label>تاريخ التوصيل</label>
                        <div>
                        <input type="date" class="inputDate" value="{{date('Y-m-d', strtotime('tomorrow'))}}" min="{{date('Y-m-d', strtotime('tomorrow'))}}" name="ddate" required>
                        </div>
                        <label>فترة التوصيل</label>
                        <div class="divSelect">
                            <select name="dtime" class="js-example-placeholder-single js-states form-control js-select-time" required>
                                <option></option>
                                <option>الفترة الصباحية</option>
                                <option>فترة ما بعد الظهيرة</option>
                                <option>الفترة المسائية</option>
                              </select>
                        </div>
                        <input type="hidden" name="lat" id="lat">
					    <input type="hidden" name="lon" id="lon">
                        <div class="divbtnBuyNow">
                        <button class="btnBuyNow" type="submit">اكمال الدفع</button>
            </div>
            </form>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="DivMap">
                    <h2>أدخل عنوان التوصيل</h2>
                    <input type="text" placeholder="عنوان التوصيل" class="inputDate">
                    <!-- start map -->
                    <section class="fresh-deals section-padding">
                        <div class="map-gallery-sec section-padding smoothscroll" id="mapgallery">
                                <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="main-box">
                                        <div class="row">
                                                    
                                                    <div class="col-lg-12 col-md-12 col-12" style="margin-bottom: 20px;">
                    <input id="searchInput" class="controls" style="width: 100%; padding: 5px;left: 0px !important; border: 1px solid grey;" type="text" placeholder="ادخل عنوان التوصيل">
                                <div id="map" style="width:100%; height:350px; margin-left:0px;"></div>
                    <!-- end map -->
                    </div>
     
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                        </div>
                    </section>
                    <!-- end map -->
                </div>
            </div>
        </div>
    </div>

@endsection