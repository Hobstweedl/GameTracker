@extends('app')

@section('title', 'Games')

@section('content')

<div class="ui items">

  @foreach($games as $game)
    <div class="item">
      <div class="ui small image">
        <img src="{{ GlideImage::load($game->photo)->modify(['w'=> 175, 'h'=>175]) }}"><!-- 175 x 145 -->
      </div>
      <div class="content">
        <div class="header">{{ $game->name}}</div>
        <div class="meta">
          <span>here is where a label will go?</span>
        </div>
        <div class="description">
        {{ $game->description }}

          <!--<img src="/images/wireframe/short-paragraph.png" class="ui wireframe image"> -->
        </div>
      </div>
    </div>
  @endforeach

</div>

@endsection