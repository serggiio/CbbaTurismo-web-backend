
<!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header loginHeader">
            <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Inicio de sesión') }}</h5>
            </button>
          </div>
        <div class="modal-body loginBody">
          
            @if (!Auth::check())
            <div class="container">
              <div class="row justify-content-center">
                  <div class="">
                      <div class="">
          
                          <div class="">
                              <form method="POST" action="{{ route('login') }}">
                                  @csrf
          
                                  <div class="form-group row">
                                      <label style="color: white" for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electronico') }}</label>
          
                                      <div class="col-md-6">
                                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          
                                          @error('email')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
          
                                  <div class="form-group row">
                                      <label style="color: white" for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
          
                                      <div class="col-md-6">
                                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
          
                                          @error('password')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
          
                                  
          
                                  <div class="form-group row mb-0">
                                      <div class="col-md-8 offset-md-4">
                                          <button type="submit" class="btn previewButton">
                                              {{ __('Login') }}
                                          </button>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
            @endif
            @if (Auth::check())
                              
                Sesion activa: {{ Auth::user()->name }} <span class="caret"></span>
                <br>
                <a class="btn btn-dark" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>
  
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                              
            @endif

        </div>

      </div>
    </div>
  </div>