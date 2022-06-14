<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('fontend/assets/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('fontend/assets/css/fontawesome.min.css')}}">
    <!-- jQuery library -->
    <script src="{{asset('fontend/assets/js/jquery-3.5.1.slim.min.js')}}"></script>

    <!-- Popper JS -->
    <script src="{{asset('fontend/assets/js/popper.min.js')}}"></script>
    <!-- Latest compiled JavaScript -->
    <script src="{{asset('fontend/assets/js/bootstrap.bundle.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('fontend/assets/css/style.css')}}">
    <script src="{{asset('fontend/assets/js/jquery.slim.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('fontend/assets/css/all.css')}}"/>
    <link href="{{asset('fontend/assets/css/aos.css')}}" rel="stylesheet">
    <script src="{{asset('fontend/assets/js/aos.js')}}"></script>
    <script src="{{asset('fontend/assets/js/bootstrap.min.js')}}" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{asset('fontend/assets/js/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>

    <title>CRMS</title>
    
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50" id="home">

@include("layouts.fontend.pages.navbar")
@yield('content')
@include("layouts.fontend.pages.footer")
         

<script>
        $("body").ready(function(){
        setTimeout(function(){
        $("div.alert").remove();
        }, 3000 ); // 3 secs

    });
    </script>
<script>
            
            $(".navbar-nav>li>a").on('click',function(){
      $(".navbar-collapse").collapse('hide');
    });

    AOS.init({

    });


$(document).ready(function() {

$('.counter').each(function () {
$(this).prop('Counter',0).animate({
Counter: $(this).text()
}, {
duration: 4000,
easing: 'swing',
step: function (now) {
$(this).text(Math.ceil(now));
}
});
});
});



function openNav() {
  document.getElementById("mySidepanel").style.width = "280px";
  document.getElementById("mySidepanel").style.height = "100%";
}

/* Set the width of the sidebar to 0 (hide it) */
function closeNav() {
  document.getElementById("mySidepanel").style.width = "0";
} 
</script>

</html>
</body>
</html>