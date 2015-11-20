
  <a class="item">
    <i class="home icon"></i>
    Home
  </a>


  <a class="item {{ Request::is('playthrough*') ? "active" : "" }}" href="{{ route('player') }}">
    <i class="space shuttle icon"></i>
    Playthrough
  </a>
  <div class="menu {{ Request::is('playthrough*') ? "" : "hidden" }}">
    <a class="item">View Playthrough</a>
    <a class="item">Add playthrough</a>
  </div>


  <a class="item {{ Request::is('game*') ? "active" : "" }}" href="{{ route('game') }}">
    <i class="block layout icon"></i>
    Games
  </a>
  <div class="menu {{ Request::is('game*') ? "" : "hidden" }}">
      <a class="item" href="{{ route('game') }}">View Games</a>
      <a class="item" href="{{ route('game.add') }}">Add Game</a>
    </div>

  <a class="item {{ Request::is('player*') ? "active" : "" }}" href="{{ route('player') }}">
    <i class="users icon"></i>
    Players
  </a>
  <div class="menu {{ Request::is('player*') ? "" : "hidden" }}">
    <a class="item" href="{{ route('player') }}">View Players</a>
    <a class="item" href="{{ route('player.add') }}">Add Player</a>
    <a class="item">Delete Player</a>
  </div>
  

  @if (Auth::check())
  <a class="item" href="{{ route('admin') }}">
    <i class="settings icon"></i>
    Settings
  </a>

  @endif
