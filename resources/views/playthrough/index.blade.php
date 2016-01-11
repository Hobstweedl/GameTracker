@extends('app')

@section('title', 'Playthroughs')

@section('content')

<div class="ui items">

  @foreach($plays as $play)
    <div class="item">
      <div class="ui small image">
        <img src="{{ GlideImage::load($play->game->photo)->modify(['w'=> 175, 'h'=>175]) }}">
      </div>
      <div class="content">
        <div class="header">Stuff Goes Here</div>
        <div class="meta">
          <span>&nbsp;</span>
          
        </div>
        <div class="description">
          <!--<img src="/images/wireframe/short-paragraph.png" class="ui wireframe image"> -->
        </div>
      </div>
    </div>
  @endforeach

</div>

@endsection