
@foreach($permissions as $permission)
  <div class='ui clearing'>
    <div class="ui grid">
      
      <div class="two wide column">
        {{ $permission->name }}
      </div>

      <div class="six wide column">
        <span>{{ $permission->description }}</span><br>
        <strong>Created On </strong> - {{ $permission->created_at->format('F jS, Y') }}
      </div>

      <div class="six wide column">
        <div class="ui accordion">
          <div class="title active">
            <i class="dropdown icon"></i>
            <a>View Permissions</a>
          </div>
          <div class="content">
            @foreach($permission->slug as $key => $id)
              {{ $key }}<br>
            @endforeach
          </div>
        </div>
      </div>

      <div class="two wide column">
        <div class="ui buttons">
          <button class="ui icon positive button togglePermissionModal" data-id="{{$permission->id}}"><i class="edit icon"></i></button>

          <form class="ui form" method="POST" action="">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="{{ $permission->id}}">
            <input type="hidden" name="_method" value="DELETE">
            <button type="button" class="ui icon negative button" onclick="return confirm('Are you sure?')">
              <i class="delete icon"></i>
            </button>
          </form>

        </div>
      </div>

    </div>
  </div>

@include('admin.partials.editPermission', $permission)
@endforeach
