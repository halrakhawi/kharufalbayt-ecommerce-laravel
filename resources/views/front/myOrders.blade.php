@extends('layouts.frontdtable')
@section('content')
<section class="page-title" style="background-image: url({{asset('assets/front/images/banner/banner-1.jpg')}});">
            <div class="auto-container">
                <div class="content-box">
                    <div class="title-box">
                        <h1>طلباتي</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="#">الرئيسية</a></li>
                        <li><a href="#" class="active">|طلباتي</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <div style="padding:20px; text-align:right;">
            
                  <table id="orders-datatable" class="table table-striped table-bordered"></table>
        </div>

@endsection

