@extends('app')

@section('title', 'Playthroughs')

@section('content')

<div class="ui special cards">

  @foreach($plays as $play)

    @include('playthrough.partials.card', $play)

  @endforeach

</div>


<script>

$('.special.cards .image').dimmer({
  on: 'hover'
});

</script>
@endsection