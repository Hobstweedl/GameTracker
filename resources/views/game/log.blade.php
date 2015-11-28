@extends('app')

@section('title', 'New Play')

@section('content')

<form class="ui form" method="POST" action="{{ route('playthrough.log') }}">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="field">
    <label>Game</label>
    <input type="text" name="game">
  </div>

  <div class="field">
    
    <label>Players</label>
    <div class="ui fluid search multiple selection dropdown" id="players">
      <input type="hidden" name="players">
      <i class="dropdown icon"></i>
      <div class="default text">Select Players</div>
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
    
    <label>Winners</label>
    <div class="ui fluid search multiple selection dropdown" id="winners">
      <input type="hidden" name="winners">
      <i class="dropdown icon"></i>
      <div class="default text">Select Winners</div>
      <div class="menu list">
        <!-- List -->
        @foreach($players as $player)
        <div class="item" data-value="{{ $player->id }}">
          {!! $player->profileImage() !!}
          {{ $player->nickname }}
        </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="field" id="scores">
    
  </div>

  <div class="field">
    <input type="submit" class="ui primary button" value="Add Play">
  </div>
  

</form>


<script>
$('#players').dropdown({
  placeholder:'Who played?',
});


$('input[name="daterange"]').daterangepicker({
  timePicker: true,
  singleDatePicker: true
});


</script>
@endsection