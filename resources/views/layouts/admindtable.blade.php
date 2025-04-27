<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Anaam W">
    <meta name="keywords" content="Anaam W backend">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('assets/admin/images/favicon/logo2.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('assets/admin/images/favicon/logo2.png')}}" type="image/x-icon">
    <title>خروف البيت الادارة</title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Font Awesome-->
    <link href="{{asset('assets/front/css/font-awesome-all.css')}}" rel="stylesheet">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/flag-icon.css')}}">

    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/icofont.css')}}">

    <!-- Prism css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/prism.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/jsgrid.css')}}">

    <!-- Chartist css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/chartist.css')}}">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/bootstrap.css')}}">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/admin.css')}}">

    
<link href="{{asset('assets/front/css/datatables.min.css')}}" rel="stylesheet">
 <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" rel="stylesheet">

</head>
<style>


@font-face {
    font-family: JozoorFont;
    src: url('../fonts/Jozoor\ Font.ttf');
}



body{
    font-family: JozoorFont !important;
	font-size: 20px !important;
}
span{
    font-family: JozoorFont !important;
}

.clearfix li a,.clearfix li p, .content-box h1, .content-box p,.theme-btn, .sec-title span, .sec-title h2, .text p, .clearfix li, .inner-box h3, .inner-box p,.lower-content h6, .lower-content span,.inner span, .inner h4, .author-box h5, .author-box span, .count-text,.text,h5,h4, ul li,body,h1,p {
    font-family: JozoorFont !important;
}

.page-wrapper .page-body-wrapper .page-sidebar .sidebar-menu .sidebar-submenu>li>a {
	
	font-family: JozoorFont !important;
	font-size: 18px !important;
}

.page-wrapper .page-body-wrapper .page-sidebar .sidebar-menu .sidebar-header {
	
	font-family: JozoorFont !important;
	font-size: 18px !important;
}

.page-sidebar{
    background-color: #253b70!important;
}
.sidebar-header{
    color: #D2B492!important;
}
span{
    color: #D2B492!important;

}



.page-wrapper .page-body-wrapper .page-sidebar .sidebar-user p {
	
	font-family: JozoorFont !important;
	font-size: 14px !important;
    color: #D2B492!important;
}
</style>

<body class="rtl" onload="RTLfunction()">
<script>
function RTLfunction() {
 
    $('body').removeClass('ltr');
}

</script>

<!-- page-wrapper Start-->
<div class="page-wrapper">

    <!-- Page Header Start-->
    @include("admin.includes.header")
        <!-- Page Sidebar Ends-->

        <!-- Right sidebar Start-->

        <!-- Right sidebar Ends-->

        <div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>لوحة التحكم
                                    <small>بموقع خروف البيت</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item active">لوحة التحكم</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
			@yield('content')
            <!-- Container-fluid Ends-->

        </div>

        <!-- footer start-->
       @include('admin.includes.footer')
        <!-- footer end-->
    </div>

</div>

<!-- latest jquery-->
<script src="{{asset('assets/admin/js/jquery-3.3.1.min.js')}}"></script>

<!-- Bootstrap js-->
<script src="{{asset('assets/admin/js/popper.min.js')}}"></script>
<script src="{{asset('assets/admin/js/bootstrap.js')}}"></script>

<!-- feather icon js-->
<script src="{{asset('assets/admin/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('assets/admin/js/icons/feather-icon/feather-icon.js')}}"></script>

<!-- Sidebar jquery-->
<script src="{{asset('assets/admin/js/sidebar-menu.js')}}"></script>

<!--chartist js-->
<script src="{{asset('assets/admin/js/chart/chartist/chartist.js')}}"></script>

<!--chartjs js-->
<script src="{{asset('assets/admin/js/chart/chartjs/chart.min.js')}}"></script>

<!-- lazyload js-->
<script src="{{asset('assets/admin/js/lazysizes.min.js')}}"></script>

<!--copycode js-->
<script src="{{asset('assets/admin/js/prism/prism.min.js')}}"></script>
<script src="{{asset('assets/admin/js/clipboard/clipboard.min.js')}}"></script>
<script src="{{asset('assets/admin/js/custom-card/custom-card.js')}}"></script>

