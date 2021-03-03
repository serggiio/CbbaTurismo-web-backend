
<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>@yield('Panel de control')</title>



<!-- Bootstrap core CSS -->
<link href="{{ asset('plugins/bootstrap-4.4.1/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!-- Link Swipers CSS -->
<link rel="stylesheet" href="{{ asset('plugins/swiper-master/package/css/swiper.min.css')}}">
<!-- Link font awesome -->
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>

<meta name="theme-color" content="#563d7c">


<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
  </head>

    <body class="">
    
        @include('admin.partials.panelFixed')


          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <div class="btn-toolbar mb-2 mb-md-0">

                <!--<div class="btn-group mr-2">
                  <button class="btn btn-sm btn-outline-secondary">Share</button>
                  <button class="btn btn-sm btn-outline-secondary">Export</button>
                </div>
                <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                  <span data-feather="calendar"></span>
                  This week
                </button>-->


                @include('flash::message')

              </div>
            </div>

  
            <h2>Lista de lugares registrados</h2>

            <table class="table table-hover">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Provincia</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Puntuacion /5</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  
                    @foreach($places as $place)
                    <tr>
                        
                        <th scope="row">{{$place['touristicPlaceId']}}</th>
                        <td>{{$place['placeName']}}</td>
                        <td>{{$place['provinceName']}}</td>
                        @if ($place['type'] == 'place')
                          <td>Lugar</td>
                        @endif
                        @if ($place['type'] == 'event')
                          <td>Evento</td>
                        @endif
                        <td>{{$place['statusName']}}</td>
                        <td>
                          @php                          
                              for($x = 0; $x <= $place['rateAvg']-1; $x++){
                                echo '<i class="fas fa-star"></i>'; 
                              }
                          @endphp
                        </td>
                        <td>
                            <a class="nav-link btn btn-primary" href="{{ route('front.placeDetail', $place['touristicPlaceId'])}}" style="width: fit-content">   
                              <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a class="nav-link btn btn-danger" href="{{ route('admin.place.destroy', $place['touristicPlaceId'])}}" onclick="return confirm('Eliminar?')" style="width: fit-content">   
                              <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                      </tr>
                    @endforeach
                    

                </tbody>
              </table>


            	<div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                  {!! $places->render() !!}
                </div>
                <div class="col-md-4"></div>
              </div>



          </main>



    </body>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <!-- Swiper JS -->
  <script src="{{ asset('plugins/swiper-master/package/js/swiper.min.js')}}"></script>

</html>
