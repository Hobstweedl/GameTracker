@extends('app')

@section('title', $details['name'])

@section('content')

	<div class="ui items">
      <div class="item">
        <a class="ui small image">
          <img src="{{$details['image']}}" class="ui image">
        </a>
        <div class="content">
          <a class="header">Description</a>
          <div class="description">
            <p>{{ $details['description'] }}</p>
          </div>
        </div>
      </div>
    </div>


@endsection