@extends('app')

@section('title', 'Games')

@section('content')

<div class="ui special cards">

  @foreach($games as $game)
    @include('game.partials.card', $game)
  @endforeach

</div>

<script>

$('.special.cards .image').dimmer({
  on: 'hover'
});

</script>
@endsection