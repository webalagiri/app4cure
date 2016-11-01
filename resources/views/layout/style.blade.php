{!!  Html::style('http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800') !!}

<!-- Bootstrap and Font Awesome css -->
{!!  Html::style('http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') !!}
{!!  Html::style('http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css') !!}

<!-- Css animations  -->
{!!  Html::style(asset('css/animate.css')) !!}

<!-- Theme stylesheet, if possible do not edit this stylesheet -->
{!!  Html::style(asset('css/style.default.css')) !!}

<!-- Custom stylesheet - for your changes -->
{!!  Html::style(asset('css/custom.css')) !!}

<!-- Responsivity for older IE -->
<!--[if lt IE 9]>
{!!  Html::script('https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js') !!}
{!!  Html::script('https://oss.maxcdn.com/respond/1.4.2/respond.min.js') !!}
<![endif]-->

{!!  Html::style(asset('css/owl.carousel.css')) !!}
{!!  Html::style(asset('css/owl.theme.css')) !!}


{!! Html::style(asset('css/reset.css')) !!}

@yield('styles')




