<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <head>
        <meta charset="utf-8">
        <title>Swiper demo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
      
        <!-- Link Swiper's CSS -->
        <link href="{{ asset('plugins/bootstrap-4.4.1/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('plugins/swiper-master/package/css/swiper.min.css')}}">
        <script src="{{ asset('plugins/swiper-master/package/js/swiper.min.js')}}"></script>
        <!-- Demo styles -->
        <style>
          body {
            background: #fff;
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 14px;
            color:#000;
            margin: 0;
            padding: 0;
          }
          .swiper-container {
            width: 100%;
            padding-top: 50px;
            padding-bottom: 50px;
          }
          .swiper-slide {
            background-position: center;
            background-size: cover;
            width: 300px;
            height: 300px;
      
          }
        </style>
      </head>
      <body>
        <!-- Swiper -->
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <div class="swiper-slide1" style="background-image:url(/images/travel-1.1.jpg)"></div>
            <div class="swiper-slide1" style="background-image:url(/images/travel-1.1.jpg)"></div>
            <div class="swiper-slide1" style="background-image:url(/images/travel-1.1.jpg)"></div>
            <div class="swiper-slide1" style="background-image:url(/images/travel-1.1.jpg)"></div>
            <div class="swiper-slide1" style="background-image:url(/images/travel-1.1.jpg)"></div>
          </div>
          <!-- Add Pagination -->
          <div class="swiper-pagination"></div>
        </div>
      
        <!-- Swiper JS -->
        <script src="../package/js/swiper.min.js"></script>
      
        <!-- Initialize Swiper -->
        <script>
          var swiper = new Swiper('.swiper-container', {
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            coverflowEffect: {
              rotate: 50,
              stretch: 0,
              depth: 100,
              modifier: 1,
              slideShadows : true,
            },
            pagination: {
              el: '.swiper-pagination',
            },
          });
        </script>




</body>
</html>