<!--counter js-->
<script src="{{asset('assets/admin/js/counter/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/admin/js/counter/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/admin/js/counter/counter-custom.js')}}"></script>

<!--peity chart js-->
<script src="{{asset('assets/admin/js/chart/peity-chart/peity.jquery.js')}}"></script>

<!--sparkline chart js-->
<script src="{{asset('assets/admin/js/chart/sparkline/sparkline.js')}}"></script>

<!--Customizer admin-->


<!--dashboard custom js-->
<script src="{{asset('assets/admin/js/dashboard/default.js')}}"></script>

<!--right sidebar js-->
<script src="{{asset('assets/admin/js/chat-menu.js')}}"></script>

<!--height equal js-->
<script src="{{asset('assets/admin/js/height-equal.js')}}"></script>

<!-- lazyload js-->
<script src="{{asset('assets/admin/js/lazysizes.min.js')}}"></script>

<!--script admin-->
<script src="{{asset('assets/admin/js/admin-script.js')}}"></script>

<script src="{{asset('assets/front/js/datatables.min.js')}}"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"> </script>
    <script type="text/javascript">
    console.log("datatable");
    $(document).ready(function() {
        $('#cats-datatable').dataTable({

            language: {
            url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/ar.json'
        },
          
            "ajax": "{{route('admin.categories.allCategories')}}", 
            responsive: true,
            
            "columns": [
                {title: '#الصنف',data: 'id'},
                {title: 'اسم الصنف',data: 'name'},
				{title: 'اسم التصنيف',data: 'topcat'},
				{title: 'السعر',data: 'price'},

                
				{
            data:null,        
			title:'الصورة',
            render:function(data, type, row)
            {
                return '<img src="/assets/categories/'+data['picture']+'" width="40%" height="40%">'
            },
            "targets": -1
        },
        {
            data: null,       
			title:'الحالة',
            render:function(data, type, row)
            {
                if(data['status']==1){
					
					return '<form action="/admin/category/active/'+data['id']+'" method="post">@csrf<button type="submit" class="btn btn-sm btn-success">فعال</button></form>';
				}
				else{
					return '<form action="/admin/category/active/'+data['id']+'" method="post">@csrf<button type="submit" class="btn btn-sm btn-danger">غير فعال</button></form>';
				}
            },
            "targets": -1
        },
        {
            data: null,       
			title:'تعديل',
            render:function(data, type, row)
            {
					
					return '<form action="/admin/category/edit/'+data['id']+'" method="get"><button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-pencil-alt"></i></button></form>';
				
            },
            "targets": -1
        },

            ]
        });
    });
		
    </script> 
