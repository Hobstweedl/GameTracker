<div class="ui middle aligned celled list">

@foreach($roles as $role)
  <div class="item">
    <div class="right floated content">
      <div class="ui buttons">
        <button class="ui icon positive button toggleRoleModal" data-id="{{$role->id}}"><i class="edit icon"></i></button>

        <form class="ui form" method="POST" action="">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="id" value="{{ $role->id}}">
          <input type="hidden" name="_method" value="DELETE">
          <button type="button" class="ui icon negative button" onclick="return confirm('Are you sure?')"><i class="delete icon"></i></button>
        </form>

      </div>
    </div>

    <div class="content">
      <div class="ui horizontal {{ $role->color}} label">
      @if($role->icon)
        <i class=" {{ $role->icon }} icon"></i>
      @endif
      {{ $role->name }}</div> - {{ $role->description }}
    </div>
    
  
  </div>

  @include('admin.partials.editRole', $role)
@endforeach
</div>
