
@foreach($players as $player)
  <div class='ui clearing {{ $player->isAccount() ? "" : "red" }} segment'>
    <div class="ui grid">
      
      <div class="two wide column">
        {!! $player->profileImage(80, 80) !!}
      </div>

      <div class="six wide column">
        <h5>{{ $player->nickname }}</h5>
        <strong>{{ $player->username }}</strong> - {{ $player->email }}<br>
        <strong>Created On </strong> - {{ $player->created_at->format('F jS, Y') }}
      </div>

      <div class="six wide column">
        @foreach($player->getRoles() as $role)
          <div class="ui label">{{ $role }}</div>
        @endforeach
      </div>

      <div class="two wide column">
        <a class="ui primary button" href="{{route('player.edit', $player->id)}}">
          Edit
          <i class="right chevron icon"></i>
        </a>
      </div>

    </div>
    

  </div>
@endforeach
