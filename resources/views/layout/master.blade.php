<html>
<head>
    <title>@yield('title') - App4Cure </title>
    @section('meta')
        <meta content="IE=edge;text/html;charset=utf-8" http-equiv="X-UA-Compatible">
        <meta name="keywords" content="@yield('meta_keywords')"/>
        <meta name="description" content="@yield('meta_description')">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @show

                <!-- STYLES -->
        @include('layout.style')
        <!-- STYLES -->

</head>
<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="all">

    <!-- HEADER-->
    @include('portal.partials.header-logo')
    <!-- HEADER-->

    <!-- LEFT SIDE BAR-->

    <!-- LEFT SIDE BAR-->

    <!-- CONTENT-->
    @yield('content')
    <!-- CONTENT-->

    <!-- RIGHT SIDE BAR-->

    <!-- RIGHT SIDE BAR-->

    <!-- FOOTER -->
    @include('portal.partials.footer')
    <!-- FOOTER -->




</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- Footer Scripts
============================================= -->
<!-- SCRIPTS -->
@include('layout.script')
<!-- SCRIPTS -->

</body>
</html>




