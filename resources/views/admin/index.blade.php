@extends('app')

@section('title', 'Administration')

@section('content')
    <p>There's a lot to get done in here</p>
	<div class="ui top attached tabular menu">
		<a class="active item" data-tab="roles">Roles</a>
		<a class="item" data-tab="permissions">Permissions</a>
		<a class="item" data-tab="users">Users</a>
	</div>

	<div class="ui bottom attached tab segment active" data-tab="roles">
		<h3>Roles</h3>
		@include('admin.partials.roles')
		
		@include('admin.roleCreate')
    </div>

      <div class="ui bottom attached tab segment" data-tab="permissions">
        permissions
      </div>

      <div class="ui bottom attached tab segment" data-tab="users">
        users
      </div>

      <script>
      	$('.menu .item').tab();
      </script>
@endsection