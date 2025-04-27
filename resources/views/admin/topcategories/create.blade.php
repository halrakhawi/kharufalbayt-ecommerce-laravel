@extends('layouts.admin')
@section('content')


<div class="row product-adding" dir="rtl">
    <form action="{{route('admin.topcategories.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row" style="margin: 40px;">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>اضافة تصنيف</h5>
                            </div>
                            <div class="card-body">
                                <div class="digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0"><span>*</span> اسم التصنيف</label>
                                        <input class="form-control" id="validationCustom01" type="text"  name="name">
                                        @if(session()->has('name'))
                                            <div class="alert alert-danger">{{ session('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label"><span>*</span> الحالة</label>
                                        <div class="m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                            <label class="d-block" for="edo-ani">
                                                <input class="radio_animated" id="edo-ani" type="radio" name="status" value="1">
                                                فعال
                                            </label>
                                            <label class="d-block" for="edo-ani1">
                                                <input class="radio_animated" id="edo-ani1" type="radio" name="status" value="0">
                                                غير فعال
                                            </label>
                                        </div>
                                        @if(session()->has('status'))
                                            <div class="alert alert-danger">{{ session('status') }}</div>
                                        @endif
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    
                    
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>الصورة</h5>
                            </div>
                            <div class="card-body">
                                <div class="digital-add needs-validation">
                                    <div class="form-group">
                                        <label class="col-form-label">تحميل الصورة</label>
                                        <input type="file" name="picture">
                                    </div>
                                    @if(session()->has('picture'))
                                            <div class="alert alert-danger">{{ session('picture') }}</div>
                                        @endif
                                    
                                </div>
                            </div>
                        </div>
                    
                    
                    </div>
    </row>
    <div class="row card" style="margin: 40px;">
    <div class="form-group mb-0">
    <div class="product-buttons text-center">
        <button type="submit" class="btn btn-primary">اضافة</button>
    </div>
    </div>
    </div>
    </form>               
</div>
            


@endsection