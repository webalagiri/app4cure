
{!!  Html::script('http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') !!}
{!!  Html::script(asset("js/jquery-1.11.0.min.js")) !!}

<?php
/*
<script>
    window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')
</script>
*/
?>

{!!  Html::script('http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js') !!}

{!!  Html::script(asset('js/jquery.cookie.js')) !!}
{!!  Html::script(asset('js/waypoints.min.js')) !!}
{!!  Html::script(asset('js/jquery.counterup.min.js')) !!}
{!!  Html::script(asset('js/jquery.parallax-1.1.3.js')) !!}
{!!  Html::script(asset('js/front.js')) !!}

<!-- owl carousel -->
{!!  Html::script(asset('js/owl.carousel.min.js')) !!}
@yield('scripts')
