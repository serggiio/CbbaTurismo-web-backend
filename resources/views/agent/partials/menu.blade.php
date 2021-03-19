<nav class="navbar-primary">
    <a href="#" class="btn-expand-collapse"><i class="fas fa-expand-arrows-alt"></i></a><br>
    <ul class="navbar-primary-menu">
      <li>
        <a href="{{route('frontAgent.index')}}"><i class="fas fa-home navIcon"></i><span class="nav-label btn navButton">Inicio</span></a>
        <a href="{{route('frontAgent.profile' , $user['userId'])}}"><i class="fas fa-user-circle navIcon"></i><span class="nav-label btn navButton">{{ $user['name']. ' ' .$user['lastName'] }}</span></a>
        <a href="{{ route('logout') }}"><i class="fas fa-power-off navIcon"></i><span class="nav-label btn navButton" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">Cerrar sesión</span></a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </li>
    </ul>
</nav>