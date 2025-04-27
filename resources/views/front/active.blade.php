@extends('layouts.front')
@section('content')
<section class="page-title" style="background-image: url({{asset('assets/front/images/banner/banner-1.jpg')}});">
        <div class="auto-container">
            <div class="content-box">
                <div class="title-box">
                    <h1>التفعيل</h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="#">الرئيسية</a></li>
                    <li><a href="#" class="active">خروف البيت</a></li>
                    <li><a href="#" class="active">|تفعيل الاشتراك</a></li>
                </ul>
            </div>
        </div>
    </section>
<div class="container">
            <div class="row clearfix finishmsgPayment" >
               
                <div class=" col-12 FlexSignUp">
                    <div style="margin-right: 1%;font-size:20px">
                    <i class="fas fa-code iconSign"></i>
                    <label class="lblPhone">كود التفعيل</label>
                    </div>
                    <div class="DivVerfiyCode" style="display: inline-table;">
                    </br></br>
                    <form action="{{route('sendactivation')}}" method="post">
                        @csrf
                    <input class="txtPhone"  type="text" name="code">
                    <button  class="btnSendVerfiy" type="submit" style="margin-top: 10%;">تفعيل</button>
                    </form>
                </div> 
                </div>
            </div>
        </div>

@endsection