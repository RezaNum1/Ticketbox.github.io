<!Doctype html>
<html lang="en">
<head>
    @include('backend.includes.headlink')
</head>
<body>
<div class="menu">
    @include('backend.includes.header_owner')
</div>
<div class="super_container">
    @include('backend.includes.header_container_owner')
    <div class="super_container_inner">
        <div class="super_overlay"></div>
        @yield('content')
    </div>
</div>
@include('backend.includes.scripts')
</body>
</html>