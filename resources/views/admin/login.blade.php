<!DOCTYPE html>
<html>
<head>
<title>تسجيل دخول الادارة</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif; direction:rtl; }
form {border: 3px solid #f1f1f1;  }
.divce{
text-align: center;
padding-right:20%;
padding-left:20%;
}
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #05486D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 30%;
  border-radius: 30%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>
<div class="divce">
<h2>تسجيل دخول الادارة</h2>
<form action="{{route('admin.postlogin')}}" method="POST">
    @csrf
  <div class="imgcontainer">
    <img src="{{asset('assets/front/images/logo1.png')}}" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>اسم المستخدم</b></label>
    <input type="text" placeholder="اسم المستخدم" name="uname" required>

    <label for="psw"><b>كلمة المرور</b></label>
    <input type="password" placeholder="كلمة المرور" name="psw" required>
        
    <button type="submit">دخول</button>
   
  </div>

 
</form>
</div>
</body>
</html>