<script src="{{asset('assets/front/js/datatables.min.js')}}"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"> </script>
    <script type="text/javascript">
    console.log("datatable");
    $(document).ready(function() {
        $('#topcats-datatable').dataTable({

            language: {
            url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/ar.json'
        },
          
            "ajax": "{{route('admin.topcategories.allCategories')}}", 
            responsive: true,
            
            "columns": [
                {title: '#التصنيف',data: 'id'},
                {title: 'اسم التصنيف',data: 'name'},
				{
            data:null,        
			title:'الصورة',
            render:function(data, type, row)
            {
                return '<img src="/assets/topcategories/'+data['picture']+'" width="40%" height="40%">'
            },
            "targets": -1
        },
        {
            data: null,       
			title:'الحالة',
            render:function(data, type, row)
            {
                if(data['status']==1){
					
					return '<form action="/admin/topcategory/active/'+data['id']+'" method="post">@csrf<button type="submit" class="btn btn-sm btn-success">فعال</button></form>';
				}
				else{
					return '<form action="/admin/topcategory/active/'+data['id']+'" method="post">@csrf<button type="submit" class="btn btn-sm btn-danger">غير فعال</button></form>';
				}
            },
            "targets": -1
        },
        {
            data: null,       
			title:'تعديل',
            render:function(data, type, row)
            {
					
					return '<form action="/admin/topcategory/edit/'+data['id']+'" method="get"><button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-pencil-alt"></i></button></form>';
				
            },
            "targets": -1
        },

            ]
        });
    });
		
    </script> 
	
	
	<script type="text/javascript">
    console.log("datatable");
    $(document).ready(function() {
        $('#subcats-datatable').dataTable({

            language: {
            url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/ar.json'
        },
          
            "ajax": "{{route('admin.subcategories.allsubCategories')}}", 
            responsive: true,
            
            "columns": [
                {title: '#الصنف',data: 'id'},
                {title: 'اسم الصنف الفرعي',data: 'name'},
				{title: 'اسم الصنف',data: 'category'},

                
				{
            data:null,        
			title:'الصورة',
            render:function(data, type, row)
            {
                return '<img src="/assets/subcategories/'+data['picture']+'" width="40%" height="40%">'
            },
            "targets": -1
        },
        {
            data: null,       
			title:'الحالة',
            render:function(data, type, row)
            {
                if(data['flag']==1){
					
					return '<form action="/admin/subcategory/active/'+data['id']+'" method="post">@csrf<button type="submit" class="btn btn-sm btn-success">فعال</button></form>';
				}
				else{
					return '<form action="/admin/subcategory/active/'+data['id']+'" method="post">@csrf<button type="submit" class="btn btn-sm btn-danger">غير فعال</button></form>';
				}
            },
            "targets": -1
        },
         {
            data: null,       
			title:'تعديل',
            render:function(data, type, row)
            {
					
					return '<form action="/admin/subcategory/edit/'+data['id']+'" method="get"><button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-pencil-alt"></i></button></form>';
				
            },
            "targets": -1
        }

            ]
        });
    });
		
    </script> 
	

