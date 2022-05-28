@extends('master')
@section('content')
<?php

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

function getRatingByProductId($array, $productid)
{
    $result = array();
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i]['product_id'] == $productid) {
            array_push($result, $array[$i]);
        }
    }
    return $result;
}

function getRatingValue($array)
{
    $result = 0;
    for ($i = 0; $i < count($array); $i++) {
        $result += $array[$i]['rating_value'];
    }
    return ceil($result / count($array));
}

function getArrayRatingValue($array)
{
    $result = array(0, 0, 0, 0, 0);
    for ($i = 0; $i < count($array); $i++) {
        switch ($array[$i]['rating_value']) {
            case 1:
                $result[0]++;
                break;
            case 2:
                $result[1]++;
                break;
            case 3:
                $result[2]++;
                break;
            case 4:
                $result[3]++;
                break;
            case 5:
                $result[4]++;
                break;
            default:
                # code...
                break;
        }
    }
    return $result;
}
?>
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
                                <img src="{{ asset('images/'.$product['image']) }}" alt="">
                                <img role="presentation" src="{{ asset('images/'.$product['image']) }}" class="zoomImg" style="position: absolute; top: 44.4375px; left: 29.3068px; opacity: 0; width: 393px; height: 275px; border: none; max-width: none; max-height: none;">
                            </div>
                        </div>
                    </div>
                    <button class="slick-next slick-arrow" aria-label="Next" type="button" style="display: block;">Next</button>
                </div>
            </div>
            <!-- /Product main img -->
            <!-- Product details -->
            <div class="col-md-5">
                <div class="product-details">
                    <h2 class="product-name">{{ $product['name'] }}</h2>
                    <div>
                        <?php
                        $ratingProduct = getRatingByProductId($rating, $product['id']);
                        if (count($ratingProduct) > 0) {
                        ?>
                            <div class="star_container">
                                <?php
                                $rating_value = getRatingValue($ratingProduct);
                                if ($rating_value == 1) {
                                ?>
                                    <i class="fa fa-star" aria-hidden="true" style="color: yellow;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color: gray;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color: gray;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color: gray;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color: gray;"></i>
                                    <span>(<?php echo count($ratingProduct) ?>)</span>
                                <?php
                                } else if ($rating_value == 2) {
                                ?>
                                    <i class="fa fa-star" aria-hidden="true" style="color: yellow;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color: yellow;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color: gray;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color: gray;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color: gray;"></i>
                                    <span style="color: black;">(<?php echo count($ratingProduct) ?>)</span>
                                <?php
                                } else if ($rating_value == 3) {
                                ?>
                                    <i class="fa fa-star" aria-hidden="true" style="color: yellow;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color: yellow;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color: yellow;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color: gray;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color: gray;"></i>
                                    <span style="color: black;">(<?php echo count($ratingProduct) ?>)</span>
                                <?php
                                } else if ($rating_value == 4) {
                                ?>
                                    <i class="fa fa-star" aria-hidden="true" style="color: yellow;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color: yellow;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color: yellow;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color: yellow;" style="color: yellow;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color: gray;"></i>
                                    <span style="color: black;">(<?php echo count($ratingProduct) ?>)</span>
                                <?php
                                } else if ($rating_value == 5) {
                                ?>
                                    <i class="fa fa-star" aria-hidden="true" style="color: yellow;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color: yellow;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color: yellow;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color: yellow;"></i>
                                    <i class="fa fa-star" aria-hidden="true" style="color: yellow;"></i>
                                    <span style="color: black;">(<?php echo count($ratingProduct) ?>)</span>
                                <?php
                                }
                                ?>

                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div>
                        <h3 class="product-price">
                            $<?php echo (number_format($product['price'] * (1 - $product->discount->values))) ?>
                            <?php
                            if ($product->discount->active != 0) {
                            ?>
                                <del class="product-old-price" style="margin-left: 8px;">${{ number_format($product['price']) }}</del>
                                <span style="color: #D10024; font-size: 80%; font-weight: 400;">{{$product->discount->values * 100}}%</span>
                            <?php
                            }
                            ?>
                        </h3>
                    </div>
                    <p>{{ $product['description'] }}</p>
                    <div class="product-options">

                    </div>
                    <form method="post" action="{{ url('/addcart') }}">
                        @csrf
                        <!-- {{ csrf_field() }} -->
                        <div class="add-to-cart">
                            <div class="qty-label">
                                Qty
                                <div class="input-number">
                                    <input type="number" name="num_product" value="1" id="qty_value">
                                    <span id="qty-up" class="qty-up">+</span>
                                    <span id="qty-down" class="qty-down">-</span>
                                </div>
                            </div>
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" id="addtocart" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
                                cart</button>
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
                        <li><a data-toggle="tab" href="#tab3">Reviews (<?php echo count($ratingProduct) ?>)</a></li>
                    </ul>
                    <!-- /product tab nav -->

                    <!-- product tab content -->
                    <div class="tab-content">
                        <!-- tab1  -->
                        <div id="tab1" class="tab-pane fade in">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>
                                        {{ $product['description']  }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab1  -->

                        <!-- tab2  -->
                        <div id="tab2" class="tab-pane fade in">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                        fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                        culpa qui officia deserunt mollit anim id est laborum.</p>
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
                                        <!-- Avg rating -->
                                        <?php if (isset($rating_value)) {
                                        ?>
                                            <div class="rating-avg">
                                                <span>
                                                    {{ $rating_value }} </span>
                                                <?php
                                                switch ($rating_value) {
                                                    case 1:
                                                ?>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                    <?php
                                                        break;
                                                    case 2:
                                                    ?>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                    <?php
                                                        break;
                                                    case 3:
                                                    ?>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                    <?php
                                                        break;
                                                    case 4:
                                                    ?>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                    <?php
                                                        break;
                                                    case 5:
                                                    ?>
                                                        <div class="rating-stars">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                <?php
                                                        break;
                                                    default:
                                                        # code...
                                                        break;
                                                }
                                                ?>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        $arraySumRatingValue = getArrayRatingValue($ratingProduct);
                                        ?>
                                        <ul class="rating">
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <span class="sum">
                                                    {{ $arraySumRatingValue[4] }}
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
                                                <span class="sum">{{ $arraySumRatingValue[3] }}</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <span class="sum">{{ $arraySumRatingValue[2] }}</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <span class="sum">{{ $arraySumRatingValue[1] }}</span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <span class="sum">{{ $arraySumRatingValue[0] }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Rating -->

                                <!-- Reviews -->
                                <div class="col-md-6">
                                    <div id="reviews">
                                        <?php
                                        if (count($ratingProduct) == 0) {
                                        ?>
                                            There are no comments yet!
                                        <?php
                                        } else {
                                        ?>
                                            <ul class="reviews">
                                                <?php
                                                for ($i = 0; $i < count($ratingProduct); $i++) {
                                                ?>
                                                    <li>
                                                        <div class="review-heading">
                                                            <h5 class="name">{{ $ratingProduct[$i]->user->name }}</h5>
                                                            <p class="date">{{ $ratingProduct[$i]['created_at'] }}</p>
                                                            <div class="review-rating">
                                                                <?php
                                                                switch ($ratingProduct[$i]['rating_value']) {
                                                                    case 1:
                                                                ?>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                    <?php
                                                                        break;
                                                                    case 2:
                                                                    ?>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                    <?php
                                                                        break;
                                                                    case 3:
                                                                    ?>

                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                        <i class="fa fa-star-o"></i>

                                                                    <?php
                                                                        break;
                                                                    case 4:
                                                                    ?>

                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star-o"></i>

                                                                    <?php
                                                                        break;
                                                                    case 5:
                                                                    ?>

                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star-o"></i>

                                                                <?php
                                                                        break;
                                                                    default:
                                                                        # code...
                                                                        break;
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="review-body">
                                                            <p>{{ $ratingProduct[$i]['comment'] }}</p>
                                                        </div>
                                                    </li>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!-- /Reviews -->

                                <!-- Review Form -->
                                <div class="col-md-3">
                                    <div id="review-form">
                                        <form id="add-review" class="review-form" method="post" action="{{ url('/addreview')}}">
                                            @csrf
                                            <textarea class="input" name="comment" placeholder="Your Review" required></textarea>
                                            <div class="input-rating">
                                                <span>Your Rating: </span>
                                                <div class="stars">
                                                    <input id="star5" name="rating" value="5" type="radio" checked><label for="star5"></label><input id="star4" name="rating" value="4" type="radio"><label for="star4"></label><input id="star3" name="rating" value="3" type="radio"><label for="star3"></label><input id="star2" name="rating" value="2" type="radio"><label for="star2"></label><input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                                                    <!-- <input id="star5" name="rating" value="5" type="radio" checked><label for="star5"></label>
																<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
																<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
																<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
																<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label> -->
                                                </div>
                                            </div>
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="submit" class="primary-btn" id="submitreview">Submit</button>
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
            <?php
            for ($i = 0; $i < count($productRelated); $i++) {
                $value = $productRelated[$i];
            ?>
                <!-- product -->
                <div class="col-md-3 col-xs-6">
                    <div class="product">
                        <div class="product-img">
                            <img src="{{ asset('images/'.$value['image']) }}" alt="" height="170">
                        </div>
                        <div class="product-body">
                            <h3 class="product-name"><a href="{{ url('/detail/'.$value['id'])}}">{{ $value['name'] }}</a></h3>
                            <h4 class="product-price">
                                $<?php echo (number_format($value['price'] * (1 - $value->discount->values))) ?>
                                <?php
                                if ($value->discount->values != 0) {
                                ?>
                                    <del class="product-old-price">$<?php echo (number_format($value['price'])) ?></del>
                                <?php
                                }
                                ?>
                            </h4>
                            <div class="product-rating">
                            </div>
                            <div class="product-btns">
                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to
                                        wishlist</span></button>
                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to
                                        compare</span></button>
                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                        view</span></button>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <a href="add_cart.php?id_product=1&amp;key=2"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
                        </div>
                    </div>
                    <?php
                    if ($value->discount->values != 0) {
                    ?>
                        <div class="product-label">
                            <span class="sale">-<?php echo ($value->discount->values * 100) ?>%</span>
                        </div>
                    <?php
                    }
                    ?>

                </div>
                <!-- /product -->
            <?php
            }
            ?>
            <!-- <div class="store-filter clearfix">
					<ul class="store-pagination text-center">
											</ul>
				</div> -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    const qty_value = document.getElementById('qty_value');
    const qtyup = document.getElementById('qty-up');
    const qtydown = document.getElementById('qty-down');
    qtyup.addEventListener('click', () => {
        qty_value.value = parseInt(qty_value.value) + 1;
    })
    qtydown.addEventListener('click', () => {
        const qtyValue = parseInt(qty_value.value);
        if (qtyValue != 1) {
            qty_value.value = qtyValue - 1;
        }
    })
    const addtocart = document.getElementById('addtocart');
    addtocart.addEventListener('click', () => {
        <?php
        if (!Auth::check()) {
        ?>
            swal("YOU HAVE NOT LOGGED IN\nPlease loggin to add product to your shopping cart!");
            event.preventDefault();
        <?php
        } else {
        ?>
            swal("CART", "Added that product to your shopping cart successfully!");
        <?php
        }
        ?>
    })
    const submitreview = document.getElementById("submitreview");
    submitreview.addEventListener('click', () => {
        <?php
        $check = false;
        for ($j = 0; $j < count($deliveredOrders); $j++) {
            if ($deliveredOrders[$j]->state_id == 3) {
                for ($i = 0; $i < count($orderedProduct); $i++) {
                    if ($orderedProduct[$i]->order_id == $deliveredOrders[$j]->order_id) {
                        if ($orderedProduct[$i]->product_id == $product->id) {
                            $check = true;
                            break;
                        }
                    }
                }
            }
        }
        if ($check) {
        } else {
        ?>
            swal("REVIEW", "You must place and receive that product before reviewing!");
            event.preventDefault();
        <?php
        }
        ?>
    })
</script>
@endsection