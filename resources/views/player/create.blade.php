@extends('app')

@section('title', 'Add Player')

@section('content')
    <form class="ui form" method="post" action="action="{{ route('player.store') }}"" enctype="multipart/form-data">
        {!! csrf_field() !!}

        <div class="field">
            <label for="name">Username</label>
            <input type="text" name="username" value="{{ old('username') }}" placeholder="Your username...">
        </div>

        <div class="field">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div class="field">
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>

        <div class="field">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation">
        </div>

        <div class="field">
            <label for="">&nbsp;</label>
            <button type="submit" class="ui fluid button primary">Create</button>
        </div>
    </form>


@endsection