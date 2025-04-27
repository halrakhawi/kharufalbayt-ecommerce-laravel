<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="keywords" content="انعام ,لحوم,حري,حاشي,نعيمي,تيس,خروف البيت, البيت, خروف">
<title>خروف البيت</title>
<style>
    .pager li{
        display: inline;
    }
    .pager li .active{
        color:#063970;
    }
</style>
<!-- Fav Icon -->
<link rel="icon" href="{{asset('assets/front/images/favicon.ico')}}" type="image/x-icon">

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
<link href="{{asset('assets/front/css/jquery-ui.css')}}" rel="stylesheet">
<link href="{{asset('assets/front/css/jquery.bootstrap-touchspin.css')}}" rel="stylesheet">
<link href="{{asset('assets/front/css/color.css')}}" rel="stylesheet">
<link href="{{asset('assets/front/css/style.css')}}" rel="stylesheet">
<link href="{{asset('assets/front/css/responsive.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/front/css/styleArabic.css')}}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-C7LGGQ1XBK"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-C7LGGQ1XBK');
</script>
</head>


<!-- page wrapper -->
<body>

    <div class="boxed_wrapper rtl">

        <!-- preloader -->
        <div class="preloader"></div>
        <!-- preloader -->


        <!-- sidebar cart item -->
        @include('front.includes.sidebar')
        <!-- END sidebar widget item -->


        <!-- main header -->
        @include('front.includes.header')
        <!-- main-header end -->

        @yield('content')
        <!-- funfact-section end -->


        <!-- team-section -->

        <!-- team-section end -->


        <!-- news-section -->

        <!-- news-section end -->


        <!-- main-footer -->
       @include('front.includes.footer')
        <!-- main-footer end -->


        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fa fa-arrow-up"></span>
        </button>
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
    <script src="{{asset('assets/front/js/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/front/js/bxslider.js')}}"></script>
    <script src="{{asset('assets/front/js/jquery.bootstrap-touchspin.js')}}"></script>
    <script src="{{asset('assets/front/js/pagenav.js')}}"></script>
    <script src="{{asset('assets/front/js/main.js')}}"></script>
    
   <!-- main-js -->
   <script src="{{asset('assets/front/js/script.js')}}"></script>
    <script src="{{asset('assets/front/js/function.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        var slideIndex = 1;
        showSlides(slideIndex);
        
        function currentSlide(n) {
          showSlides(slideIndex = n);
        }
        
        function showSlides(n) {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("demo");
          var captionText = document.getElementById("caption");
          if (n > slides.length) {slideIndex = 1}
          if (n < 1) {slideIndex = slides.length}
          for (i = 0; i < slides.length; i++) {
              slides[i].style.display = "none";
          }
          for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";
          dots[slideIndex-1].className += " active";
          captionText.innerHTML = dots[slideIndex-1].alt;
        }
        </script>
        <script>
            function myFunction()
{
 
 
var pid=document.getElementById( "ptype" ).value;
 var quantity=document.getElementById( "quantity" ).value;
	console.log(pid);
 
  $.ajax({
  type: 'post',
  url: '{{route("calculate")}}',
  data: {
   pid:pid,
   quantity:quantity
  },
  headers: {
    'X-CSRF-Token': '{{ csrf_token() }}',
},
  success: function (response) {
	  $( '#total' ).html(response.totalPrice);
	  $( '#desc' ).html(response.description);
 
}
  });
}
        </script>
        <script>
 function segFunction()
{
    var image = document.getElementById('segpic');
var path="{{asset('assets/segmentations/')}}";
    var sid=document.getElementById( "stype" ).value;
	console.log(sid);
    $.ajax({
  type: 'post',
  url: '{{route("showpic")}}',
  data: {
   sid:sid,
  },
  headers: {
    'X-CSRF-Token': '{{ csrf_token() }}',
},
success: function (response) {
    image.src = path+"/"+response.pic;
    //$("#segpic").prop("src","assets/front/images/segmentations/".response.pic);
} 
});
}
        </script>
               <script>
               $('#dis').on('submit',function(e){
                    e.preventDefault();
                    var code = document.getElementById("code").value;
                    console.log(code);
                $.ajax({
                 type: 'post',
                 url: '{{route("discountcode")}}',
                 data: {
                  code:code,
                 },
                 headers: {
                   'X-CSRF-Token': '{{ csrf_token() }}',
               },
               success: function (response) {
		        $('.code_error').text(response.msg);
                }
               });
               });
               </script>
          <script>
 function pacFunction()
{
    var image = document.getElementById('pacpic');
var path="{{asset('assets/packages/')}}";
    var pcid=document.getElementById( "pctype" ).value;
	console.log(pcid);
    $.ajax({
  type: 'post',
  url: '{{route("showpacpic")}}',
  data: {
    pcid:pcid,
  },
  headers: {
    'X-CSRF-Token': '{{ csrf_token() }}',
},
success: function (response) {
    image.src = path+"/"+response.pic;
    //$("#segpic").prop("src","assets/front/images/segmentations/".response.pic);
} 
});
}
        </script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCruIR-E1OQ9TEh5pABARsl8drCCc2PASs&callback=initMap" async defer></script>

<script>
function initMap() {
	
	
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 21.48, lng: 39.19},
      zoom: 13
    });
    console.log(map);
    var input = document.getElementById('searchInput');
   // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    var infowindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
       map: map,
                                    draggable: true,
                                    animation: google.maps.Animation.DROP,
                                    position: {lat: 21.485811, lng: 39.19250479999999}
    });
	
	
                                if ("geolocation" in navigator) {
                                    navigator.geolocation.getCurrentPosition(function (position) {
                                        var currentLatitude = position.coords.latitude;
                                        var currentLongitude = position.coords.longitude;
                                        $('#lat').val(currentLatitude);
                                        $('#lon').val(currentLongitude);
                                        console.log("top");
								   console.log(currentLatitude);
                                        var currentLocation = {lat: currentLatitude, lng: currentLongitude};
                                        map.setCenter(currentLocation);
                                        map.setZoom(15);
                                        marker.setPosition(currentLocation);
                                       
                                    });
                                }
   


    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }
  
        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
       
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);
        $('#lat').val(marker.getPosition().lat());
        $('#lon').val(marker.getPosition().lng());
        console.log("middle");
	console.log(marker.getPosition().lng());
      
    });
	
	google.maps.event.addListener(marker, "dragend", function (event) {
                                    $('#lat').val(this.getPosition().lat());
                                    $('#lon').val(this.getPosition().lng());
                                   console.log("bottom");
								   console.log(this.getPosition().lng());
                                });
}
</script> 
<script>
   $('#go1').click(function() {
      myFunction();
      var url ="{{route('segmentaion')}}";
      location.href =url;
    });
</script>
</body><!-- End of .page_wrapper -->
</html>