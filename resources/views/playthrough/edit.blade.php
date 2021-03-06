@extends('app')

@section('title', 'Edit Playthrough')

@section('content')

 @if (count($errors) > 0)
  <div class="ui negative message">
    <div class="header">
      There were some problems with your input.
    </div>
    <ul class="list">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form class="ui form" method="POST" action="{{ route('playthrough.store') }}">
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
            {!! $game->coverImage(80, 80) !!}
            {{ $game->name }}
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="fields">
    <div class="eight wide field">
      <label>Date Played</label>
      <input type="text" name="daterange" value="{{ $playthrough->played->format('m/d/Y') }}"></input>
    </div>

    <div class="eight wide field">
      <label>Duration</label>
      <input type="text" name="timerange" value="{{ $playthrough->duration->format('g:i') }}"></input>
    </div>
  </div>

  <div class="field">
    
    <label>Players</label>
    <div class="ui fluid search multiple selection dropdown" id="players">
      <input type="hidden" name="players">
      <i class="dropdown icon"></i>
      <div class="default text">Select Players</div>
      <div class="menu">
        @foreach($players as $player)
          <div class="item" data-value="{{ $player->id }}" data-score="{{ $player_scores[$player->id] }}" >
            {!! $player->profileImage(100, 100) !!}
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
      </div>
    </div>
  </div>

  <div class="field">
    <label>Notes</label>
    <textarea name="notes">
      {{ $playthrough->notes }}
    </textarea>
  </div>

  <div class="field" id="scores"></div>

  <div class="field">
    <input type="submit" class="ui primary button" value="Add Play">
  </div>
  

</form>


<script>
function createScore(id, name, score){
  console.log(score);
  var top = '<div class="ui form" data-score="' + id + '""><div class="inline field">';
  var label = '<label>' + name + '</label>';
  var input = '<input type="text" name="person-' + id + '" placeholder="Score" value="' + score + '">'
  var bottom = '</div></div>';    
  return top+label+input+bottom;
}


$('#players').dropdown({
  placeholder:'Who played?',

  onAdd: function(value, text, choice) {

    var item = '<div class="item" data-value="' + value + '">' + text + '</div>';
    $("#winners .list").append(item);
    $('#winners').dropdown('refresh');
    var scoreEntry = createScore(value, text, $(choice).data('score'));
    $("#scores").append(scoreEntry);

  },
  onRemove: function(removedValue, removedText, removedChoice){
    $('#scores .form[data-score="' + removedValue + '"]').remove();
    $("#winners .list").find("[data-value='" + removedValue + "']").remove();
    $('#winners').dropdown('refresh');
    $('#players').dropdown('refresh');
  }
  
})

$.get( "{{ route('api.players', $p_id) }}", function( oldVals ) {
  var newVals = "{{ Input::old('players') }}";

  if(newVals.length == 0){
    $("#players").dropdown('set selected', oldVals.split(",") );
  } else{
    $("#players").dropdown('set selected', newVals.split(",") );
  }

});

$.get( "{{ route('api.winners', $p_id) }}", function( oldVals ) {
  var newVals = "{{ Input::old('winners') }}";
  if(newVals.length == 0){
    $("#winners").dropdown('set selected', oldVals.split(",") );
  } else{
    $("#winners").dropdown('set selected', newVals.split(",") );
  }

});


$('#winners').dropdown({
  placeholder:'Who won?'
});

var selectedGameID = {{ Input::old("game") !== null ? Input::old('game') : $playthrough->game->id  }}
$('#game').dropdown('set selected', selectedGameID );

$('input[name="daterange"]').daterangepicker({
  timePicker: false,
  singleDatePicker: true
});

</script>
@endsection