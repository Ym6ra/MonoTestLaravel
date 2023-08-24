<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts/header')
</head>

<body>
    @yield('content')
    @include('layouts/footer')
</body>

</html>
