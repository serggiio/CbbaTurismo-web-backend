<nav class="navbar-primary">  
    <ul class="navbar-primary-menu">
      <li>
        <a href="{{route('welcome')}}"><i class="fas fa-home navIcon"></i><span class="nav-label btn navButton">Inicio</span></a>
        <a href="{{route('welcome.previewList')}}"><i class="fas fa-tree navIcon"></i><span class="nav-label btn navButton">Turismo</span></a>
        <a data-bs-toggle="modal" data-bs-target="#contactModal"><i class="fas fa-phone-volume white navIcon"></i><span class="nav-label btn navButton">Contacto</span></a>        
          @if (Auth::check())
            <a href="{{route('front.index')}}"><i class="icon-screen-desktop white"></i><span class="nav-label btn navButton">Panel</span></a>
          @else
            <a data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-sign-in-alt white navIcon"></i><span class="nav-label btn navButton">Sign in</span></a>
          @endif
        <a href="#" class="colapseButton" id="colapseButton"><i class="fas fa-expand-arrows-alt"></i></a>
      </li>
    </ul>
    
</nav>