@extends('app')

@section('title', 'Players')

@section('content')

<div class="ui special cards">

  @foreach($users as $player)
   @include('player.partials.card', $player)
  @endforeach

</div>


<script>

$('.special.cards .image').dimmer({
  on: 'hover'
});

</script>
@endsection