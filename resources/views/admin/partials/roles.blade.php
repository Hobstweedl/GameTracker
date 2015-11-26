<div class="ui middle aligned celled list">

@foreach($roles as $role)
  <div class="item">
    <div class="right floated content">
      <div class="ui buttons">

        <form class="ui form" method="POST" action="">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="id" value="{{ $role->id}}">
          <input type="hidden" name="_method" value="PUT">
          <button type="button" class="ui icon positive button"><i class="edit icon"></i></button>
        </form>

        <form class="ui form" method="POST" action="">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="id" value="{{ $role->id}}">
          <input type="hidden" name="_method" value="DELETE">
          <button type="button" class="ui icon negative button" onclick="return confirm('Are you sure?')"><i class="delete icon"></i></button>
        </form>

      </div>
    </div>

    <div class="ui avatar image"></div>
    <div class="content">
      <strong>{{ $role->name }}</strong> - {{ $role->description }}
    </div>
  </div>
@endforeach
</div>