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
                    <li><a href="#" class="active">اكمال الدفع</a></li>
                    <li><a href="#" class="active">|شكرا لك</a></li>
                </ul>
            </div>
        </div>
    </section>
<div class="container">
            <div class="row clearfix finishmsgPayment" >
               
                   
                      <div><h1>  لم تتم العملية - يرجى التأكد من بياناتك</h1></div> 
                 
            </div>
        </div>

@endsection