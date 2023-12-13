<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />

 @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>

@include('inc.header')

<div class="container">
    <div class="row">

        @if (Request::is('/'))
            @include('inc.hero')
        @endif

        <div class="col-3">
        @include('inc.left-panel')
        </div>
        
        <div class="col-9">
        @yield('content')
        </div>
        
    </div>
</div>

@include('inc.footer')
   
</body>
</html>
