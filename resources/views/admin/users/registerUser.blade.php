
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

<link rel="stylesheet" href="{{asset('plugins/trumbowig/ui/trumbowyg.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/chosen/chosen.css')}}">

<meta name="theme-color" content="#563d7c">


<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
  </head>

    <body class="">
    
        @include('admin.partials.panelFixed')


          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <div class="btn-toolbar mb-2 mb-md-0">
               
              </div>
            </div>

  
            <h2>Registro de nuevo usuario</h2>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <form method="POST" action="{{ action('FrontController@saveNewUser') }}" style="padding-top: 5%" enctype="multipart/form-data">
                      @csrf <!-- {{ csrf_field() }} -->

                        <div class="form-group">
                          <label for="inputUserName">Nombre</label>
                          <input class="form-control" required name="inputUserName" type="text" id="inputUserName">
                        </div>

                        <div class="form-group">
                            <label for="inputUserLastName">Apellido</label>
                            <input class="form-control" required name="inputUserLastName" type="text" id="inputUserLastName">
                        </div>

                        <div class="form-group">
                            <label for="inputUserEmail">Correo</label>
                            <input class="form-control" required name="inputUserEmail" type="email" id="inputUserEmail">
                        </div>

                        <div class="form-group">
                            <label for="inputUserPassword">Contraseña</label>
                            <input class="form-control" required name="inputUserPassword" type="password" id="inputUserPassword">
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputUserType">Rol</label>
                                <select onchange="selectListener()" class="form-control select-province" required="" id="inputUserType" name="inputUserType">
                                    @foreach($userTypes as $userType)
                                        <option value="{{$userType['increments']}}">{{$userType['nameType']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        

                        

                        
                            <br>
                            <button type="submit" class="btn btn-primary">Registrar Usuario!</button>
                        
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>





          </main>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    <script src="{{asset('plugins/jquery/js/jquery-3.3.1.js')}}"></script>    
    <script src="{{asset('plugins/trumbowig/trumbowyg.js')}}"></script>
    <script src="{{asset('plugins/chosen/chosen.jquery.js')}}"></script>



    <!-- Swiper JS -->
    <script src="{{ asset('plugins/swiper-master/package/js/swiper.min.js')}}"></script>
    <-- Import jQuery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        

        <script>

        </script>

        <script>
            $.noConflict();

            $('.select-province').chosen({
    
            });

            $('.select-tag').chosen({
                placeholder_text_multiple: "seleccione tags",
                search_contains: true,
                no_results_text: "No se encontraron tags"
            });
        </script>





    </body>

</html>
