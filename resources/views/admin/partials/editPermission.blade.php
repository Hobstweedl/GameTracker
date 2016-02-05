<div class="ui modal" id="permissionModal-{{$permission->id}}">
    <i class="close icon"></i>
    <div class="header">
      Edit Permission {{ $permission->name}}
    </div>
    <div class="content">
      
      <div class="description">
        <form class="ui form" id="updatePermissionForm{{$permission->id}}" method="POST" action="{{ route('admin.permissions.update') }}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="id" value="{{ $permission->id }}">
          <div class="fields">
            <div class="eight wide field">
              <label for="name">Name</label>
              <input type="text" name="name" value="{{ $permission->name }}">
            </div>

            <div class="eight wide field">
              <label for="description">Description</label>
              <input type="text" name="description" value="{{ $permission->description }}">
            </div>
          </div>
          
          @foreach($permission->slug as $key => $val)
          <div class="field">
            <div class="ui toggle checkbox">
              <input type="checkbox" name="public" {{ $val == true ? "checked" : "" }}>
              <label>{{ $key }}</label>
            </div>
          </div>
          @endforeach

          <div class="field">
            <label for="slug">New Slug</label>
            <input type="text" name="slug">
          </div>

        </form>
      </div>

    </div>
    <div class="actions">
      <div class="ui positive right labeled icon button updatePermission" data-submit="{{$permission->id}}">
        Update Permission
        <i class="checkmark icon"></i>
      </div>
    </div>
  </div>