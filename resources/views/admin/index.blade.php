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
		
    <button class="ui fluid button primary createRole">
      Create New Role
    </button>
		@include('admin.roleCreate')
  </div>

      <div class="ui bottom attached tab segment" data-tab="permissions">
        permissions
      </div>

      <div class="ui bottom attached tab segment" data-tab="users">
        @include('admin.partials.users')
      </div>

  <script>

    $( '#modaly input[name="icon"], #modaly input[name="color"], #modaly input[name="name"]' ).on( "keyup", function() {
      createLabel('#modaly')
    });

    $(".toggleModal").click(function(){
      var id = $(this).data('id');
      $('#modal-'+id).modal('show');    
    });

    $(".submitForm").on('click', function(){
      $("#createRoleForm").submit();
    });

    $(".updateRole").on('click', function(){
      var id = $(this).data('submit');
      $("#updateRoleForm"+id).submit();
    });

  	$('.menu .item').tab();
    $('#modaly').modal('attach events', '.createRole', 'show'); 

    function createLabel(identifier){
      var icon = $(identifier + ' input[name="icon"]').val();
      var color = $(identifier + ' input[name="color"]').val();
      var name = $(identifier + ' input[name="name"]').val();

      var iconhtml  = '<i class="' + icon + ' icon"></i>';
      var html = '<div class="ui ' + color + ' horizontal label">' +  iconhtml + name + '</div>';

      $('.preview').html(html);
    }
  </script>
@endsection