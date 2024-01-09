<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if(App\Models\Site::first())
    <title>{{ App\Models\Site::first()->title }} | @yield('page_title')</title>
    @else
    <title>Cooperate Website</title>
    @endif
    @vite(['resources/scss/main.scss', 'resources/js/app.js'])
</head>
<body>
   {{ $slot }}
</body>
</html>