<script type="text/javascript">
    console.log("datatable");
    $(document).ready(function() {
        $('#products-datatable').dataTable({

            language: {
            url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/ar.json'
        },
          
            "ajax": "{{route('admin.products.allProducts')}}", 
            responsive: true,
            
            "columns": [
                {title: '#النوع',data: 'id'},
                {title: 'اسم النوع',data: 'pname'},
				{title: 'السعر',data: 'price'},

                
				{
            data:null,        
			title:'الصورة',
            render:function(data, type, row)
            {
                return '<img src="/assets/categories/'+data['picture']+'" width="40%" height="40%">'
            },
            "targets": -1
        },
        {
            data: null,       
			title:'الحالة',
            render:function(data, type, row)
            {
                if(data['status']==1){
					
					return '<form action="/admin/product/active/'+data['id']+'" method="post">@csrf<button type="submit" class="btn btn-sm btn-success">فعال</button></form>';
				}
				else{
					return '<form action="/admin/product/active/'+data['id']+'" method="post">@csrf<button type="submit" class="btn btn-sm btn-danger">غير فعال</button></form>';
				}
            },
            "targets": -1
        },
        {
            data: null,       
			title:'تعديل',
            render:function(data, type, row)
            {
					
					return '<form action="/admin/product/edit/'+data['id']+'" method="get"><button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-pencil-alt"></i></button></form>';
				
            },
            "targets": -1
        },

            ]
        });
    });
		
    </script>
    <script type="text/javascript">
        console.log("datatable");
        $(document).ready(function() {
            $('#seg-datatable').dataTable({
    
                language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/ar.json'
            },
              
                "ajax": "{{route('admin.segmentations.allSegmentations')}}", 
                responsive: true,
                
                "columns": [
                    {title: '#التقطيع',data: 'id'},
                    {title: 'اسم التقطيع',data: 'name'},
    
                    
                    {
                data:null,        
                title:'الصورة',
                render:function(data, type, row)
                {
                    return '<img src="/assets/segmentations/'+data['picture']+'" width="40%" height="40%">'
                },
                "targets": -1
            },
            {
                data: null,       
                title:'الحالة',
                render:function(data, type, row)
                {
                    if(data['status']==1){
                        
                        return '<form action="/admin/segmentation/active/'+data['id']+'" method="post">@csrf<button type="submit" class="btn btn-sm btn-success">فعال</button></form>';
                    }
                    else{
                        return '<form action="/admin/segmentation/active/'+data['id']+'" method="post">@csrf<button type="submit" class="btn btn-sm btn-danger">غير فعال</button></form>';
                    }
                },
                "targets": -1
            },
            {
                data: null,       
                title:'تعديل',
                render:function(data, type, row)
                {
                        
                        return '<form action="/admin/segmentation/edit/'+data['id']+'" method="get"><button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-pencil-alt"></i></button></form>';
                    
                },
                "targets": -1
            },
    
                ]
            });
        });
            
        </script> 
    <script type="text/javascript">
        console.log("datatable");
        $(document).ready(function() {
            $('#internal-datatable').dataTable({
    
                language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/ar.json'
            },
              
                "ajax": "{{route('admin.internals.allinternals')}}", 
                responsive: true,
                
                "columns": [
                    {title: '#الكرش',data: 'id'},
                    {title: 'اسم الكرش',data: 'name'},
                    
            {
                data: null,       
                title:'الحالة',
                render:function(data, type, row)
                {
                    if(data['status']==1){
                        
                        return '<form action="/admin/internal/active/'+data['id']+'" method="post">@csrf<button type="submit" class="btn btn-sm btn-success">فعال</button></form>';
                    }
                    else{
                        return '<form action="/admin/internal/active/'+data['id']+'" method="post">@csrf<button type="submit" class="btn btn-sm btn-danger">غير فعال</button></form>';
                    }
                },
                "targets": -1
            },
            {
                data: null,       
                title:'تعديل',
                render:function(data, type, row)
                {
                        
                        return '<form action="/admin/internal/edit/'+data['id']+'" method="get"><button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-pencil-alt"></i></button></form>';
                    
                },
                "targets": -1
            },
    
                ]
            });
        });
            
        </script> 
    <script type="text/javascript">
        console.log("datatable");
        $(document).ready(function() {
            $('#headoptions-datatable').dataTable({
    
                language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/ar.json'
            },
              
                "ajax": "{{route('admin.headoptions.allheadoptions')}}", 
                responsive: true,
                
                "columns": [
                    {title: '#الرأس',data: 'id'},
                    {title: 'اسم خيار الرأس',data: 'options'},
                    
            {
                data: null,       
                title:'الحالة',
                render:function(data, type, row)
                {
                    if(data['status']==1){
                        
                        return '<form action="/admin/headoptions/active/'+data['id']+'" method="post">@csrf<button type="submit" class="btn btn-sm btn-success">فعال</button></form>';
                    }
                    else{
                        return '<form action="/admin/headoptions/active/'+data['id']+'" method="post">@csrf<button type="submit" class="btn btn-sm btn-danger">غير فعال</button></form>';
                    }
                },
                "targets": -1
            },
            {
                data: null,       
                title:'تعديل',
                render:function(data, type, row)
                {
                        
                        return '<form action="/admin/headoptions/edit/'+data['id']+'" method="get"><button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-pencil-alt"></i></button></form>';
                    
                },
                "targets": -1
            },
    
                ]
            });
        });
            
        </script> 
         <script type="text/javascript">
            console.log("datatable");
            $(document).ready(function() {
                $('#pak-datatable').dataTable({
        
                    language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/ar.json'
                },
                  
                    "ajax": "{{route('admin.packages.allPackages')}}", 
                    responsive: true,
                    
                    "columns": [
                        {title: '#التغليف',data: 'id'},
                        {title: 'اسم التغليف',data: 'name'},
        
                        
                        {
                    data:null,        
                    title:'الصورة',
                    render:function(data, type, row)
                    {
                        return '<img src="/assets/packages/'+data['picture']+'" width="40%" height="40%">'
                    },
                    "targets": -1
                },
                {
                    data: null,       
                    title:'الحالة',
                    render:function(data, type, row)
                    {
                        if(data['status']==1){
                            
                            return '<form action="/admin/package/active/'+data['id']+'" method="post">@csrf<button type="submit" class="btn btn-sm btn-success">فعال</button></form>';
                        }
                        else{
                            return '<form action="/admin/package/active/'+data['id']+'" method="post">@csrf<button type="submit" class="btn btn-sm btn-danger">غير فعال</button></form>';
                        }
                    },
                    "targets": -1
                },
                {
                    data: null,       
                    title:'تعديل',
                    render:function(data, type, row)
                    {
                            
                            return '<form action="/admin/package/edit/'+data['id']+'" method="get"><button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-pencil-alt"></i></button></form>';
                        
                    },
                    "targets": -1
                },
        
                    ]
                });
            });
                
            </script> 

