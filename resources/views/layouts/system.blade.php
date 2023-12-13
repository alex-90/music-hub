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



<div class="container text-center">
    <div class="row">
        <div class="col"></div>
        <div class="col">

        @yield('content')

        </div>
        <div class="col"></div>
        
    </div>
</div>

@include('inc.footer')
   
</body>
</html>
