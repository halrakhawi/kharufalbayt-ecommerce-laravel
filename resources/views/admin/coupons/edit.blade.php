@extends('layouts.admin')
@section('content')


<div style="flex-wrap: wrap;margin-right: 20px;margin-left: 20px;}" dir="rtl">
    <form action="{{route('admin.coupons.update',$coupon->id)}}" method="post" enctype="multipart/form-data">
    @csrf

                    
                        <div class="card">
                            <div class="card-header">
                                <h5>تعديل كود خصم</h5>
                            </div>
                            <div class="card-body">
                                <div class="digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0"><span>*</span> كود الخصم</label>
                                        <input class="form-control" id="validationCustom01" type="text"  name="code" value="{{$coupon->code}}">
                                        @if($errors->has('code'))
                                            <div class="alert alert-danger">{{ $errors->first('code') }}</div>
                                        @endif
                                    </div>
                                    
                                    <div style="text-align:right">
                                    <label for="exampleFormControlTextarea1" class="form-label"><span>*</span>النوع</label><br>
                                    <select name="type" class="form-select form-select-sm Danger" aria-label=".form-select-sm example">
                                        <option>اختر النوع</option>
                                        <option name="type" {{ ($coupon->type=="نسبة مئوية")? "selected" : "" }} value="نسبة مئوية">نسبة مئوية </option>
                                        <option name="type" {{ ($coupon->type=="قيمة مطلقة")? "selected" : "" }} value="قيمة مطلقة">قيمة مطلقة </option>       
                                    </select>
                                    <span class="text-danger error-text cat_id_error"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0"><span>*</span> مقدار الخصم</label>
                                        <input class="form-control" id="validationCustom01" type="text"  name="discount" value="{{$coupon->discount}}">
                                        @if($errors->has('discount'))
                                            <div class="alert alert-danger">{{ $errors->first('discount') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0"><span>*</span> عدد الاستخدامات</label>
                                        <input class="form-control" id="validationCustom01" type="text"  name="number_of_use" value="{{$coupon->number_of_use}}">
                                        @if($errors->has('number_of_use'))
                                            <div class="alert alert-danger">{{ $errors->first('number_of_use') }}</div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label"><span>*</span> الحالة</label>
                                        <div class="m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                            <label class="d-block" for="edo-ani">
                                                <input class="radio_animated" id="edo-ani" type="radio" name="status" value="1" {{ ($coupon->status=="1")? "checked" : "" }}>
                                                فعال
                                            </label>
                                            <label class="d-block" for="edo-ani1">
                                                <input class="radio_animated" id="edo-ani1" type="radio" name="status" value="0" {{ ($coupon->status=="0")? "checked" : "" }}>
                                                غير فعال
                                            </label>
                                        </div>
                                        @if($errors->has('status'))
                                            <div class="alert alert-danger">{{ $errors->first('status') }}</div>
                                        @endif
                                    </div>
                                    <div class="row card" style="margin: 40px;">
    <div class="form-group mb-0">
    <div class="product-buttons text-center">
        <button type="submit" class="btn btn-primary">تعديل</button>
    </div>
    </div>
    </div>
                        </div>
                    
     
                    </div>
                 
</div>
    
    </form>               
</div>
            


@endsection