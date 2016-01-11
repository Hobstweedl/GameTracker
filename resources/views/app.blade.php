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
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/2.0.0/cropper.min.css">
  
  <link rel="stylesheet" type="text/css" href="{{ asset('css/picker.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.6/semantic.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/cropper/2.0.0/cropper.min.js"></script>
  <script src="{{ asset('js/moment.js') }}"></script>
  <script src="{{ asset('js/picker.js') }}"></script>

  <script src="{{ asset('js/app.js') }}"></script>

  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#9e1c20">

</head>
<body class="minimal pushable">

<div class="ui sidebar thin left vertical inverted  menu visible">
  
    @include('partials._sidebar')
  
</div>

<div class="ui pusher">

  <div class="main ui container">
    <h2>@yield('title', 'Board Game Tracker')</h2>
    @yield('content')
  </div>

</div>


</body>

</html>
