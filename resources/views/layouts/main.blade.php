<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials._head')
</head>
<body id="app-layout">
    @include('partials._header')

    <div class="container">
        @include('partials._messages')
        @yield('content')
        @include('partials._footer')
    </div>

    @include('partials._scripts')

</body>
</html>
