@extends('master')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/css/bootstrap.min.css') }}" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/css/slick.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/css/slick-theme.css') }}"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/css/nouislider.min.css') }}"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/css/style.css') }}"/>
</head>

<body>
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- Product main img -->
                <div class="col-md-5 col-md-push-2">
                    <div id="product-main-img" class="slick-initialized slick-slider"><button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="display: block;">Previous</button>
                        <div class="slick-list draggable">
                            <div class="slick-track" style="opacity: 1; width: 1832px;">
                                <div class="product-preview slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 458px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1; overflow: hidden;">
                                    <img src="./images/burger1.jpg" alt="">
                                    <img role="presentation" src="http://localhost/Nhom03_CT4_BE1_NH21-master/images/burger1.jpg" class="zoomImg" style="position: absolute; top: 44.4375px; left: 29.3068px; opacity: 0; width: 393px; height: 275px; border: none; max-width: none; max-height: none;">
                                </div>
                                <div class="product-preview slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" style="width: 458px; position: relative; left: -458px; top: 0px; z-index: 998; opacity: 0; overflow: hidden;">
                                    <img src="./images/burger11.jpg" alt="">
                                    <img role="presentation" src="http://localhost/Nhom03_CT4_BE1_NH21-master/images/burger11.jpg" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 275px; height: 183px; border: none; max-width: none; max-height: none;">
                                </div>
                                <div class="product-preview slick-slide" data-slick-index="2" aria-hidden="true" tabindex="-1" style="width: 458px; position: relative; left: -916px; top: 0px; z-index: 998; opacity: 0; overflow: hidden;">
                                    <img src="./images/burger111.jpg" alt="">
                                    <img role="presentation" src="http://localhost/Nhom03_CT4_BE1_NH21-master/images/burger111.jpg" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 276px; height: 183px; border: none; max-width: none; max-height: none;">
                                </div>
                                <div class="product-preview slick-slide" data-slick-index="3" aria-hidden="true" tabindex="-1" style="width: 458px; position: relative; left: -1374px; top: 0px; z-index: 998; opacity: 0; overflow: hidden;">
                                    <img src="./images/burger1.jpg" alt="">
                                    <img role="presentation" src="http://localhost/Nhom03_CT4_BE1_NH21-master/images/burger1.jpg" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 393px; height: 275px; border: none; max-width: none; max-height: none;">
                                </div>
                            </div>
                        </div>






                        <button class="slick-next slick-arrow" aria-label="Next" type="button" style="display: block;">Next</button>
                    </div>
                </div>
                <!-- /Product main img -->

                <!-- Product thumb imgs -->
                <div class="col-md-2  col-md-pull-5">
                    <div id="product-imgs" class="slick-initialized slick-slider slick-vertical"><button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="display: block;">Previous</button>
                        <div class="slick-list draggable" style="height: 327px; padding: 0px;">
                            <div class="slick-track" style="opacity: 1; height: 1308px; transform: translate3d(0px, -327px, 0px);">
                                <div class="product-preview slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true" tabindex="-1" style="width: 155px;">
                                    <img src="./images/burger1.jpg" alt="">
                                </div>
                                <div class="product-preview slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true" tabindex="-1" style="width: 155px;">
                                    <img src="./images/burger11.jpg" alt="">
                                </div>
                                <div class="product-preview slick-slide slick-cloned" data-slick-index="-2" aria-hidden="true" tabindex="-1" style="width: 155px;">
                                    <img src="./images/burger111.jpg" alt="">
                                </div>
                                <div class="product-preview slick-slide slick-cloned slick-active" data-slick-index="-1" aria-hidden="false" tabindex="-1" style="width: 155px;">
                                    <img src="./images/burger1.jpg" alt="">
                                </div>
                                <div class="product-preview slick-slide slick-current slick-active slick-center" data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 155px;">
                                    <img src="./images/burger1.jpg" alt="">
                                </div>
                                <div class="product-preview slick-slide slick-active" data-slick-index="1" aria-hidden="false" tabindex="0" style="width: 155px;">
                                    <img src="./images/burger11.jpg" alt="">
                                </div>
                                <div class="product-preview slick-slide" data-slick-index="2" aria-hidden="true" tabindex="0" style="width: 155px;">
                                    <img src="./images/burger111.jpg" alt="">
                                </div>
                                <div class="product-preview slick-slide" data-slick-index="3" aria-hidden="true" tabindex="-1" style="width: 155px;">
                                    <img src="./images/burger1.jpg" alt="">
                                </div>
                                <div class="product-preview slick-slide slick-cloned slick-center" data-slick-index="4" aria-hidden="true" tabindex="-1" style="width: 155px;">
                                    <img src="./images/burger1.jpg" alt="">
                                </div>
                                <div class="product-preview slick-slide slick-cloned" data-slick-index="5" aria-hidden="true" tabindex="-1" style="width: 155px;">
                                    <img src="./images/burger11.jpg" alt="">
                                </div>
                                <div class="product-preview slick-slide slick-cloned" data-slick-index="6" aria-hidden="true" tabindex="-1" style="width: 155px;">
                                    <img src="./images/burger111.jpg" alt="">
                                </div>
                                <div class="product-preview slick-slide slick-cloned" data-slick-index="7" aria-hidden="true" tabindex="-1" style="width: 155px;">
                                    <img src="./images/burger1.jpg" alt="">
                                </div>
                            </div>
                        </div>






                        <button class="slick-next slick-arrow" aria-label="Next" type="button" style="display: block;">Next</button>
                    </div>
                </div>
                <!-- /Product thumb imgs -->
                <!-- Product details -->
                <div class="col-md-5">
                    <div class="product-details">
                        <h2 class="product-name">Burger Double Double</h2>
                        <div>
                            <!-- <div class="product-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o"></i>
									</div> -->
                            <div class="product-rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <a class="review-link" data-toggle="tab" href="#tab3">0 Review(s) | Add your review</a>
                        </div>
                        <div>
                            <h3 class="product-price">
                                41,300 đ
                                <del class="product-old-price" style="margin-left: 8px;">59,000 đ</del>
                                <span style="color: #D10024; font-size: 80%; font-weight: 400;">-30%</span>
                            </h3>
                        </div>
                        <p>The burger with beef is a combination of panade, bread and meatballs soaked in milk to soften and moisten. Sometimes there are aromas commonly found in Mexican chorizo emotions, such as coriander, paprika and cumin.</p>
                        <div class="product-options">

                        </div>
                        <form method="post" action="add_cart.php?id_product=1&amp;key=2">
                            <div class="add-to-cart">
                                <div class="qty-label">
                                    Qty
                                    <div class="input-number">
                                        <input type="number" name="quantity" value="1">
                                        <span class="qty-up">+</span>
                                        <span class="qty-down">-</span>
                                    </div>
                                </div>
                                <button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                            </div>
                        </form>
                        <ul class="product-btns">
                            <li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
                            <li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
                        </ul>

                        <ul class="product-links">
                            <li>Category:</li>
                            <li><a href="#">Headphones</a></li>
                            <li><a href="#">Accessories</a></li>
                        </ul>

                        <ul class="product-links">
                            <li>Share:</li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                        </ul>

                    </div>
                </div>
                <!-- /Product details -->

                <!-- Product tab -->
                <div class="col-md-12">
                    <div id="product-tab">
                        <!-- product tab nav -->
                        <ul class="tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                            <li><a data-toggle="tab" href="#tab2">Details</a></li>
                            <li><a data-toggle="tab" href="#tab3">Reviews (0)</a></li>
                        </ul>
                        <!-- /product tab nav -->

                        <!-- product tab content -->
                        <div class="tab-content">
                            <!-- tab1  -->
                            <div id="tab1" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p> - The burger with beef is a combination of panade, bread and meatballs soaked in milk to soften and moisten.</p>
                                        <p> - Sometimes there are aromas commonly found in Mexican chorizo emotions, such as coriander, paprika and cumin.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- /tab1  -->

                            <!-- tab2  -->
                            <div id="tab2" class="tab-pane fade in">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- /tab2  -->

                            <!-- tab3  -->
                            <div id="tab3" class="tab-pane fade in">
                                <div class="row">
                                    <!-- Rating -->
                                    <div class="col-md-3">
                                        <div id="rating">
                                            <div class="rating-avg">
                                                <span>
                                                    0 </span>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            </div>
                                            <ul class="rating">
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div style="width: 0%;"></div>
                                                    </div>
                                                    <span class="sum">
                                                        0
                                                    </span>
                                                </li>
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div style="width: 0%;"></div>
                                                    </div>
                                                    <span class="sum">0</span>
                                                </li>
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div style="width: 0%;"></div>
                                                    </div>
                                                    <span class="sum">0</span>
                                                </li>
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div style="width: 0%;"></div>
                                                    </div>
                                                    <span class="sum">0</span>
                                                </li>
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div style="width: 0%;"></div>
                                                    </div>
                                                    <span class="sum">0</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /Rating -->

                                    <!-- Reviews -->
                                    <div class="col-md-6">
                                        <div id="reviews">
                                            <p>There are no comments yet!</p>
                                        </div>
                                    </div>
                                    <!-- /Reviews -->

                                    <!-- Review Form -->
                                    <div class="col-md-3">
                                        <div id="review-form">
                                            <form id="add-review" class="review-form" method="post" action="add_review.php?id_product=1">
                                                <textarea class="input" name="comment" placeholder="Your Review"></textarea>
                                                <div class="input-rating">
                                                    <span>Your Rating: </span>
                                                    <div class="stars">
                                                        <input id="star5" name="rating" value="5" type="radio"><label for="star5"></label><input id="star4" name="rating" value="4" type="radio"><label for="star4"></label><input id="star3" name="rating" value="3" type="radio"><label for="star3"></label><input id="star2" name="rating" value="2" type="radio"><label for="star2"></label><input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                                                        <!-- <input id="star5" name="rating" value="5" type="radio" checked><label for="star5"></label>
																<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
																<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
																<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
																<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label> -->
                                                    </div>
                                                </div>
                                                <button type="submit" class="primary-btn">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /Review Form -->
                                </div>
                            </div>
                            <!-- /tab3  -->
                        </div>
                        <!-- /product tab content  -->
                    </div>
                </div>
                <!-- /product tab -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<div class="col-md-12">
					<div class="section-title text-center">
						<h3 class="title">Related Products</h3>
					</div>
				</div>
									<!-- product -->
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="./images/burger1.jpg" alt="">
																<div class="product-label">
									<span class="sale">-30%</span>
								</div>
															</div>
							<div class="product-body">
								<p class="product-category">Burger</p>
								<h3 class="product-name"><a href="detail.php?id=1">Burger Double Double</a></h3>
								<h4 class="product-price">
																		41,300 đ
									<del class="product-old-price">59,000 đ</del>
																	</h4>
								<div class="product-rating">
								</div>
								<div class="product-btns">
									<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
									<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
									<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
								</div>
							</div>
							<div class="add-to-cart">
							<a href="add_cart.php?id_product=1&amp;key=2"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
							</div>
						</div>
					</div>
					<!-- /product -->
									<!-- product -->
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="./images/burger2.jpg" alt="">
															</div>
							<div class="product-body">
								<p class="product-category">Burger</p>
								<h3 class="product-name"><a href="detail.php?id=2">Shrimp Burger</a></h3>
								<h4 class="product-price">
									47,000										đ
																	</h4>
								<div class="product-rating">
								</div>
								<div class="product-btns">
									<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
									<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
									<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
								</div>
							</div>
							<div class="add-to-cart">
							<a href="add_cart.php?id_product=2&amp;key=2"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
							</div>
						</div>
					</div>
					<!-- /product -->
									<!-- product -->
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="./images/burger3.jpg" alt="">
																<div class="product-label">
									<span class="sale">-10%</span>
								</div>
															</div>
							<div class="product-body">
								<p class="product-category">Burger</p>
								<h3 class="product-name"><a href="detail.php?id=3">Burger Bulgogi</a></h3>
								<h4 class="product-price">
																		39,600 đ
									<del class="product-old-price">44,000 đ</del>
																	</h4>
								<div class="product-rating">
								</div>
								<div class="product-btns">
									<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
									<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
									<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
								</div>
							</div>
							<div class="add-to-cart">
							<a href="add_cart.php?id_product=3&amp;key=2"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
							</div>
						</div>
					</div>
					<!-- /product -->
									<!-- product -->
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="./images/burger4.jpg" alt="">
															</div>
							<div class="product-body">
								<p class="product-category">Burger</p>
								<h3 class="product-name"><a href="detail.php?id=4">Premium Chicken Burger</a></h3>
								<h4 class="product-price">
									45,000										đ
																	</h4>
								<div class="product-rating">
								</div>
								<div class="product-btns">
									<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
									<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
									<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
								</div>
							</div>
							<div class="add-to-cart">
							<a href="add_cart.php?id_product=4&amp;key=2"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
							</div>
						</div>
					</div>
					<!-- /product -->
								<!-- store bottom filter -->
				<div class="col-md-12">
					<div class="store-filter clearfix">
					<ul class="store-pagination">
						<li class="active"><a href="/Nhom03_CT4_BE1_NH21-master/detail.php?id=1&amp;pager=1"> 1 </a></li><li><a href="/Nhom03_CT4_BE1_NH21-master/detail.php?id=1&amp;pager=2"> 2 </a></li>					</ul>
					</div>
				</div>
				<!-- <div class="store-filter clearfix">
					<ul class="store-pagination text-center">
											</ul>
				</div> -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
    <script src="{{ asset('js/js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/js/slick.min.js') }}"></script>
	<script src="{{ asset('js/js/nouislider.min.js') }}"></script>
	<script src="{{ asset('js/js/jquery.zoom.min.js') }}"></script>
	<script src="{{ asset('js/js/main.js') }}"></script>
</body>

</html>
@endsection