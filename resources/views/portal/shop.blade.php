@extends('layout.master-inner')

@section('title', 'Customer Register')

@section('styles')

@stop

@section('content')


    <div id="heading-breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1>Medicines for you</h1>
                </div>
                <div class="col-md-5">
                    <ul class="breadcrumb">
                        <li><a href="{{ URL::to('/') }}/">Home</a>
                        </li>
                        <li>Medicines for you</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <div id="content">
        <div class="container">

            <div class="row">


                <!-- *** LEFT COLUMN ***
        _________________________________________________________ -->

                <div class="col-sm-3">

                    <!-- *** MENUS AND FILTERS ***
_________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Categories</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                                <li class="active">
                                    <a href="shop.html">Medicine &amp; related <span class="badge pull-right">42</span></a>
                                    <ul>
                                        <li><a href="shop.html">Medicines</a>
                                        </li>
                                        <li><a href="shop.html">Personal Care</a>
                                        </li>
                                        <li><a href="shop.html">Heath monitoring tools</a>
                                        </li>
                                        <li><a href="shop.html">First Aid</a>
                                        </li>
                                        <li><a href="shop.html">Food &amp; nutrition</a>
                                        </li>
                                        <li><a href="shop.html">Braces &amp; supports</a>
                                        </li>
                                        <li><a href="shop.html">Herbal and Ayurvedic</a>
                                        </li>
                                    </ul>
                                </li>


                            </ul>

                        </div>
                    </div>

                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Brands</h3>
                            <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> <span class="hidden-sm">Clear</span></a>
                        </div>

                        <div class="panel-body">

                            <form>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox">ABCD (10)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox">EFGH (12)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox">HIJKL (15)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox">MNOOPQ (14)
                                        </label>
                                    </div>
                                </div>

                                <button class="btn btn-default btn-sm btn-template-main"><i class="fa fa-pencil"></i> Apply</button>

                            </form>

                        </div>
                    </div>

                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title clearfix">Medicine Type</h3>
                            <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> <span class="hidden-sm">Clear</span></a>
                        </div>

                        <div class="panel-body">

                            <form>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Syrup (14)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Pills (10)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Medical Kits (20)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Eye/ Nose Drops (13)
                                        </label>
                                    </div>

                                </div>

                                <button class="btn btn-default btn-sm btn-template-main"><i class="fa fa-pencil"></i> Apply</button>

                            </form>

                        </div>
                    </div>

                    <!-- *** MENUS AND FILTERS END *** -->


                    <!-- /.banner -->

                </div>
                <!-- /.col-md-3 -->

                <!-- *** LEFT COLUMN END *** -->

                <!-- *** RIGHT COLUMN ***
        _________________________________________________________ -->

                <div class="col-sm-9">

                    <p class="text-muted lead product_head">SHOP BY MEDICINES</p>

                    <div class="row products">

                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <div class="image">
                                    <a href="shop-detail.html">
                                        <img src="img/product1.jpg" alt="" class="img-responsive image1">
                                    </a>
                                </div>
                                <!-- /.image -->
                                <div class="text">
                                    <h3><a href="shop-detail.html">Cough Syrup Benadryl</a></h3>
                                    <p class="price">&#8377; 143.00</p>
                                    <p class="buttons">
                                        <a href="shop-detail.html" class="btn btn-default">View detail</a>
                                        <a href="shop.html" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <div class="image">
                                    <a href="shop-detail.html">
                                        <img src="img/product2.jpg" alt="" class="img-responsive image1">
                                    </a>
                                </div>
                                <!-- /.image -->
                                <div class="text">
                                    <h3><a href="shop-detail.html">Cough Syrup Benadryl</a></h3>
                                    <p class="price">&#8377; 43.00 <del>&#8377; 80</del> </p>
                                    <p class="buttons">
                                        <a href="shop-detail.html" class="btn btn-default">View detail</a>
                                        <a href="shop.html" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>
                                </div>
                                <!-- /.text -->

                                <div class="ribbon sale">
                                    <div class="theribbon">SALE</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->

                                <!--  <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>-->
                                <!-- /.ribbon -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <div class="image">
                                    <a href="shop-detail.html">
                                        <img src="img/product3.jpg" alt="" class="img-responsive image1">
                                    </a>
                                </div>
                                <!-- /.image -->
                                <div class="text">
                                    <h3><a href="shop-detail.html">Cough Syrup Benadryl</a></h3>
                                    <p class="price">&#8377; 143.00</p>
                                    <p class="buttons">
                                        <a href="shop-detail.html" class="btn btn-default">View detail</a>
                                        <a href="shop.html" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>

                                </div>
                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                        <p class="text-muted lead product_head">SHOP BY Personal Care</p>
                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <div class="image">
                                    <a href="shop-detail.html">
                                        <img src="img/product3.jpg" alt="" class="img-responsive image1">
                                    </a>
                                </div>
                                <!-- /.image -->
                                <div class="text">
                                    <h3><a href="shop-detail.html">Cough Syrup Benadryl</a></h3>
                                    <p class="price">&#8377; 143.00</p>
                                    <p class="buttons">
                                        <a href="shop-detail.html" class="btn btn-default">View detail</a>
                                        <a href="shop.html" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>

                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <div class="image">
                                    <a href="shop-detail.html">
                                        <img src="img/product2.jpg" alt="" class="img-responsive image1">
                                    </a>
                                </div>
                                <!-- /.image -->
                                <div class="text">
                                    <h3><a href="shop-detail.html">White Blouse Versace</a></h3>
                                    <p class="price">&#8377; 143.00</p>
                                    <p class="buttons">
                                        <a href="shop-detail.html" class="btn btn-default">View detail</a>
                                        <a href="shop.html" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>

                                </div>
                                <!-- /.text -->

                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <div class="image">
                                    <a href="shop-detail.html">
                                        <img src="img/product1.jpg" alt="" class="img-responsive image1">
                                    </a>
                                </div>
                                <!-- /.image -->
                                <div class="text">
                                    <h3><a href="shop-detail.html">Fur coat</a></h3>
                                    <p class="price">&#8377; 143.00</p>
                                    <p class="buttons">
                                        <a href="shop-detail.html" class="btn btn-default">View detail</a>
                                        <a href="shop.html" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>

                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                        <p class="text-muted lead product_head">SHOP BY Heath monitoring tools</p>
                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <div class="image">
                                    <a href="shop-detail.html">
                                        <img src="img/product3.jpg" alt="" class="img-responsive image1">
                                    </a>
                                </div>
                                <!-- /.image -->
                                <div class="text">
                                    <h3><a href="shop-detail.html">Cough Syrup Benadryl</a></h3>
                                    <p class="price">&#8377; 143.00</p>
                                    <p class="buttons">
                                        <a href="shop-detail.html" class="btn btn-default">View detail</a>
                                        <a href="shop.html" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>

                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <div class="image">
                                    <a href="shop-detail.html">
                                        <img src="img/product2.jpg" alt="" class="img-responsive image1">
                                    </a>
                                </div>
                                <!-- /.image -->
                                <div class="text">
                                    <h3><a href="shop-detail.html">White Blouse Versace</a></h3>
                                    <p class="price">&#8377; 143.00</p>
                                    <p class="buttons">
                                        <a href="shop-detail.html" class="btn btn-default">View detail</a>
                                        <a href="shop.html" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>

                                </div>
                                <!-- /.text -->

                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <div class="image">
                                    <a href="shop-detail.html">
                                        <img src="img/product1.jpg" alt="" class="img-responsive image1">
                                    </a>
                                </div>
                                <!-- /.image -->
                                <div class="text">
                                    <h3><a href="shop-detail.html">Fur coat</a></h3>
                                    <p class="price">&#8377; 143.00</p>
                                    <p class="buttons">
                                        <a href="shop-detail.html" class="btn btn-default">View detail</a>
                                        <a href="shop.html" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>

                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                        <p class="text-muted lead product_head">SHOP BY First Aid</p>
                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <div class="image">
                                    <a href="shop-detail.html">
                                        <img src="img/product3.jpg" alt="" class="img-responsive image1">
                                    </a>
                                </div>
                                <!-- /.image -->
                                <div class="text">
                                    <h3><a href="shop-detail.html">Cough Syrup Benadryl</a></h3>
                                    <p class="price">&#8377; 143.00</p>
                                    <p class="buttons">
                                        <a href="shop-detail.html" class="btn btn-default">View detail</a>
                                        <a href="shop.html" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>

                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <div class="image">
                                    <a href="shop-detail.html">
                                        <img src="img/product2.jpg" alt="" class="img-responsive image1">
                                    </a>
                                </div>
                                <!-- /.image -->
                                <div class="text">
                                    <h3><a href="shop-detail.html">White Blouse Versace</a></h3>
                                    <p class="price">&#8377; 143.00</p>
                                    <p class="buttons">
                                        <a href="shop-detail.html" class="btn btn-default">View detail</a>
                                        <a href="shop.html" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>

                                </div>
                                <!-- /.text -->

                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <div class="image">
                                    <a href="shop-detail.html">
                                        <img src="img/product1.jpg" alt="" class="img-responsive image1">
                                    </a>
                                </div>
                                <!-- /.image -->
                                <div class="text">
                                    <h3><a href="shop-detail.html">Fur coat</a></h3>
                                    <p class="price">&#8377; 143.00</p>
                                    <p class="buttons">
                                        <a href="shop-detail.html" class="btn btn-default">View detail</a>
                                        <a href="shop.html" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>

                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                        <p class="text-muted lead product_head">SHOP BY Food & nutrition</p>
                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <div class="image">
                                    <a href="shop-detail.html">
                                        <img src="img/product3.jpg" alt="" class="img-responsive image1">
                                    </a>
                                </div>
                                <!-- /.image -->
                                <div class="text">
                                    <h3><a href="shop-detail.html">Cough Syrup Benadryl</a></h3>
                                    <p class="price">&#8377; 143.00</p>
                                    <p class="buttons">
                                        <a href="shop-detail.html" class="btn btn-default">View detail</a>
                                        <a href="shop.html" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>

                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <div class="image">
                                    <a href="shop-detail.html">
                                        <img src="img/product2.jpg" alt="" class="img-responsive image1">
                                    </a>
                                </div>
                                <!-- /.image -->
                                <div class="text">
                                    <h3><a href="shop-detail.html">White Blouse Versace</a></h3>
                                    <p class="price">&#8377; 143.00</p>
                                    <p class="buttons">
                                        <a href="shop-detail.html" class="btn btn-default">View detail</a>
                                        <a href="shop.html" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>

                                </div>
                                <!-- /.text -->

                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <div class="image">
                                    <a href="shop-detail.html">
                                        <img src="img/product1.jpg" alt="" class="img-responsive image1">
                                    </a>
                                </div>
                                <!-- /.image -->
                                <div class="text">
                                    <h3><a href="shop-detail.html">Fur coat</a></h3>
                                    <p class="price">&#8377; 143.00</p>
                                    <p class="buttons">
                                        <a href="shop-detail.html" class="btn btn-default">View detail</a>
                                        <a href="shop.html" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>

                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                        <p class="text-muted lead product_head">SHOP BY Braces & supports</p>
                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <div class="image">
                                    <a href="shop-detail.html">
                                        <img src="img/product3.jpg" alt="" class="img-responsive image1">
                                    </a>
                                </div>
                                <!-- /.image -->
                                <div class="text">
                                    <h3><a href="shop-detail.html">Cough Syrup Benadryl</a></h3>
                                    <p class="price">&#8377; 143.00</p>
                                    <p class="buttons">
                                        <a href="shop-detail.html" class="btn btn-default">View detail</a>
                                        <a href="shop.html" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>

                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <div class="image">
                                    <a href="shop-detail.html">
                                        <img src="img/product2.jpg" alt="" class="img-responsive image1">
                                    </a>
                                </div>
                                <!-- /.image -->
                                <div class="text">
                                    <h3><a href="shop-detail.html">White Blouse Versace</a></h3>
                                    <p class="price">&#8377; 143.00</p>
                                    <p class="buttons">
                                        <a href="shop-detail.html" class="btn btn-default">View detail</a>
                                        <a href="shop.html" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>

                                </div>
                                <!-- /.text -->

                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <div class="image">
                                    <a href="shop-detail.html">
                                        <img src="img/product1.jpg" alt="" class="img-responsive image1">
                                    </a>
                                </div>
                                <!-- /.image -->
                                <div class="text">
                                    <h3><a href="shop-detail.html">Fur coat</a></h3>
                                    <p class="price">&#8377; 143.00</p>
                                    <p class="buttons">
                                        <a href="shop-detail.html" class="btn btn-default">View detail</a>
                                        <a href="shop.html" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>

                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <p class="text-muted lead product_head">SHOP BY Herbal and Ayurvedic</p>
                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <div class="image">
                                    <a href="shop-detail.html">
                                        <img src="img/product3.jpg" alt="" class="img-responsive image1">
                                    </a>
                                </div>
                                <!-- /.image -->
                                <div class="text">
                                    <h3><a href="shop-detail.html">Cough Syrup Benadryl</a></h3>
                                    <p class="price">&#8377; 143.00</p>
                                    <p class="buttons">
                                        <a href="shop-detail.html" class="btn btn-default">View detail</a>
                                        <a href="shop.html" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>

                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <div class="image">
                                    <a href="shop-detail.html">
                                        <img src="img/product2.jpg" alt="" class="img-responsive image1">
                                    </a>
                                </div>
                                <!-- /.image -->
                                <div class="text">
                                    <h3><a href="shop-detail.html">White Blouse Versace</a></h3>
                                    <p class="price">&#8377; 143.00</p>
                                    <p class="buttons">
                                        <a href="shop-detail.html" class="btn btn-default">View detail</a>
                                        <a href="shop.html" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>

                                </div>
                                <!-- /.text -->

                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->
                            </div>
                            <!-- /.product -->
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <div class="image">
                                    <a href="shop-detail.html">
                                        <img src="img/product1.jpg" alt="" class="img-responsive image1">
                                    </a>
                                </div>
                                <!-- /.image -->
                                <div class="text">
                                    <h3><a href="shop-detail.html">Fur coat</a></h3>
                                    <p class="price">&#8377; 143.00</p>
                                    <p class="buttons">
                                        <a href="shop-detail.html" class="btn btn-default">View detail</a>
                                        <a href="shop.html" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </p>

                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                        <!-- /.col-md-4 -->
                    </div>
                    <!-- /.products -->

                    <div class="row">

                        <div class="col-md-12 banner">
                            <a href="#">
                                <img src="img/banner2.jpg" alt="" class="img-responsive">
                            </a>
                        </div>

                    </div>


                    <div class="pages">

                        <p class="loadMore">
                            <a href="#" class="btn btn-template-main"><i class="fa fa-chevron-down"></i> Load more</a>
                        </p>

                        <ul class="pagination">
                            <li><a href="#">&laquo;</a>
                            </li>
                            <li class="active"><a href="#">1</a>
                            </li>
                            <li><a href="#">2</a>
                            </li>
                            <li><a href="#">3</a>
                            </li>
                            <li><a href="#">4</a>
                            </li>
                            <li><a href="#">5</a>
                            </li>
                            <li><a href="#">&raquo;</a>
                            </li>
                        </ul>
                    </div>


                </div>
                <!-- /.col-md-9 -->

                <!-- *** RIGHT COLUMN END *** -->

            </div>

        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->




@endsection

@section('scripts')

@stop
