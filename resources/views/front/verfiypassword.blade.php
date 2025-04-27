<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fav Icon -->
<link rel="icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100;300;400;500;700;800;900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

<!-- Stylesheets -->
<link href="{{asset('assets/front/css/font-awesome-all.css')}}" rel="stylesheet">
<link href="{{asset('assets/front/css/flaticon.css')}}" rel="stylesheet">
<link href="{{asset('assets/front/css/owl.css')}}" rel="stylesheet">
<link href="{{asset('assets/front/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('assets/front/css/jquery.fancybox.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/front/css/animate.css')}}" rel="stylesheet">
<link href="{{asset('assets/front/css/color.css')}}" rel="stylesheet">
<link href="{{asset('assets/front/css/style.css')}}" rel="stylesheet">
<link href="{{asset('assets/front/css/responsive.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/front/css/styleArabic.css')}}">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- page wrapper -->
<title>خروف البيت</title>

</head>
<body  class="bodySign">
    
<div class="container">
    <div class="row rowsign">
        <div class="col-md-6 col-12">
            <h1 class="contentleft">مرحبا بك!</h1>
            <p class="pcontentleft contentleft">
استرجاع كلمة المرور            </p>
            <div class="divImgVectoveSign">
            <img class="ImgVectoveSign" src="{{asset('assets/front/images/logo2.png')}}" alt="">
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="divContentLOGIN">
                <div class="circleLogoSign">
                    <img class="ImgcircleLogoSign" src="{{asset('assets/front/images/logo1.png')}}" alt="">
                </div>
                <form action="{{route('verifypassword')}}" method="post">
                    @csrf
                    <label class="lblPhone" >استعادة كلمة المرور</label>                  
                <div id="LOGIN" class="contentTabs showTab">
                    <i class="fas fa-mail iconSign"></i>
                    <label class="lblPhone" >كود التحقق</label>                  
                    <input class="txtPhone" name="code" type="text" required>
                    <label class="lblPhone" >كلمة المرور الجديدة</label>                  
                    <input class="txtPhone" name="password" type="password" required>
                    <input type="hidden" name="email" value="{{$user->email}}">
                    <input type="hidden" name="activecode" value="{{$user->activate_code}}">
                    <div class="divbtnLOGIN">
                    <button type="submit" class="btnLOGIN">استعادة كلمة المرور</button>
                    </div>   
                    
                </div>

            </form>
           
                </div>
            
            </div>
        </div>
       
    </div>
</div>

<!-- jequery plugins -->
<script src="{{asset('assets/front/js/jquery.js')}}"></script>
    <script src="{{asset('assets/front/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/front/js/owl.js')}}"></script>
    <script src="{{asset('assets/front/js/wow.js')}}"></script>
    <script src="{{asset('assets/front/js/validation.js')}}"></script>
    <script src="{{asset('assets/front/js/jquery.fancybox.js')}}"></script>
    <script src="{{asset('assets/front/js/appear.js')}}"></script>
    <script src="{{asset('assets/front/js/scrollbar.js')}}"></script>
    <script src="{{asset('assets/front/js/nav-tool.js')}}"></script>
    <script src="{{asset('assets/front/js/pagenav.js')}}"></script>
    <script src="{{asset('assets/front/js/script.js')}}"></script>
    <!-- main-js -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- main-js -->
<script src="{{asset('assets/front/js/function.js')}}"></script>
<script src="{{asset('assets/front/js/main.js')}}"></script>



</body>
</html>