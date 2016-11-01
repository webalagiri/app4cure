<!-- Footer
		============================================= -->
<footer id="footer" class="dark">

    <div class="container">

        <!-- Footer Widgets
        ============================================= -->
        <div class="footer-widgets-wrap clearfix">

            <div class="row">

                <div class="col-md-4">

                    <img src="{{ URL::to('/') }}/images/logo-footer.png"/>
                    <div class="dividersmall"></div>
                    <p>The information provided on the site relating to disease, injury, medicines and other treatments, medical devices and/or health products does not amount to advice, and if advice is needed appropriate medical help should be sought from a professional. By using this site, you agree to Healthoyo Terms and Conditions.</p>
                    <div class="dividersmall"></div>
                    <div>Copyrights &copy; 2016 <br/>All Rights Reserved by Healthoyo</div>

                </div>

                <div class="col-md-8">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="widget widget_links clearfix">

                                <h4>USEFUL LINKS</h4>

                                <ul>
                                    <li><a href="{{URL::to('/')}}/whyhealthoyo">Why HealthOYO</a></li>
                                    <li><a href="{{URL::to('/')}}/aboutus">About Us</a></li>
                                    <li><a href="{{URL::to('/')}}/ourservices">Our Services</a></li>
                                    <li><a href="{{URL::to('/')}}/howitworks">How it Works</a></li>
                                    <li><a href="{{URL::to('/')}}/helpcenter">Help Center</a></li>
                                    <li><a href="{{URL::to('/')}}/contactus">Contact Us</a></li>
                                    <li><a href="{{URL::to('/')}}/sitemap">Sitemap</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="widget widget_links clearfix">

                                <h4>PARTNER PROGRAMS</h4>

                                <ul>
                                    <li><a href="{{URL::to('/')}}/hospital/register">For Hospitals</a></li>
                                    <li><a href="{{URL::to('/')}}/interpreter/register">For Language Interpreters</a></li>
                                    <li><a href="{{URL::to('/')}}/accommodations/register">For Accommodations</a></li>

                                </ul>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="widget widget_links clearfix">

                                <h4>LEGAL</h4>

                                <ul>
                                    <li><a href="{{URL::to('/')}}/terms">Terms & Conditions</a></li>
                                    <li><a href="{{URL::to('/')}}/privacypolicy">Privacy Policy</a></li>
                                    <li><a href="{{URL::to('/')}}/disclaimer">Disclaimer</a></li>

                                </ul>





                            </div>
                        </div>

                    </div><!-- /row-->
                    <div class="dividermedium"></div>

                    <div class="row">
                        <div class="col-md-7">
                            @if (session('status1'))
                                <div style="color:green; font-family:verdana;font-style: oblique">
                                    {{ session('status1') }}
                                </div>
                            @endif

                            @if (session('status2'))
                                <div style="color:red; font-family:verdana; font-style: oblique">
                                    {{ session('status2') }}
                                </div>
                            @endif
                                <h4>SIGNUP FOR OUR NEWSLETTER</h4>
                                {!! Form::open( array( 'url' => 'subscription', 'role' => 'form' ,'method'=>'POST', 'id'=>'widget-subscribe-form', 'class'=>'nobottommargin') ) !!}
                                <div class="input-group divcenter">

                                    <span class="input-group-addon emsu"><i class="icon-email2"></i></span>
                                    {!! Form::email('email', null, array('id'=>'email', 'name'=>'email', 'value'=>'', 'class'=>'form-control required email emsinp', 'placeholder'=>'Enter your Email'))!!}
                                    <span class="input-group-btn">
                                        <button class="btn btn-success btnhvy" type="submit" style="background: #e19696 !important;border-color: #e19696 !important;color: #000!important;">Subscribe</button>
                                    </span>
                                </div>
                                <div style="color:red">
                                    @if ($errors->has('email'))<p class="error" style="">{!!$errors->first('email')!!}</p>@endif
                                </div>
                                {!! Form::close() !!}

                        </div>
                        <div class="col-md-4 pull-right">
                            <h4>WE ARE VERY SOCIAL!</h4>

                            <div class="clearfix">
                                <a href="#" class="social-icon si-small si-borderless si-facebook">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>							</a>

                                <a href="#" class="social-icon si-small si-borderless si-twitter">
                                    <i class="icon-twitter"></i>
                                    <i class="icon-twitter"></i>							</a>

                                <a href="#" class="social-icon si-small si-borderless si-gplus">
                                    <i class="icon-gplus"></i>
                                    <i class="icon-gplus"></i>							</a>



                                <a href="#" class="social-icon si-small si-borderless si-linkedin">
                                    <i class="icon-linkedin"></i>
                                    <i class="icon-linkedin"></i>							</a>						</div>
                        </div>
                    </div><!-- /row-->


                </div><!-- /col-md-8-->

            </div><!-- /row-->
        </div>
        <!-- .footer-widgets-wrap end -->

    </div>



