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
            أهلا بك يمكنك إدخال معلوماتك وتسجيل الدخول أو الاشتراك في الموقع
            </p>
            <div class="divImgVectoveSign">
            <img class="ImgVectoveSign" src="{{asset('assets/front/images/logo2.png')}}" alt="">
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="divContentLOGIN">
                <div class="circleLogoSign">
                    <img class="ImgcircleLogoSign" src="{{asset('assets/front/images/logo1.png')}}" alt="">
                </div>
                <nav class="navLinksTab">
                    <a id="login" class="linkTab activeTab" href="#LOGIN">تسجيل دخول</a>
                    <a id="signup" class="linkTab" href="#SIGNUP">اشتراك</a>
                </nav>
                <form action="{{route('postlogin')}}" method="post">
                    @csrf
                <div id="LOGIN" class="contentTabs showTab">
                    <i class="fas fa-phone iconSign"></i>
                    <label class="lblPhone" >البريد الالكتروني</label>                  
                    <input class="txtPhone" name="email" type="email" required>
                    {{-- <span class="text-danger error-text mobile_error">{{session('mobileerrors')}}</span> --}}
                    <i class="fas fa-key iconSign"></i>
                    <label class="lblPhone" >كلمة المرور</label>
                    <input class="txtPhone" name="password" type="password">
                    {{-- <span class="text-danger error-text password_error">{{session('passworderrors')}}</span> --}}
                    @if (session()->has('mobileerrors'))
                    <span class="LinkSignUP">
                        <strong>{{ session('mobileerrors') }}</strong>
                    </span>
                @endif
                    @if (session()->has('passworderrors'))
                    <span class="LinkSignUP">
                        <strong>{{ session('passworderrors') }}</strong>
                    </span>
                @endif
                    <a href="{{route('forgotpassword')}}" class="forgetPass">نسيت كلمة المرور؟</a>
                    <div class="divbtnLOGIN">
                    <button type="submit" class="btnLOGIN">تسجيل دخول</button>
                    </div>   
                    <a href="{{route('quick')}}" style="text-align: center;margin-right: 30%;" class="LinkSignUP"> تسجيل سريع</a>                 
                
                        <p class="pSwitchSIgnUP">ليس لديك حساب؟  <a href="javascript:goto(2);" class="LinkSignUP"> اشتراك</a></p>
						<p class="pSwitchSIgnUP"> الرجوع الى <a href="{{route('home')}}" class="LinkSignUP"> الرئيسية</a></p>

                </div>

            </form>
            <form action="{{route('signup')}}" method="post" id="main_form">
                @csrf
                <div  id="SIGNUP" class="contentTabs">
                    <div class="row">
                        <div class=" col-12 FlexSignUp">
                            <i class="fas fa-user iconSign"></i>
                            <label class="lblPhone">الاسم</label>
                            <input class="txtPhone" name="name" type="text" wire:model="name" id="name" required>
                            <span class="text-danger error-text name_error"></span>    
                        </div>
                    <div class="col-md-6 col-12 FlexSignUp">
                        <i class="fas fa-phone iconSign"></i>
                        <label class="lblPhone">رقم الجوال</label>                  
                        <input class="txtPhone" name="mobile" type="text" id="mobile" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                        <span class="text-danger error-text mobile_error"></span>
                    </div>
                    <div class="col-md-6 col-12 FlexSignUp">
                    <i class="fas fa-envelope iconSign"></i>
                    <label class="lblPhone">البريد الالكتروني</label>
                    <input class="txtPhone" name="email" type="email" id="email" required>
                    <span class="text-danger error-text email_error"></span>
                    </div>
                    <div class="col-md-6 col-12 FlexSignUp">
                    <i class="fas fa-key iconSign"></i>
                    <label class="lblPhone">كلمة المرور</label>
                    <input class="txtPhone" name="password" type="password" id="password" required>
                    <span class="text-danger error-text password_error"></span>
                    </div>
                    <div class="col-md-6 col-12 FlexSignUp">
                    <i class="fas fa-key iconSign"></i>
                    <label class="lblPhone">تأكيد كلمة المرور</label>
                    <input class="txtPhone" name="confirm-password" type="password" id="confirm-password" required>
                    <span class="text-danger error-text confirm-password_error"></span>
                    </div>
                   
                    <!-- <i class="fas fa-home iconSign"></i>
                    <label class="lblPhone">كود التفعيل</label>
                    <div class="DivVerfiyCode">
                    <input class="txtPhone"  type="text">
                    <button class="btnLOGIN">ارسال</button>
                    </div> -->
                    
                </div>
            </form>
                <div class="divbtnLOGIN">
                    <button class="btnLOGIN" type="submit">اشتراك</button>
                    </div>                   
                    <p class="pSwitchSIgnUP"> لديك حساب؟  <a href="javascript:goto(1);" class="LinkSignUP"> تسجيل دخول</a></p>
					<p class="pSwitchSIgnUP"> الرجوع الى <a href="{{route('home')}}" class="LinkSignUP"> الرئيسية</a></p>
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
<script>
    function goto(id){
        var x=document.getElementById("LOGIN");
        var y=document.getElementById("SIGNUP");
        var xx=document.getElementById("login");
        var yy=document.getElementById("signup");
        if(id==1){
            x.classList.add("showTab");
            y.classList.remove("showTab");
            xx.classList.add("activeTab");
            yy.classList.remove("activeTab");
        }else{
            y.classList.add("showTab");
            x.classList.remove("showTab");
            yy.classList.add("activeTab");
            xx.classList.remove("activeTab");
        }
    }
</script>

<script type="text/javascript">

$('#main_form').on('submit',function(e){
    e.preventDefault();

    let name = $('#name').val();
    let email = $('#email').val();
    let mobile = $('#mobile').val();
    let password = $('#password').val();
	let cpass=$('#confirm-password').val();
    
    $.ajax({
      url: "{{route('signup')}}",
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        name:name,
        email:email,
        mobile:mobile,
        password:password,
		confirmpassword:cpass
      },
      success:function(response){
        //$('#successMsg').show();
        console.log(response.error);
		
      if(response.status==0){
		   $('.mobile_error').text(response.error.mobile);
		   $('.email_error').text(response.error.email);
		   $('.confirm-password_error').text(response.error.confirmpassword);
	  }
	  else{
		  $.ajax({
  type: 'get',
  url: "{{route('activate')}}",
  data: {
   "_token": "{{ csrf_token() }}",
    mobile: mobile,
    password: password
  },
  success: function (response) {
     window.location.href = "{{route('activate')}}"
    
  }
});
		  
	  }
     

      }
      });
    });
  </script>
  <script>
      function sendsms(){
        window.location.href = "{{route('sendactivation')}}"
      }
  </script>
</body>
</html>