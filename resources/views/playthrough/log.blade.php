@extends('app')

@section('title', 'Add Play')

@section('content')

<form class="ui form" method="POST" action="{{ route('playthrough.add.log') }}">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="field">

    <label>Game</label>
    <div class="ui fluid search selection dropdown" id="game">
      <input type="hidden" name="game">
      <i class="dropdown icon"></i>
      <div class="default text">Select Game</div>
      <div class="menu">
        @foreach($games as $game)
          <div class="item" data-value="{{ $game->id }}">
            {!! $game->coverImage() !!}
            {{ $game->name }}
          </div>
        @endforeach
      </div>
    </div>

  </div>

  <div class="field">
    
    <label>Players</label>
    <div class="ui fluid search multiple selection dropdown" id="players">
      <input type="hidden" name="players">
      <i class="dropdown icon"></i>
      <div class="default text">Who is playing today?</div>
      <div class="menu">
        @foreach($players as $player)
        <div class="item" data-value="{{ $player->id }}">
          {!! $player->profileImage() !!}
          {{ $player->nickname }}
        </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="field">
    <input type="submit" class="ui primary button" value="Start Playing">
  </div>
  

</form>


<script>
$('#players').dropdown({
  placeholder:'Who is playing today?',
});

$('#game').dropdown();

</script>
@endsection