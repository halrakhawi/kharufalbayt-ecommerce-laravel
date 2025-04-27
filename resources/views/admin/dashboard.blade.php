@extends('layouts.admin')
@section('content')

<div class="container-fluid">
                <div class="row">
					<div class="col-xl-3 col-md-6 xl-50">
                        <div class="card o-hidden widget-cards">
                            <div class="bg-warning card-body">
                                <div class="media static-top-widget row">
                                    <div class="icons-widgets col-4">
                                        <div class="align-self-center text-center"><i data-feather="navigation" class="font-warning"></i></div>
                                    </div>
                                    <div class="media-body col-8">مبيعات 
                                        <h3 class="mb-0">{{$totalpay}}<small style="color:#253b70!important;"> ريال </small></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 xl-50">
                        <div class="card o-hidden  widget-cards">
                            <div class="bg-secondary card-body">
                                <div class="media static-top-widget row">
                                    <div class="icons-widgets col-4">
                                        <div class="align-self-center text-center"><i data-feather="box" class="font-secondary"></i></div>
                                    </div>
                                    <div class="media-body col-8">طلبات جديدة
                                        <h3 class="mb-0">{{$neworderscount}}<small style="color:#253b70!important;"> طلب</small></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 xl-50">
                        <div class="card o-hidden  widget-cards">
                            <div class="bg-secondary card-body">
                                <div class="media static-top-widget row">
                                    <div class="icons-widgets col-4">
                                        <div class="align-self-center text-center"><i data-feather="box" class="font-secondary"></i></div>
                                    </div>
                                    <div class="media-body col-8">طلبات مؤكدة
                                        <h3 class="mb-0">{{$confirmorderscount}}<small style="color:#253b70!important;"> طلب</small></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 xl-50">
                        <div class="card o-hidden  widget-cards">
                            <div class="bg-secondary card-body">
                                <div class="media static-top-widget row">
                                    <div class="icons-widgets col-4">
                                        <div class="align-self-center text-center"><i data-feather="box" class="font-secondary"></i></div>
                                    </div>
                                    <div class="media-body col-8">طلبات مكتملة
                                        <h3 class="mb-0">{{$completorderscount}}<small style="color:#253b70!important;"> طلب</small></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 xl-50">
                        <div class="card o-hidden  widget-cards">
                            <div class="bg-secondary card-body">
                                <div class="media static-top-widget row">
                                    <div class="icons-widgets col-4">
                                        <div class="align-self-center text-center"><i data-feather="box" class="font-secondary"></i></div>
                                    </div>
                                    <div class="media-body col-8">طلبات مرفوضة
                                        <h3 class="mb-0">{{$rejectorderscount}}<small style="color:#253b70!important;"> طلب</small></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="col-xl-3 col-md-6 xl-50">
                        <div class="card o-hidden widget-cards">
                            <div class="bg-danger card-body">
                                <div class="media static-top-widget row">
                                    <div class="icons-widgets col-4">
                                        <div class="align-self-center text-center"><i data-feather="users" class="font-danger"></i></div>
                                    </div>
                                    <div class="media-body col-8">العملاء
                                        <h3 class="mb-0">{{$userscount}}<small style="color:#253b70!important;"> عميل</small></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>

@endsection