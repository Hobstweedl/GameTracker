
  <a class="item">
    <i class="home icon"></i>
    Home
  </a>


  <div class="ui fluid accordion item">
    <i class="space shuttle icon"></i>
    <div class="ui title">Playthrough</div>
  
    <div class="content menu {{ Request::is('playthrough*') ? "active" : "" }}">
      <a class="item">View Playthrough</a>
      <a class="item">Add playthrough</a>
    </div>
  </div>


  <div class="ui fluid accordion item">
    <i class="block layout icon"></i>
    <div class="ui title">Games</div>

    <div class="content menu {{ Request::is('game*') ? "active" : "" }}">
      <a class="item" href="{{ route('game') }}">View Games</a>
      <a class="item" href="{{ route('game.add') }}">Add Game</a>
    </div>
  </div>

  <div class="ui fluid accordion item">
    <i class="users icon"></i>
    <div class="ui title">Players</div>
  
    <div class="content menu {{ Request::is('player*') ? "active" : "" }}">
      <a class="item" href="{{ route('player') }}">View Players</a>
      <a class="item" href="{{ route('player.add') }}">Add Player</a>
      <a class="item">Delete Player</a>
    </div>
  </div>
  

  @if (Auth::check())
  <a class="item" href="{{ route('admin') }}">
    <i class="settings icon"></i>
    Settings
  </a>

  @endif

<script>
$('.accordion')
  .accordion()
;
</script>