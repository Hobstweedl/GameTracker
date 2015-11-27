@extends('app')

@section('title', 'New Play')

@section('content')

<form class="ui form">

  <div class="field">
    <label>Game</label>
    <input type="text" name="game">
  </div>

  <div class="field">
    <label>Notes</label>
    <textarea name="notes"></textarea>
  </div>


  <div class="field">
    
    <label>Players</label>
    <div class="ui fluid search multiple selection dropdown" id="players">
      <input type="hidden" name="players[]">
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
      <input type="hidden" name="winners[]">
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
  

</form>


<script>
$('#players').dropdown({
  placeholder:'Who played?',

  /*onAdd: function(value, text, $choice) {
    // custom action
    console.log(value, text);
    
    var ch = $choice[0];
    var item = '<div class="item" data-value="' + value + '">';
    item += text;
    item += '</div>';

    $("#winners .list").append(item);
    $('#winners').dropdown('refresh');

  },
  onRemove: function(removedValue, removedText, $removedChoice){
    var item = $("div").find("[data-value='" + removedValue + "']");
    $(item).remove();
    $("#players .list").append(item);
    $('#winners').dropdown('refresh');
    $('#players').dropdown('refresh');
  }
  */
});

$('#winners').dropdown({
  placeholder:'Who won?'
});


</script>
@endsection