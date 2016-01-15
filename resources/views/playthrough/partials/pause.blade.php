<form class="ui form" method="POST" action="">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="id" value="1">
  <input type="hidden" name="_method" value="PUT">
  <button type="button" class="ui button">Pause</button>
</form>