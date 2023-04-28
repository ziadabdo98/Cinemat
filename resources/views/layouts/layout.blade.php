<!DOCTYPE html>

<html lang="en">

@include('layouts.head')

<body>
    <div class="wrapper">
        @include('layouts.header')

        @yield('content')

        @include('layouts.footer')

        @include('layouts.includes')
    </div>

</body>

</html>
