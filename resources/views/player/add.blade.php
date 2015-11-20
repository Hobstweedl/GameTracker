@extends('app')

@section('title', 'Add Player')

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


    <form class="ui form" method="post" action="{{ route('player.store') }}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="offsetx" value="0">
        <input type="hidden" name="offsety" value="0">
        <input type="hidden" name="height" value="0">
        <input type="hidden" name="width" value="0">

        <div class="field">
            <label for="username">Username</label>
            <input type="text" name="username" value="{{ old('username') }}" placeholder="Your username...">
        </div>

        <div class="field">
            <label for="nickname">Nickname</label>
            <input type="text" name="nickname" value="{{ old('nickname') }}" placeholder="Make it funny!">
        </div>

        <div class="field">
          <div class="ui toggle checkbox">
            <input type="checkbox" name="account" value="1" tabindex="0" class="hidden">
            <label>Create an account?</label>
          </div>
        </div>
        
        <div id="account" style="display:none;">
            <div class="field">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ old('email') }}">
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input type="password" name="password">
            </div>

            <div class="field">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation">
            </div>
        </div>

        <div class="field">
            <label for="image">Profile Photo</label>
            <input type="file" name="photo" id="file">
        </div>

        <div class="field">
            <label for="">&nbsp;</label>
            <button type="submit" class="ui fluid button primary">Create</button>
        </div>
    </form>
        <div class="ui segment"><img class="img-responsive" id="preview" ></div>

    


<script>

$( document ).ready(function() {

    $('.ui.checkbox').checkbox({
        onChecked: function() {
          $('#account').show();
        },
        onUnchecked: function() {
          $('#account').hide();
        }
    });  

    $( '#file' ).on( "change", function() {
        var fr = new FileReader();
        fr.readAsDataURL(document.getElementById("file").files[0]);
        fr.onload = function(ev){
            document.getElementById("preview").src= ev.target.result; 
            var $cropped = $('div > img').cropper({
                aspectRatio: 1 / 1,
                strict: false,
                guides: false,
                highlight: false,
                movable: true,
                minCropBoxWidth: 600,
                minCropBoxHeight: 600,
                crop: function(data) {
                    console.log(data);
                    $( "input[name=offsetx]" ).val(data.x);
                    $( "input[name=offsety]" ).val(data.y);
                    $( "input[name=height]" ).val(data.height);
                    $( "input[name=width]" ).val(data.width);
                }
            });
        }
    });
});

</script>
@endsection
