@extends('layouts.admin')
@section('content')


<div class="row product-adding" dir="rtl">
    <form action="{{route('admin.segmentations.update',$seg->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row" style="margin: 40px;">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>تعديل التقطيع</h5>
                            </div>
                            <div class="card-body">
                                <div class="digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0"><span>*</span> اسم التقطيع</label>
                                        <input class="form-control" id="validationCustom01" type="text" required="" value="{{$seg->name}}" name="name">
                                    </div>
                                    
                                   
                                    <div class="form-group">
                                        <label class="col-form-label"><span>*</span> الحالة</label>
                                        <div class="m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                            <label class="d-block" for="edo-ani">
                                                <input class="radio_animated" id="edo-ani" type="radio" name="status" value="1" {{ ($seg->status=="1")? "checked" : "" }}>
                                                فعال
                                            </label>
                                            <label class="d-block" for="edo-ani1">
                                                <input class="radio_animated" id="edo-ani1" type="radio" name="status" value="0" {{ ($seg->status=="0")? "checked" : "" }}>
                                                غير فعال
                                            </label>
                                        </div>
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
                                        <label for="validationCustom01" class="col-form-label pt-0"><span>*</span> صورة التقطيع</label>
                                        <img src="{{asset('assets/segmentations/').'/'.$seg->picture}}" style="width:350px;height:300px" name="prepicture">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-form-label">تغيير الصورة</label>
                                        <input type="file" name="picture">
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    
                    
                    </div>
    </row>
    <div class="row card" style="margin: 40px;">
    <div class="form-group mb-0">
    <div class="product-buttons text-center">
        <button type="submit" class="btn btn-primary">تعديل</button>
    </div>
    </div>
    </div>
    </form>               
</div>
            


@endsection