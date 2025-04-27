<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
<title>خروف البيت</title>
</head>
<body>
    <img src="{{asset('assets/front/images/logo1.png')}}" width="150px" height="150px" alt="" />
    <br>
    <h3>يوجد لديك طلب جديد</h3>
    <h4>طريقة الدفع : {{$method}}</h4>
    <h4>لمشاهدة الطلب انقر  : <a href="https://www.kharufalbayt.com.sa/admin/orderdetails/{{$order_id}}">هنا</a></h4>
</body>
</html>