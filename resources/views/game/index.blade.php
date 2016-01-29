@extends('app')

@section('title', 'Games')

@section('content')

<div class="ui link cards">

  @foreach($games as $game)
    @include('game.partials.card', $game)
  @endforeach

</div>

@endsection