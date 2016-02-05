@extends('app')

@section('title', 'Administration Users')

@section('content')
 
  @include('admin.partials.users')

  <script>

    $( '#modaly input[name="icon"], #modaly input[name="color"], #modaly input[name="name"]' ).on( "keyup", function() {
      createLabel('#modaly')
    });

    // Toggles for Role and permission Edits
    $(".toggleRoleModal").click(function(){
      var id = $(this).data('id');
      $('#roleModal-'+id).modal('show');    
    });

    $(".togglePermissionModal").click(function(){
      var id = $(this).data('id');
      $('#permissionModal-'+id).modal('show');    
    });
    

    $(".submitForm").on('click', function(){
      $("#createRoleForm").submit();
    });


    $(".updateRole").on('click', function(){
      var id = $(this).data('submit');
      $("#updateRoleForm"+id).submit();
    });

    $(".updatePermission").on('click', function(){
      var id = $(this).data('submit');
      //$("#updateRoleForm"+id).submit();
    });


  	$('.menu .item').tab();
    $('#modaly').modal('attach events', '.createRole', 'show');
    $('.ui.accordion').accordion(); 

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