</footer><!-- #footer end -->


<footer id="footer" class="dark hidden">

    <div class="container">

        <!-- Footer Widgets
        ============================================= -->
        <div class="footer-widgets-wrap clearfix">


            <div class="col-md-3">
                <div class="widget widget_links clearfix">

                    <h4>ABOUT HEALTHVISTAZ</h4>

                    <ul>
                        <li><a href="{{URL::to('/')}}/aboutus">About Us</a></li>
                        <li><a href="{{URL::to('/')}}/howitwork">How it works</a></li>
                        <li><a href="{{URL::to('/')}}/faq">FAQ</a></li>
                        <li><a href="{{URL::to('/')}}/sitemap">Site Maps</a></li>
                        <li><a href="{{URL::to('/')}}/contactus">Contact Us</a></li>
                        <li><a href="{{URL::to('/')}}/terms" target="_blank">Terms of Use</a></li>
                        <li><a href="{{URL::to('/')}}/privacypolicy" target="_blank">Privacy Policy</a></li>
                        <li><a href="{{URL::to('/')}}/disclaimer" target="_blank">Disclaimer</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="widget widget_links clearfix">

                    <iframe width="640" height="360" src="https://www.youtube.com/embed/J2SlG5nkumM?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>

                </div>
            </div>
            <?php /* ?>
            <div class="col-md-3">
                <div class="widget widget_links clearfix">

                    <h4>PARTNER PROGRAMS</h4>

                    <ul>
                        <li><a href="">Are you a Healthcare Provider</a></li>
                        <li><a href="">Are you a Healthcare Facilitator</a></li>
                        <li><a href="">Are you a Tourist Operator</a></li>
                        <li><a href="">Are you a Translator</a></li>
                        <li><a href="">Are you Accommodation Provider</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3">
                <div class="widget widget_links clearfix">

                    <h4>MORE LINKS</h4>

                    <ul>
                        <li><a href="{{URL::to('/')}}/terms" target="_blank">Terms of Use</a></li>
                        <li><a href="{{URL::to('/')}}/privacypolicy" target="_blank">Privacy Policy</a></li>
                        <li><a href="{{URL::to('/')}}/disclaimer" target="_blank">Disclaimer</a></li>
                        <li><a href="">User Agreement for Patients</a></li>
                        <li><a href="">Agreement for Hospitals</a></li>
                        <li><a href="">Agreement for service providers</a></li>
                    </ul>
                </div>
            </div>
            <?php */ ?>
            <div class="col-md-3">
                <div class="widget widget_links clearfix">


                    <h4>Follow us</h4>

                    <div class="clearfix">
                        <a href="#" class="social-icon si-small si-borderless si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-gplus">
                            <i class="icon-gplus"></i>
                            <i class="icon-gplus"></i>
                        </a>



                        <a href="#" class="social-icon si-small si-borderless si-linkedin">
                            <i class="icon-linkedin"></i>
                            <i class="icon-linkedin"></i>
                        </a>
                    </div>
                    <div class="dividersmall"></div>
                    <ul>
                        <li><a href="{{URL::to('/')}}/terms" target="_blank">Terms of Use</a></li>
                        <li><a href="{{URL::to('/')}}/privacypolicy" target="_blank">Privacy Policy</a></li>
                        <li><a href="{{URL::to('/')}}/disclaimer" target="_blank">Disclaimer</a></li>
                    </ul>

                    <div class="dividersmall"></div>
                    <div>Copyrights &copy; 2016 <br/>All Rights Reserved by HealthVistaz</div>
                    <div class="dividersmall"></div>

                </div>
            </div>



        </div><!-- .footer-widgets-wrap end -->

    </div>



</footer><!-- #footer end -->