<script type="text/javascript">
    console.log("datatable");
    $(document).ready(function() {
        $('#users-datatable').dataTable({

            language: {
            url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/ar.json'
        },
          
            "ajax": "{{route('admin.users.allusers')}}", 
            responsive: true,
            
            "columns": [
                {title: '#المستخدم',data: 'id'},
                {title: 'اسم المستخدم',data: 'name'},
				{title: 'الجوال',data: 'mobile'},
				{title: 'البريد الالكتروني',data: 'email'},
            ]
    });
    });	
    </script> 

<script type="text/javascript">
console.log("datatable");
$(document).ready(function() {
    $('#orders-datatable').dataTable({
order: [[5, 'desc']],
        language: {
        url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/ar.json'
    },
      
        "ajax": "{{route('admin.orders.allOrders')}}", 
        responsive: true,
        
        "columns": [
            {title: '#طلب',data: 'id'},
                {title: 'السعر الكلي',data: 'total_price'},
				{title: 'السعر الصافي',data: 'net_price'},
                {title: 'الضريبة' ,data: 'tax'},
				{title: 'تخفيض' ,data: 'discount'},
				{title: 'التاريخ' ,data: 'ddate'},
				{title: 'وقت التسليم' ,data: 'dtime'},
				
				{
            data: null,
			title:'الحالة',
            render:function(data, type, row)
            {
				
				if(data['status']==0){
              return '<button type="button" class="btn btn-sm btn-primary">في الانتظار</button>';
				}
				else if(data['status']==1){
					
					return '<button type="button" class="btn btn-sm btn-success">تم التأكيد</button>';
				}
                else if(data['status']==2){
					
					return '<button type="button" class="btn btn-sm btn-success">مكتمل</button>';
				}
				else{
					return '<button type="button" class="btn btn-sm btn-danger">تم الرفض</button>';
				}
            },
            "targets": -1
        },
		
		
		{
            data: null,
			title:'عرض',
            render:function(data, type, row)
            {
				 return '<a href=orderdetails/'+ data['id'] +' ><i class="fas fa-eye text-secondary"</i> </a>';
				
            },
            "targets": -1
        },
       
		
            ]
        });
 
    });
    
