@extends('layouts.admindtable')
@section('content')

<div class="row" style="margin: 40px;">
  <div class="col-xl-6">
      <div class="card">
          <div class="card-header">
              <h5 style="color:#253b70;">معلومات الزبون</h5>
          </div>
          <div class="card-body">
              <div class="digital-add needs-validation">
                  <div class="form-group">
                      <label for="validationCustom01" class="col-form-label pt-0"><span> اسم الزبون</span></label>
                      <label for="validationCustom01" class="col-form-label pt-0 orderdetails"> {{$user->name}}</label>
                      
                  </div>
                  <div class="form-group">
                      <label for="validationCustom01" class="col-form-label pt-0"><span> البريد الالكتروني</span></label>
                      <label for="validationCustom01" class="col-form-label pt-0 orderdetails"> {{$user->email}}</label>
                      
                  </div>
                  <div class="form-group">
                      <label for="validationCustom01" class="col-form-label pt-0"><span> الهاتف</span></label>
                      <label for="validationCustom01" class="col-form-label pt-0 orderdetails">{{$user->mobile}}</label>
                      
                  </div>
                  <div class="form-group">
                    <label for="validationCustom01" class="col-form-label pt-0"></label>
                    <label for="validationCustom01" class="col-form-label pt-0"></label>
                    <label for="validationCustom01" class="col-form-label pt-0"></label>
                    <label for="validationCustom01" class="col-form-label pt-0"></label>
                    
                </div>
                  
                  
              </div>
          </div>
      </div>
  
  
  </div>
  <div class="col-xl-6">
      <div class="card">
          <div class="card-header">
              <h5 style="color:#253b70;">معلومات الدفع</h5>
          </div>
          <div class="card-body">
            <div class="digital-add needs-validation">
              <div class="form-group row">
                  <label for="validationCustom01" class="col-form-label pt-0 col-xl-6"><span>طريقة الدفع</span><span style="float:left">:</span></label>
                  <label for="validationCustom01" class="col-form-label pt-0 col-xl-6 orderdetails"> {{$orderdetails->payment_method}}</label>
                  
              </div>
              <div class="form-group row">
                  <label for="validationCustom01" class="col-form-label pt-0 col-xl-6"><span>السعر الكلي</span><span style="float:left">:</span></label>
                  <label for="validationCustom01" class="col-form-label pt-0 col-xl-6 orderdetails"> {{$orderdetails->total_price}}</label>
                  
              </div>
              <div class="form-group row">
                  <label for="validationCustom01" class="col-form-label pt-0 col-xl-6"><span> السعر الصافي</span><span style="float:left">:</span></label>
                  <label for="validationCustom01" class="col-form-label pt-0 col-xl-6 orderdetails"> {{$orderdetails->net_price}}</label>
                  
              </div>
              <div class="form-group row">
                  <label for="validationCustom01" class="col-form-label pt-0 col-xl-6"><span> الضريبة</span><span style="float:left">:</span></label>
                  <label for="validationCustom01" class="col-form-label pt-0 col-xl-6 orderdetails">{{$orderdetails->tax}}</label>
                  
              </div>
              <div class="form-group row">
                  <label for="validationCustom01" class="col-form-label pt-0 col-xl-6"><span> التخفيض</span><span style="float:left">:</span></label>
                  <label for="validationCustom01" class="col-form-label pt-0 col-xl-6 orderdetails">{{$orderdetails->discount}}</label>
                  
              </div>
              <div class="form-group row">
                  <label for="validationCustom01" class="col-form-label pt-0 col-xl-6"><span> فترة التوصيل</span><span style="float:left">:</span></label>
                  <label for="validationCustom01" class="col-form-label pt-0 col-xl-6 orderdetails">{{$orderdetails->dtime}}</label>
                  
              </div>
              <div class="form-group row">
                  <label for="validationCustom01" class="col-form-label pt-0 col-xl-6"><span> تاريخ التوصيل</span><span style="float:left">:</span></label>
                  <label for="validationCustom01" class="col-form-label pt-0 col-xl-6 orderdetails">{{$orderdetails->ddate}}</label>
                  
              </div>
              
              
              
          </div>
          </div>
      </div>
  
  
  </div>
</row>


        <div style="padding:20px; text-align:right;">
            
                  <table id="orderdetails-datatable" class="table table-striped table-bordered"></table>
                  <a href="{{route('report',$orderdetails->id)}}">طباعة الطلب</a>
        </div>
        <div class="col-xl-12 col-md-12 no-print">
            <div class="ms-panel ms-panel-fh">
                <div class="ms-panel-header" style="text-align:center;">
                    <h3 style="color:#253b70;">الخريطة</h3>
                    <h5>موقع التوصيل  <a target="_blank" href="https://maps.google.com/?q= {{$orderdetails->latitude}} ,{{$orderdetails->longitude}}" style="float: right; font-size: 18px;">
                              <i class="fas fa-compass" aria-hidden="true"></i>&nbsp;&nbsp;الاتجاهات
                          </a></h5>
                  </div>
                  <div class="ms-panel-body">           
                                                              
                        <input type="hidden"  name="lat" id="latitude" value="{{$orderdetails->latitude}} "  required>
                        <input type="hidden"  name="lng" id="longitude" value="{{$orderdetails->longitude}} "  required>
                              
                              <div id="map" style="height:200px;"></div>
                  </div>
                </div>
        
              </div>
              <form action="{{route('admin.orders.changeorderstatus',$orderdetails->id)}}" method="post">
                  @csrf
              <div style="text-align:right">
                <label for="exampleFormControlTextarea1" class="form-label"><span>*</span>تغيير حالة الطلب</label><br>
                <select name="status" class="form-select form-select-sm Danger" aria-label=".form-select-sm example">
                    <option selected>اختر الحالة</option>          
                    <option value="0">قيد الانتظار </option>
                    <option value="1">مؤكدة </option>
                    <option value="2">مكتملة </option>
                    <option value="3">مرفوضة </option>                   
                </select>
                <span class="text-danger error-text cat_id_error"></span>
                <button type="submit" class="btn btn-primary">تغيير</button>
                </div>
            </form>
        @endsection

        
       