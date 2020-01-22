<div class="container ">
<nav class="navbar navbar-expand-md navbar-dark bg-dark">

    <a class="navbar-brand" href="{{ route('home') }}">Ticket Analysis</a>
    <ul class="navbar-nav mr-auto">
        <div class="btn-group" role="group" aria-label="Basic example">
          <button type="button" class="btn btn-secondary">Graphic</button>
          <button type="button" class="btn btn-secondary">Table</button>
        </div>
      </ul>

     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
     </button>

    <div class = "collapse navbar-collapse" id="collapsibleNavbar">





    <ul class="navbar-nav ml-auto">
      @if (Auth::check())

        <li class="nav-item"><a class="nav-link" href="#">Need Help</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('users.index')}}">Members</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name }}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('users.show', Auth::user()) }}">My Tickets</a>
             <a class="dropdown-item" href="{{ route('users.edit', Auth::user()) }}">Profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" id="logout" href="#">
              <form action="{{ route('logout') }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-block btn-danger" type="submit" name="button">Logout</button>
              </form>
            </a>
          </div>
        </li>
      @else
        <li class="nav-item"><a class="nav-link" href="{{ route('help') }}">Help</a></li>
        <li class="nav-item" ><a class="nav-link" href="{{ route('login') }}">Login</a></li>
      @endif
    </ul>

  </div>
    </nav>
  </div>
