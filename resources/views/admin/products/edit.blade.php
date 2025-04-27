@extends('layouts.admin')
@section('content')


<div  dir="rtl" style="flex-wrap: wrap;margin-right: 20px;margin-left: 20px;}">
    <form action="{{route('admin.products.update',$product->id)}}" method="post" enctype="multipart/form-data">
    @csrf
                    <div class="col-xl-24">
                        <div class="card">
                            <div class="card-header">
                                <h5>تعديل المنتج</h5>
                            </div>
                            <div class="card-body">
                                <div class="digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0"><span>*</span> اسم المنتج</label>
                                        <input class="form-control" id="validationCustom01" type="text" required="" value="{{$product->name}}" name="name">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-form-label">التفاصيل</label>
                                        <textarea rows="5" cols="12" name="description">{{$product->description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="validationCustom02" class="col-form-label"><span>*</span> السعر</label>
                                        <input class="form-control" id="validationCustom02" type="text" required="" value="{{$product->price}}" name="price">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label"><span>*</span> الحالة</label>
                                        <div class="m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                            <label class="d-block" for="edo-ani">
                                                <input class="radio_animated" id="edo-ani" type="radio" name="status" value="1" {{ ($product->status=="1")? "checked" : "" }}>
                                                فعال
                                            </label>
                                            <label class="d-block" for="edo-ani1">
                                                <input class="radio_animated" id="edo-ani1" type="radio" name="status" value="0" {{ ($product->status=="0")? "checked" : "" }}>
                                                غير فعال
                                            </label>
                                        </div>
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
</div>
    
    </form>               
</div>
            


@endsection