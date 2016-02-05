@extends('app')

@section('title', $game->name)

@section('content')

	<div class="ui items">
      <div class="item">
        <a class="ui small image">
          <img src="{!! $game->gameCover() !!}" class="ui image">
        </a>
        <div class="content">
          <a class="header">Description</a>
          <div class="description">
            <p>{{ $details['description'] }}</p>
          </div>
        </div>
      </div>
    </div>

    <h2>Previous Times Played</h2>

    <div class="ui divided items">
      @foreach($game->playthroughs as $p)

      <div class="item">
        <div class="content">
          <div class="meta">Played {{$p->played->format('F jS, Y') }}</div>
          <p>{{ $p->notes }}</p>
          
          <div class="ui ordered horizontal list">
            @foreach( $p->players as $player)
                <div class="item">
                <img class="ui avatar image" src="{{ $player->profile() }}">
                <div class="content">
                <div class="header">{{ $player->nickname }}</div>
                {{$player->score}} Schmeckles
                </div>
              </div>
            @endforeach
          </div>
          
        </div>
      </div>
      @endforeach
    </div>


@endsection