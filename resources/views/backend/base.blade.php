<!Doctype html>
<html lang="en">
<head>
    @include('backend.includes.headlink')
</head>
<body>
    <div class="menu">
        @include('backend.includes.header')
    </div>
    <div class="super_container">
        @include('backend.includes.header_container')
        <div class="super_container_inner">
            <div class="super_overlay"></div>
            @yield('content')
            @include('backend.includes.footer')
        </div>
    </div>
    @include('backend.includes.scripts')
</body>
</html>