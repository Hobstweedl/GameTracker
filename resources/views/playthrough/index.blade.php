@extends('app')

@section('title', 'Playthroughs')

@section('content')

<div class="ui items">

  @foreach($active as $play)
  {{ print_r($play) }}
    <div class="item">
      <div class="ui small image">
        <img src="{{ GlideImage::load($play->playthrough->game->photo)->modify(['w'=> 175, 'h'=>175]) }}">
      </div>
      <div class="content">
        <div class="header">{{ $play->playthrough->game->name}} - {{ $play->playthrough->times->last()->
          created_at->format('F jS, Y') }}</div>
        <div class="meta">
          <span>some meta info</span>
          
        </div>
        <div class="description">
          <p>{{ $play->playthrough->notes}}</p>
        </div>

        <div class="extra">
          {{ $play->playthrough->times->last()->action }}
        </div>

      </div>
    </div>
  @endforeach

</div>

@endsection