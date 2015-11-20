@extends('app')

@section('title', 'Players')

@section('content')

<div class="ui items">

  @foreach($users as $user)
    <div class="item">
      <div class="ui small image">
        <img src="{{ GlideImage::load($user->profile_photo)->modify(['w'=> 175, 'h'=>145]) }}"><!-- 175 x 145 -->
      </div>
      <div class="content">
        <div class="header">{{ $user->nickname }}</div>
        <div class="meta">
          <span>Meta Info Goes Here</span>
          
        </div>
        <div class="description">
          <!--<img src="/images/wireframe/short-paragraph.png" class="ui wireframe image"> -->
        </div>
      </div>
    </div>
  @endforeach

</div>

@endsection