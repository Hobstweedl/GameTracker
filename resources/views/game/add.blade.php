@extends('app')

@section('title', 'Add Game')

@section('content')

@if (count($errors) > 0)
    <div class="ui error message">
        <div class="header">There was some errors with your submission</div>
        <ul class="list">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

	<form class="ui form" method="post" action="{{ route('game.store') }}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="bgg_id" id ="bgg" value="0">
        
        <div class="field">
        <label for="search">Search for Game</label>
            <div class="ui search">
                <div class="ui icon input">
                    <input class="prompt" type="text" name="name" placeholder="Search For A Game...">
                    <i class="search icon"></i>
                </div>
                <div class="results"></div>
            </div>
        </div>

		<div class="field">
			<label for="description">Description</label>
			<textarea name="description"></textarea>
		</div>

		<div class="ui segment">
			<div class="field">
				<div class="ui toggle checkbox">
					<input type="checkbox" name="scorable" value="1" class="hidden" checked>
					<label>Scorable</label>
				</div>
			</div>
		</div>

        <div class="field">
	        <label for="">&nbsp;</label>
	        <button type="submit" class="ui fluid button primary">Create</button>
        </div>
    </form>

	


<script>

$( document ).ready(function() {
    var url = '{{ url("api/search") }}';

    $('.ui.search').search({
        apiSettings: {
          url: url+'/{query}'
        },
        fields: {
          title   : 'name'
        },
        onSelect(result, response){
            console.log(result)
            $('#bgg').val(result.id);
        },
        //source: content,
        cache: true,
        searchDelay: 500,
        minCharacters: 3,
      })
    ;

    $('.ui.checkbox').checkbox();  
});

</script>
@endsection
