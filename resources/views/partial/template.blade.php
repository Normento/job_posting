<!DOCTYPE html>
<html lang="en">
    @include('partial.header')

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
    @include('partial.menu')
    @yield('content')
    @include('partial.footer')
    @include('partial.script')
</body>
</html>
