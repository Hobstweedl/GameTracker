@extends('app')

@section('title', 'Edit Player')

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

    <form class="ui form" method="post" action="{{ route('player.update', $player->id) }}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="offsetx" value="0">
        <input type="hidden" name="offsety" value="0">
        <input type="hidden" name="height" value="0">
        <input type="hidden" name="width" value="0">
        
        <div class="two fields">
            <div class="field">
                <label for="username">Username</label>
                <input type="text" name="username" value="{{ $player->username }}" placeholder="Your username...">
            </div>

            <div class="field">
                <label for="nickname">Nickname</label>
                <input type="text" name="nickname" value="{{ $player->nickname }}" placeholder="Make it funny!">
            </div>
        </div>

        <div class="field">
            <label>Biography</label>
            <textarea rows="2" name="bio">{{ $player->bio }}</textarea>
        </div>
        

        <div class="field">
          <div class="ui toggle checkbox">
            <input type="checkbox" name="account" value="1" tabindex="0" class="hidden" {{ !is_null($player->email) ? "checked" : "" }}>
            <label>Create an account?</label>
          </div>
        </div>
        
        <div id="account" style="{{ !is_null($player->email) ? "" : "display:none" }}">
            <div class="field">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ $player->email }}">
            </div>
            
            <div class="two fields">
                <div class="field">
                    <label for="password">Password</label>
                    <input type="password" name="password">
                </div>

                <div class="field">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation">
                </div>
            </div>
        
        </div>

        @if( Auth::user()->is('administrator')) 
            <div class="ui horizontal divider">Roles</div>

            <select class="ui fluid search dropdown" name="roles[]" multiple="">
                @foreach( $roles as $role)
                    @if( $player->is($role->slug) )
                        <option value="{{$role->slug}}" selected>{{$role->name}}</option>
                    @else
                        <option value="{{$role->slug}}">{{$role->name}}</option>
                    @endif
                @endforeach
            </select>

        @endif
        
        <div class="ui horizontal divider">Profile</div>

        <div class="field">
            <label>Current Picture</label>
            {!! $player->profileImage() !!}
           
        </div>


        <div class="field">
            <label for="image">Profile Photo</label>
            <input type="file" name="My_file" id="file">
        </div>

        <div class="field">
            <label for="">&nbsp;</label>
            <button type="submit" class="ui fluid button primary">Update</button>
        </div>
    </form>
        <div class="ui segment"><img class="img-responsive" id="preview" ></div>

    


<script>

$( document ).ready(function() {

    $('select').dropdown({placeholder:'Search for Roles'});
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
            var $cropped = $('#preview').cropper({
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
