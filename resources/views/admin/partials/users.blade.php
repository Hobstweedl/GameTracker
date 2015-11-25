<div class="ui divided items">

@foreach($players as $player)
  <div class="item">

    <div class="ui tiny image">
      {!! $player->profileImage(80, 80) !!}
    </div>

    <div class="content">
      <div class="header">
        {{ $player->username }} - {{ $player->nickname }}
      </div>
      <div class="description">
        @foreach($player->getRoles() as $role)
          <div class="ui label">{{ $role }}</div>
        @endforeach
      </div>
      <div class="extra">
        <a class="ui right floated primary button" href="{{route('player.edit', $player->id)}}">
          Edit
          <i class="right chevron icon"></i>
        </a>
      </div>
    </div>
  </div>
@endforeach
</div>