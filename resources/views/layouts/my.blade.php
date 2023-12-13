<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    
    @vite([
        'resources/css/bootstrap.min.css',

        'resources/css/player/main.scss',

        'resources/css/app.css',
        'resources/js/app.js',
        'resources/js/player.js'
    ])

</head>
<body>



<div class="container mt-3">
    <div class="row">

        @if (Request::is('/'))
            @include('inc.hero')
        @endif

        @if (Request::is('my'))
            @include('inc.hero')
        @endif

        <div class="col-3">
        @include('inc.my-left-panel')
        </div>
        
        <div class="col-9">
        @yield('content')
        </div>
        
    </div>
</div>

@include('inc.footer')
   
</body>
</html>
