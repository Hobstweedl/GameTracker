<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <title>Boardgame Tracker</title>

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.6/semantic.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.6/themes/basic/assets/fonts/icons.eot">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.6/themes/basic/assets/fonts/icons.svg">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.6/themes/basic/assets/fonts/icons.ttf">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.6/themes/basic/assets/fonts/icons.woff">

  <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.6/semantic.min.js"></script>

  <script src="{{ asset('js/app.js') }}"></script>

  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#9e1c20">



  <style type="text/css">
    body {
      background-color: #DADADA;
      background-image: url("{{ asset('bg.jpg') }} ");
    }
    body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
    }
  </style>
  
</head>
<body>

<div class="ui middle aligned center aligned grid">
  <div class="column">
    
    <form class="ui large form" action="/auth/login" method="POST">
    
    <div class="ui segment">
    <h2 class="ui teal image header">
        <div class="content">
            Login to your account
        </div>
    </h2>
    </div>

        {!! csrf_field() !!}
      <div class="ui stacked segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="username" placeholder="Username" value="{{ old('username') }}">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="Password">
          </div>
        </div>

        <div class="field">
            <div class="ui checkbox">
                <input type="checkbox" name="remember">
                <label>Remember Me</label>
            </div>
        </div>

        <button type="submit" class="ui fluid large teal submit button">Login</button>
      </div>

      <div class="ui error message">
        
        @if (count($errors) > 0)
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
      </div>

    </form>
  </div>
</div>

</body>

</html>
