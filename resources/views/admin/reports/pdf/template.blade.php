<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    
<!-- Bootstrap core CSS -->
<link href="{{ asset('plugins/bootstrap-4.4.1/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!-- Link Swipers CSS -->
<link rel="stylesheet" href="{{ asset('plugins/swiper-master/package/css/swiper.min.css')}}">
<!-- Link font awesome -->
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>

</head>
<style>
    
        
</style>
<body>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

        <table class="table">
            <tr>
                <th scope="col" style="width: 10%; text-align:center"><img src="{{ asset('images/Escudo_de_Cochabamba.svg') }}" alt="" width="80$"></th>
                
                <th scope="col" style="width: 50%; text-align:center"><P>COCHABAMBA TURISTICA <br> REPORTE TURISTICO</P></th>

                <th style="width: 10%"></th>

            </tr>  
        </table>

    <hr>

    <div class="row" style="padding-left: 30px">
        @php
        date_default_timezone_set("America/La_Paz");
        @endphp
        <p>Fecha reporte: {{ date("Y-m-d h:i:sa") }}</p>
    </div>

    <table class="table table-bordered col-md-10" style="font-size: small">
        <thead class="">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Provincia</th>
            <th scope="col">Estado</th>
            <th scope="col">Puntuación</th>
            <th scope="col">Registro</th>
          </tr>
        </thead>
        <tbody>
          
            @foreach($touristicPlaces as $index => $touristicPlace)
                <tr>
                    
                    <th scope="row">{{$index +1}}</th>
                    <td>{{$touristicPlace['placeName']}}</td>
                    <td>{{$touristicPlace['provinceName']}}</td>
                    <td>{{$touristicPlace['status']['statusName']}}</td>
                    <td style="padding-left: 45%">{{$touristicPlace['rateAvg']}}</td>
                    <td>{{$touristicPlace['created_at']}}</td>
                </tr>
            @endforeach
            

        </tbody>
      </table>
    </main>
</body>
</html>