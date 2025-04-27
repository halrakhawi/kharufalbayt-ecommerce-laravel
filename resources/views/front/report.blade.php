<html>
    <head>
	<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
	
	<style>
	
	pre{
		font-size: large;
	}
	
	</style>
       
    </head>
<body dir="rtl">
    
    <center> <img src="{{asset('assets/admin/images/favicon/logo2.png')}}" alt="" width="100px" height="100px"></center>
    <center> <p style="text-align: center">مؤسسة خروف البيت للحوم مسجلة في ضريبة القيمة المضافة , الرقم الضريبي:3110440546</p></center>
    <center> <p style="text-align: center">السجل التجاري: 1010744953</p></center>
    <hr>
    <center><img src="https://chart.googleapis.com/chart?cht=qr&chl=Hello+World&chs=160x160&chld=L|0"
        class="qr-code img-thumbnail img-responsive" /></center>
    <hr>
    <center><p style="text-align: center">معلومات العميل</p></center> 
    <table align="center">
       <tr>
           <td><pre>رقم الطلب:{{$order->id}}         </pre></td>
           <td><pre>اسم العميل:{{$user->name}}              </pre></td>
           <td><pre>رقم العميل:{{$user->mobile}}            </pre></td>
        </tr> 
    </table>  
    <hr>
    <center><p style="text-align: center">تفاصيل الطلبية</p></center>
    <table align="center" border="1">
        <tr>
            <td>الانعام</td>
        <td>العدد</td>
        <td>طريقة التقطيع</td>
        <td>طريقة التغليف</td>
        <td>الرأس</td>
        <td>الكرش</td>
        <td>ختم المسلخ</td>
        <td>ملاحظات</td>
    </tr> 
    
    @foreach ($orderdetails as $item )
    <tr>
        <td>{{$item->item_name}}</td>
        <td>{{$item->quantity}}</td>
        <td>{{$item->segmentname}}</td>
             <td>{{$item->packname}}</td>
             <td>{{$item->ahead}}</td>
             <td>{{$item->internal}}</td>
             <td>{{$item->stamp}}</td>
             <td>{{$item->comment}}</td>
            </tr>
            @endforeach
            
        </table>  
        <hr>
        <center><p style="text-align: center">معلومات التسليم</p></center> 
        <table align="center">
            <tr>
                <td><pre>تاريخ التسليم:{{$order->ddate}}         </pre></td>
                <td><pre>وقت التسليم:{{$order->dtime}}              </pre></td>
                <td><pre>يوم ووقت تقديم الطلب:{{$order->created_at}}            </pre></td>
            </tr> 
        </table>  
        <hr>
        <center><p style="text-align: center">معلومات الدفع بالريال</p></center> 
        <center><p style="text-align: center">({{$order->payment_method}})</p></center> 
        <table align="center">
            <tr>
                <td><pre>سعر الانعام:{{$order->net_price}}         </pre></td>
                <td><pre>تكلفة تغليف:{{$order->package_cost}}              </pre></td>
                <td><pre>إجمالي:{{$order->net_price}}            </pre></td>
          </tr> 
         <tr>
             <td><pre>خصم كوبون:{{$order->coupon}}         </pre></td>
             <td><pre>          </pre></td>
             <td><pre>إجمالي الخصم:{{$order->coupon}}            </pre></td>
            </tr> 
            <tr>
                <td><pre>الاجمالي قبل الضريبة:{{$order->net_price}}         </pre></td>
             <td><pre>اجمالي الضريبة:{{$order->tax}}              </pre></td>
             <td><pre><b>المبلغ المستحق:{{$order->total_price}}            </b></pre></td>
            </tr> 
        </table>  
        <hr>
        <center><button class="btn-danger" onClick="window.print()">طباعة الطلب</button></center> 
        <script type="text/javascript">

            $( document ).ready(function() {
                console.log( "ready!" );
            
                let urll = 'https://www.kharufalbayt.com.sa/report/{{ $order->id }}' 
               
                console.log(urll);
                let finalURL =
            'https://chart.googleapis.com/chart?cht=qr&chl=' +String(urll)+
                      '&chs=160x160&chld=L|0'
              
                    // Replace the src of the image with
                    // the QR code image
                    $('.qr-code').attr('src', finalURL);
            });
                </script>
    </body>
    </html>