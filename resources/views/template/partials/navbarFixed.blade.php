<nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Cochabamba Turistica</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Inicio
                  <span class="sr-only">(current)</span>
                </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Categorias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Lugares</a>
          </li>
          <li class="nav-item">
            <a data-toggle="modal" data-target="#exampleModal" class="nav-link" href="#">Login</a>
          </li>
          <li class="nav-item">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Launch demo modals
            </button>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('front.index')}}">Lugares</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  @include('template.partials.loginForm')
