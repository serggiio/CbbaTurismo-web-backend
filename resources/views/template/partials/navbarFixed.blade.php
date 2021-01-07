<nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Cochabamba Turistica</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal">
              Login
            </button>
          </li>

          @if (Auth::check())
                            
            <li class="nav-item">
              <a class="btn btn-outline-dark" href="{{ route('front.index')}}">Panel</a>
            </li>
                            
          @endif

        </ul>
      </div>
    </div>
  </nav>

  @include('template.partials.loginForm')
