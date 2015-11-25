@extends('app')

@section('title', 'Players')

@section('content')

<div class="ui items">

  @foreach($users as $player)
    <div class="item">
      <div class="ui small image">
        {!! $player->profileImage() !!}
      </div>
      <div class="content">
        <div class="header">{{ $player->nickname }}</div>
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