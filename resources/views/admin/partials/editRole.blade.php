<div class="ui modal" id="modal-{{$role->id}}">
    <i class="close icon"></i>
    <div class="header">
      Edit Role
    </div>
    <div class="content">
      
      <div class="description">
        <form class="ui form" id="updateRoleForm{{$role->id}}" method="POST" action="{{ route('admin.roles.update') }}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="id" value="{{ $role->id }}">
          <div class="fields">
            <div class="eight wide field">
              <label for="name">Name</label>
              <input type="text" name="name" value="{{ $role->name }}">
            </div>

            <div class="eight wide field">
              <label for="name">Slug</label>
              <input type="text" name="slug" value="{{ $role->slug }}">
            </div>
            </div>
            
          <div class="fields">
            <div class="eight wide field">
              <label for="name">Description</label>
              <input type="text" name="description" value="{{ $role->description }}">
            </div>

            <div class="four wide field">
              <label for="color">Color</label>
              <input type="text" name="color" value="{{ $role->color }}">
            </div>

            <div class="four wide field">
              <label for="icon">Icon</label>
              <input type="text" name="icon" value="{{ $role->icon }}">
            </div>   

          </div>
        </form>
      </div>

    </div>
    <div class="actions">
      <div class="ui positive right labeled icon button updateRole" data-submit="{{$role->id}}">
        Update Role
        <i class="checkmark icon"></i>
      </div>
    </div>
  </div>