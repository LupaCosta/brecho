<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Brechó</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    @include('layouts.partials.navbar')

    <!-- Sidebar -->
    @include('layouts.partials.sidebar')

    @include('layouts.partials.footer')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper p-4">
        @yield('content')
    </div>

</div>
</body>
</html>
