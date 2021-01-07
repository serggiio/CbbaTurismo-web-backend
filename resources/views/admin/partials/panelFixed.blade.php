<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Panel de control</a>
    
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-5">

        <a class="btn btn-dark disabled" href="{{ route('logout') }}">
          {{ Auth::user()->name }}
        </a>
        
      </div>

      <div class="col-md-4">

        <a class="btn btn-dark" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

      </div>
      <div class="col-md-1"></div>

    </div>
    
  </nav>



  <nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">

      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Lugares</span>
        <a class="d-flex align-items-center text-muted" href="#">
        </a>
      </h6>
      <ul class="nav flex-column mb-2">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('front.index')}}">   
            <i class="fas fa-list-ol"></i>
             Lista de lugares
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('front.newPlace')}}">
            <i class="fas fa-plus-square"></i>
            Registrar lugar
          </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('front.tags')}}">
            <i class="fas fa-tags"></i>
              Tags
            </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('front.provinces')}}">
          <i class="fas fa-map-signs"></i>
            Provincias
          </a>
      </li>

      </ul>

      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>usuarios</span>
        <a class="d-flex align-items-center text-muted" href="#">
          <span data-feather="plus-circle"></span>
        </a>
      </h6>
      <ul class="nav flex-column mb-2">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('front.users')}}">
            <i class="fas fa-list-ol"></i>
            Lista de usuarios
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('front.newUser')}}">
            <i class="fas fa-plus-square"></i>
            Registrar usuario
          </a>
        </li>
      </ul>


    </div>
  </nav>