@extends('layouts.admin')
@section('content')


<div class="row product-adding" dir="rtl">
    <form action="{{route('admin.advertis.store')}}" method="post" enctype="multipart/form-data">
    @csrf
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>الصورة</h5>
                            </div>
                            <div class="card-body">
                                <div class="digital-add needs-validation">
                                    <div class="form-group">
                                        <label class="col-form-label">اضافة الصورة</label>
                                        <input type="file" name="picture">
                                    </div>
                                    @if($errors->has('picture'))
                                            <div class="alert alert-danger">{{ $errors->first('picture') }}</div>
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