</script>
<script type="text/javascript">
   $('#orderdetails-datatable').dataTable({

language: {
url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/ar.json'
},

"ajax": "/admin/orderdetailsdata/{{ $orderid ?? ''}}", 
responsive: true,

"columns": [
    
    {title: 'اسم الانعام',data: 'item_name'},
    {title: 'العدد',data: 'quantity'},
    {title: 'نوع التقطيع' ,data: 'segmentname'},
    {title: 'نوع التغليف' ,data: 'packname'},
    {title: 'الكرش' ,data: 'internal'},
    {title: 'الرأس' ,data: 'ahead'},
    {title: 'الختم' ,data: 'stamp'},
    {title: 'ملاحظات' ,data: 'comment'}
    

]
});
</script>
<script type="text/javascript">
    console.log("datatable");
    $(document).ready(function() {
        $('#neworders-datatable').dataTable({
            order: [[5, 'desc']],
    
            language: {
            url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/ar.json'
        },
          
            "ajax": "{{route('admin.orders.allneworders')}}", 
            responsive: true,
            
            "columns": [
                {title: '#طلب',data: 'id'},
                    {title: 'السعر الكلي',data: 'total_price'},
                    {title: 'السعر الصافي',data: 'net_price'},
                    {title: 'الضريبة' ,data: 'tax'},
                    {title: 'تخفيض' ,data: 'discount'},
                    {title: 'التاريخ' ,data: 'ddate'},
                    {title: 'وقت التسليم' ,data: 'dtime'},
                    
                   
            
            {
                data: null,
                title:'عرض',
                render:function(data, type, row)
                {
                     return '<a href=orderdetails/'+ data['id'] +' ><i class="fas fa-eye text-secondary"</i> </a>';
                    
                },
                "targets": -1
            },
           
            
                ]
            });
           
        });
        
    </script>
    <script type="text/javascript">
        console.log("datatable");
        $(document).ready(function() {
            $('#confirmorders-datatable').dataTable({
        order: [[5, 'desc']],
                language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/ar.json'
            },
              
                "ajax": "{{route('admin.orders.allconfirmorders')}}", 
                responsive: true,
                
                "columns": [
                    {title: '#طلب',data: 'id'},
                        {title: 'السعر الكلي',data: 'total_price'},
                        {title: 'السعر الصافي',data: 'net_price'},
                        {title: 'الضريبة' ,data: 'tax'},
                        {title: 'تخفيض' ,data: 'discount'},
                        {title: 'التاريخ' ,data: 'ddate'},
                        {title: 'وقت التسليم' ,data: 'dtime'},
                        
                       
                
                {
                    data: null,
                    title:'عرض',
                    render:function(data, type, row)
                    {
                         return '<a href=orderdetails/'+ data['id'] +' ><i class="fas fa-eye text-secondary"</i> </a>';
                        
                    },
                    "targets": -1
                },
               
                
                    ]
                });
               
            });
            
        </script>
        <script type="text/javascript">
            console.log("datatable");
            $(document).ready(function() {
                $('#completeorders-datatable').dataTable({
            order: [[5, 'desc']],
                    language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/ar.json'
                },
                  
                    "ajax": "{{route('admin.orders.allcompleteorders')}}", 
                    responsive: true,
                    
                    "columns": [
                        {title: '#طلب',data: 'id'},
                            {title: 'السعر الكلي',data: 'total_price'},
                            {title: 'السعر الصافي',data: 'net_price'},
                            {title: 'الضريبة' ,data: 'tax'},
                            {title: 'تخفيض' ,data: 'discount'},
                            {title: 'التاريخ' ,data: 'ddate'},
                            {title: 'وقت التسليم' ,data: 'dtime'},
                            
                           
                    
                    {
                        data: null,
                        title:'عرض',
                        render:function(data, type, row)
                        {
                             return '<a href=orderdetails/'+ data['id'] +' ><i class="fas fa-eye text-secondary"</i> </a>';
                            
                        },
                        "targets": -1
                    },
                   
                    
                        ]
                    });
                   
                });
                
            </script>
<script type="text/javascript">
    console.log("datatable");
    $(document).ready(function() {
        $('#rejectorders-datatable').dataTable({
    order: [[5, 'desc']],
            language: {
            url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/ar.json'
        },
          
            "ajax": "{{route('admin.orders.allrejectorders')}}", 
            responsive: true,
            
            "columns": [
                {title: '#طلب',data: 'id'},
                    {title: 'السعر الكلي',data: 'total_price'},
                    {title: 'السعر الصافي',data: 'net_price'},
                    {title: 'الضريبة' ,data: 'tax'},
                    {title: 'تخفيض' ,data: 'discount'},
                    {title: 'التاريخ' ,data: 'ddate'},
                    {title: 'وقت التسليم' ,data: 'dtime'},
                    
                   
            
            {
                data: null,
                title:'عرض',
                render:function(data, type, row)
                {
                     return '<a href=orderdetails/'+ data['id'] +' ><i class="fas fa-eye text-secondary"</i> </a>';
                    
                },
                "targets": -1
            },
           
            
                ]
            });
           
        });
        
    </script>


