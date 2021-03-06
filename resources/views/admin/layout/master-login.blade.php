<html>
<head>
    <title>Login - @yield('title')</title>
    @section('meta')
        <meta content="IE=edge;text/html;charset=utf-8" http-equiv="X-UA-Compatible">
        <meta name="keywords" content="@yield('meta_keywords')"/>
        <meta name="description" content="@yield('meta_description')">
        <meta name="author" content="Prescription">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    @show

<!-- STYLES -->
    @include('layout.style-login')
<!-- STYLES -->

</head>
<body class="login-page">

    <!-- CONTENT-->
        @yield('content')
    <!-- CONTENT-->

<!-- SCRIPTS -->
    @include('layout.script-login')
<!-- SCRIPTS -->

</body>
</html>




