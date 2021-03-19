<nav class="navbar-primary">
    <a href="#" class="btn-expand-collapse"><i class="fas fa-expand-arrows-alt"></i></a><br>
    <ul class="navbar-primary-menu">
      <li>
        <a href="{{route('front.index')}}"><i class="fas fa-home navIcon"></i><span class="nav-label btn navButton">Inicio</span></a>
        <a href="{{route('front.places')}}"><i class="fas fa-tree navIcon"></i><span class="nav-label btn navButton">Turismo</span></a>
        <a href="{{route('front.tags')}}"><i class="fas fa-tags navIcon"></i><span class="nav-label btn navButton">Tags</span></a>
        <a href="{{route('front.provinces')}}"><i class="fas fa-flag navIcon"></i><span class="nav-label btn navButton">Provincias</span></a>
        <a href="{{route('front.categories')}}"><i class="fas fa-bookmark navIcon"></i><span class="nav-label btn navButton">Categorías</span></a>
        <a href="{{ route('front.users')}}"><i class="fas fa-users navIcon"></i><span class="nav-label btn navButton">Usuarios</span></a>
        <a href="{{ route('logout') }}"><i class="fas fa-power-off navIcon"></i><span class="nav-label btn navButton" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">Cerrar sesión</span></a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </li>
    </ul>
</nav>