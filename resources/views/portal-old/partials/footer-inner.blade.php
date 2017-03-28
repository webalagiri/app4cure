<footer id="footer">
    <div class="container">
        <div class="col-md-4 col-sm-6">
            <h4>About us</h4>

            <p>Many people doesn’t not afraid of diseases; they afraid of health care system. <a href="{{ URL::to('/') }}/about">Read more...</a></p>

            <hr>

            <h4>Join our monthly newsletter</h4>

            <form>
                <div class="input-group">

                    <input type="text" class="form-control">

                            <span class="input-group-btn">

                        <button class="btn btn-default" type="button"><i class="fa fa-send"></i></button>

                    </span>

                </div>
                <!-- /input-group -->
            </form>

            <hr class="hidden-md hidden-lg hidden-sm">

        </div>
        <!-- /.col-md-3 -->

        <div class="col-md-4 col-sm-6">

            <h4>Blog</h4>

            <div class="blog-entries">
                <div class="item same-height-row clearfix">
                    <div class="image same-height-always">
                        <a href="#">
                            <img class="img-responsive" src="{{ URL::to('/') }}/img/detailsquare.jpg" alt="">
                        </a>
                    </div>
                    <div class="name same-height-always">
                        <h5><a href="#blog.html">Blogger 1</a></h5>
                    </div>
                </div>

                <div class="item same-height-row clearfix">
                    <div class="image same-height-always">
                        <a href="#">
                            <img class="img-responsive" src={{ URL::to('/') }}/img/detailsquare.jpg" alt="">
                        </a>
                    </div>
                    <div class="name same-height-always">
                        <h5><a href="#">Blogger 2</a></h5>
                    </div>
                </div>

                <div class="item same-height-row clearfix">
                    <div class="image same-height-always">
                        <a href="#">
                            <img class="img-responsive" src="{{ URL::to('/') }}/img/detailsquare.jpg" alt="">
                        </a>
                    </div>
                    <div class="name same-height-always">
                        <h5><a href="#">Blogger 3</a></h5>
                    </div>
                </div>
            </div>

            <hr class="hidden-md hidden-lg">

        </div>
        <!-- /.col-md-3 -->

        <div class="col-md-4 col-sm-6">

            <h4>Contact</h4>

            <p><strong>App4Cure</strong>
                <br>F1, 1/422A
                , Selaiyur
                <br>Tambaram
                , Tamil Nadu,
                <br>
                <strong>India</strong>
            </p>

            <a href="{{ URL::to('/') }}/contact.html" class="btn btn-small btn-template-main">Go to contact page</a>

            <hr class="hidden-md hidden-lg hidden-sm">

        </div>
        <!-- /.col-md-3 -->



    </div>
    <!-- /.container -->
</footer>
<!-- /#footer -->

<div id="copyright">
    <div class="container">
        <div class="col-md-12">
            <p class="pull-left">&copy; <?php echo date("Y"); ?>. Your App4Cure</p>
            <p class="pull-right">Designed &amp; Developed by WAM</a>
                <!-- Not removing these links is part of the license conditions of the template. Thanks for understanding :) If you want to use the template without the attribution links, you can do so after supporting further themes development at https://bootstrapious.com/donate  -->
            </p>

        </div>
    </div>
</div>