<script type="text/javascript">
    console.log("datatable");
    $(document).ready(function() {
        $('#coupon-datatable').dataTable({

            language: {
            url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/ar.json'
        },
          
            "ajax": "{{route('admin.coupons.allcoupons')}}", 
            responsive: true,
            
            "columns": [
                {title: '#الكوبون',data: 'id'},
                {title: 'كود الخصم',data: 'code'},
				{title: 'النوع',data: 'type'},
				{title: 'مقدار الخصم',data: 'discount'},
				{title: 'عدد الاستخدامات',data: 'number_of_use'},
        {
            data: null,       
			title:'الحالة',
            render:function(data, type, row)
            {
                if(data['status']==1){
					
					return '<form action="/admin/coupons/active/'+data['id']+'" method="post">@csrf<button type="submit" class="btn btn-sm btn-success">فعال</button></form>';
				}
				else{
					return '<form action="/admin/coupons/active/'+data['id']+'" method="post">@csrf<button type="submit" class="btn btn-sm btn-danger">غير فعال</button></form>';
				}
            },
            "targets": -1
        },
        {
            data: null,       
			title:'تعديل',
            render:function(data, type, row)
            {
					
					return '<form action="/admin/coupons/edit/'+data['id']+'" method="get"><button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-pencil-alt"></i></button></form>';
				
            },
            "targets": -1
        },

            ]
        });
    });
		
    </script> 

</script>
<script type="text/javascript">
    console.log("datatable");
    $(document).ready(function() {
        $('#advertis-datatable').dataTable({

            language: {
            url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/ar.json'
        },
          
            "ajax": "{{route('admin.advertis.alladvertis')}}", 
            responsive: true,
            
            "columns": [
                {title: '#الاعلان',data: 'id'},                
                {
            data:null,        
            title:'الصورة',
            render:function(data, type, row)
            {
                return '<img src="/assets/advertisments/'+data['picture']+'" width="40%" height="40%">'
            },
            "targets": -1
        },
        {
            data: null,       
            title:'حذف',
            render:function(data, type, row)
            {
                    
                    return '<form action="/admin/advertis/delete/'+data['id']+'" method="post">@csrf<button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button></form>';
                
            },
            "targets": -1
        },

            ]
        });
    });
        
    </script>
    <script type="text/javascript">
        console.log("datatable");
        $(document).ready(function() {
            $('#paymentmethods-datatable').dataTable({
    
                language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/ar.json'
            },
              
                "ajax": "{{route('admin.paymentmethods.allmethods')}}", 
                responsive: true,
                
                "columns": [
                    {title: '#الرقم',data: 'id'},
                    {title: 'طريقة الدفع',data: 'name'},
                    
            {
                data: null,       
                title:'الحالة',
                render:function(data, type, row)
                {
                    if(data['status']==1){
                        
                        return '<form action="/admin/paymentmethods/active/'+data['id']+'" method="post">@csrf<button type="submit" class="btn btn-sm btn-success">فعال</button></form>';
                    }
                    else{
                        return '<form action="/admin/paymentmethods/active/'+data['id']+'" method="post">@csrf<button type="submit" class="btn btn-sm btn-danger">غير فعال</button></form>';
                    }
                },
                "targets": -1
            },
            {
                data: null,       
                title:'تعديل',
                render:function(data, type, row)
                {
                        
                        return '<form action="/admin/paymentmethods/edit/'+data['id']+'" method="get"><button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-pencil-alt"></i></button></form>';
                    
                },
                "targets": -1
            },
    
                ]
            });
        });
            
        </script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsT_PKR_eFxxG9lN3KRKQHtY9ylMtVJOY&callback=initMap&libraries=places" type="text/javascript" async defer></script>
    <script>

                                var lat = parseFloat($('#latitude').val());
                                var lng = parseFloat($('#longitude').val());
                                function initMap() {
                                    map = new google.maps.Map(document.getElementById('map'), {
                                        zoom: 15,
                                        center: {lat: lat, lng: lng},
                                        disableDefaultUI: true
                                    });
                                    marker = new google.maps.Marker({
                                        map: map,
                                        draggable: false,
                                        animation: google.maps.Animation.DROP,
                                        position: {lat: lat, lng: lng},
                                    });
                                }
    </script>
</body>
</html>
