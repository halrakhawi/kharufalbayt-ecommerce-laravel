<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="kharufalbayt">
    <meta name="keywords" content="kharufalbayt backend">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('assets/admin/images/favicon/logo2.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('assets/admin/images/favicon/logo2.png')}}" type="image/x-icon">
    <title>خروف البيت الادارة</title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/fontawesome.css')}}">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/flag-icon.css')}}">

    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/icofont.css')}}">

    <!-- Prism css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/prism.css')}}">

    <!-- Chartist css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/chartist.css')}}">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/bootstrap.css')}}">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/admin.css')}}">

    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet">
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

.page-wrapper .page-body-wrapper .page-sidebar .sidebar-menu .sidebar-submenu>li>a {
	
	
	font-size: 18px !important;
}

.page-wrapper .page-body-wrapper .page-sidebar .sidebar-menu .sidebar-header {
	
	
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

.orderdetails{
    color:#253b70;
}

.page-wrapper .page-body-wrapper .page-sidebar .sidebar-user p {
	
	
	font-size: 14px !important;
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


<script type="text/javascript">
        $(document).ready(function () {
           $('#category').change(function () {
             var id = $(this).val();

             $('#subCategory').find('option').not(':first').remove();

             $.ajax({
                url:'getcategory/'+id,
                type:'get',
                dataType:'json',
                success:function (response) {
                    var len = 0;
                    if (response.data != null) {
                        len = response.data.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.data[i].id;
                             var name = response.data[i].name;

                             var option = "<option value='"+id+"'>"+name+"</option>"; 

                             $("#subCategory").append(option);
                        }
                    }
                }
             })
           });
        });
    </script>
</body>
</html>
