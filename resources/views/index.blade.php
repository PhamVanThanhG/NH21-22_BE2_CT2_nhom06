@extends('master')
@section('content')
<style>
  .chose {
    background-color: red !important;
  }

  .filterDiv {
    float: left;
    background-color: #2196F3;
    color: #ffffff;
    width: 150px;
    line-height: 50px;
    text-align: center;
    margin: 2px;
    display: none;
  }

  .show {
    display: block;
  }

  .container {
    margin-top: 20px;
    overflow: hidden;
  }

  /* Style the buttons */
  .btn {
    border: none;
    outline: none;
    padding: 12px 16px;
    background-color: #f1f1f1;
    cursor: pointer;
  }

  .btn:hover {
    background-color: #ddd;
  }

  .btn.activeww {
    background-color: #666;
    color: white;
  }
</style>
<?php

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
  return floor($result / count($array));
}
$productsShow = $product;
$sizeLists = count($productsShow);

$index = $sizeLists / 6 + 1;

$sizeToShowFirst = 0;
if (count($productsShow) < 6) {
  $sizeToShowFirst = count($productsShow);
} else {
  $sizeToShowFirst = 6;
}
?>
<!-- slider section -->
<section class="slider_section ">
  <div id="customCarousel1" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="container ">
          <div class="row">
            <div class="col-md-6">
              <div class="detail-box">
                <h1>
                  Welcome to our shop
                </h1>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste quam velit saepe dolorem deserunt quo quidem ad optio.
                </p>
                <a href="">
                  Read More
                </a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="img-box">
                <img src="{{ asset('images/slider-img.png') }}" alt="" height="444">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="container ">
          <!-- Featured product -->
          <div class="row">
            <div class="col-md-12">
              <div class="section-title text-center">
                <h3 class="title">Featured Products</h3>
              </div>
            </div>
            <?php
            for ($i = 0; $i < count($feature_product); $i++) {
              $value = $feature_product[$i];
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
        </div>
      </div>
      <div class="carousel-item">
        <div class="container ">
          <div class="row">
            <div class="col-md-6">
              <div class="detail-box">
                <h1>
                  Welcome to our shop
                </h1>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste quam velit saepe dolorem deserunt quo quidem ad optio.
                </p>
                <a href="">
                  Read More
                </a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="img-box">
                <img src="{{ asset('images/slider-img.png') }}" alt="" height="444">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel_btn_box">
      <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
        <i class="fa fa-angle-left" aria-hidden="true"></i>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
        <i class="fa fa-angle-right" aria-hidden="true"></i>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</section>
<!-- end slider section -->
</div>


<!-- product section -->
<section class="product_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        Our Products
      </h2>
    </div>
    <div class="row">
      <div class="col-2">
        <button id="filter" style="background-color: #1d3b96; color: white;">Filter ></button>
        <a href="{{ url('/')}}"><Button>Reset</Button></a>
      </div>
      <div class="col" id="filterbox" style="display: none;">
        <div>
          <div id="myBtnContainer">
            <button class="btn activeww" onclick="filterSelection('all')"> Show all</button>
            <button class="btn" onclick="filterSelection('price')">Price</button>
            <button class="btn" onclick="filterSelection('sale')">Sale</button>
          </div>
          <div class="container">

            <div class="filterDiv price <?php
                                        if (isset($price)) {
                                          if ($price == 1) {
                                            echo "chose";
                                          }
                                        }
                                        ?>" id="price1"> 0 - $100</div>

            <div class="filterDiv price <?php
                                        if (isset($price)) {
                                          if ($price == 2) {
                                            echo "chose";
                                          }
                                        }
                                        ?>" id="price2"> $101 - $500</div>

            <div class="filterDiv price <?php
                                        if (isset($price)) {
                                          if ($price == 3) {
                                            echo "chose";
                                          }
                                        }
                                        ?>" id="price3"> $501 - $1000</div>


            <div class="filterDiv price <?php
                                        if (isset($price)) {
                                          if ($price == 4) {
                                            echo "chose";
                                          }
                                        }
                                        ?>" id="price4"> > $1000</div>


            <div class="filterDiv sale <?php
                                        if (isset($sale)) {
                                          if ($sale == 'sale') {
                                            echo "chose";
                                          }
                                        }
                                        ?>" id="sale">Sale</div>

            <div class="filterDiv sale <?php
                                        if (isset($sale)) {
                                          if ($sale == "notsale") {
                                            echo "chose";
                                          }
                                        }
                                        ?>" id="notsale">Not sale</div>

            <div class="filterDiv sale <?php
                                        if (isset($sale)) {
                                          if ($sale == "all") {
                                            echo "chose";
                                          }
                                        }
                                        ?>" id="allsale">All</div>
          </div>
        </div>
      </div>
    </div>
    <div class="row" id="productShow">
      <?php
      if (count($productsShow) == 0) {
        echo ("No product");
      } else {
      ?>
        <?php
        for ($i = 0; $i < $sizeToShowFirst; $i++) {
          //count($productsShow)
          $value = $productsShow[$i];
        ?>
          <div class="col-sm-6 col-lg-4">
            <div class="box">
              <div class="img-box">
                <?php
                if ($value->discount->active != 0) {
                ?>
                  <div class="product-label">
                    <span class="sale">-<?php echo ($value->discount->values * 100) ?>%</span>
                  </div>
                <?php
                }
                ?>
                <div style="position: absolute;">
                  <img src="{{ asset('images/'.$value['image']) }}" alt="">
                </div>
                <a href="{{ url('/addcartonindex/'.$value['id'])}}" class="add_cart_btn" id="addcartonindex">
                  <span>
                    Add To Cart<br>
                  </span>
                </a>
              </div>
              <div class="detail-box">
                <a href="{{ url('/detail/'.$value['id'])}}">
                  <h5>
                    <?php echo $value['name'] ?>
                  </h5>
                </a>
                <div class="product_info">
                  <h5>
                    <span>$</span><?php echo (number_format($value['price'] * (1 - $value->discount->values))) ?>
                    <?php
                    if ($value->discount->active != 0) {
                    ?>
                      <del class="product-old-price" style="margin-left: 8px;">$<?php echo (number_format($value['price'])) ?></del>
                    <?php
                    }
                    ?>
                  </h5>
                  <?php
                  $ratingProduct = getRatingByProductId($rating, $value['id']);
                  if (count($ratingProduct) > 0) {
                  ?>
                    <div class="star_container">
                      <?php
                      $rating_value = getRatingValue($ratingProduct);
                      if ($rating_value == 1) {
                      ?>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true" style="color: gray;"></i>
                        <i class="fa fa-star" aria-hidden="true" style="color: gray;"></i>
                        <i class="fa fa-star" aria-hidden="true" style="color: gray;"></i>
                        <i class="fa fa-star" aria-hidden="true" style="color: gray;"></i>
                        <span>(<?php echo count($ratingProduct) ?>)</span>
                      <?php
                      } else if ($rating_value == 2) {
                      ?>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true" style="color: gray;"></i>
                        <i class="fa fa-star" aria-hidden="true" style="color: gray;"></i>
                        <i class="fa fa-star" aria-hidden="true" style="color: gray;"></i>
                        <span style="color: black;">(<?php echo count($ratingProduct) ?>)</span>
                      <?php
                      } else if ($rating_value == 3) {
                      ?>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true" style="color: gray;"></i>
                        <i class="fa fa-star" aria-hidden="true" style="color: gray;"></i>
                        <span style="color: black;">(<?php echo count($ratingProduct) ?>)</span>
                      <?php
                      } else if ($rating_value == 4) {
                      ?>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true" style="color: gray;"></i>
                        <span style="color: black;">(<?php echo count($ratingProduct) ?>)</span>
                      <?php
                      } else if ($rating_value == 5) {
                      ?>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <span style="color: black;">(<?php echo count($ratingProduct) ?>)</span>
                      <?php
                      }
                      ?>

                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
      <?php
      }
      ?>
    </div>
    <div class="store-filter clearfix" id="phantrang">
      <ul class="store-pagination" style="margin-top: 40px;">
        <li id="chuyentrang1" class="activee">1</li>
        <?php
        // $index = $sizeLists / 6 + 1;
        for ($j = 2; $j <= $index; $j++) {
        ?>
          <li id="chuyentrang<?php echo $j ?>"><?php echo $j ?></li>
        <?php
        }
        ?>
      </ul>
    </div>
</section>

<!-- end product section -->

<!-- about section -->

<section class="about_section">
  <div class="container-fluid  ">
    <div class="row">
      <div class="col-md-5 ml-auto">
        <div class="detail-box pr-md-3">
          <div class="heading_container">
            <h2>
              We Provide Best For You
            </h2>
          </div>
          <p>
            Totam architecto rem beatae veniam, cum officiis adipisci soluta perspiciatis ipsa, expedita maiores quae accusantium. Animi veniam aperiam, necessitatibus mollitia ipsum id optio ipsa odio ab facilis sit labore officia!
            Repellat expedita, deserunt eum soluta rem culpa. Aut, necessitatibus cumque. Voluptas consequuntur vitae aperiam animi sint earum, ex unde cupiditate, molestias dolore quos quas possimus eveniet facilis magnam? Vero, dicta.
          </p>
          <a href="">
            Read More
          </a>
        </div>
      </div>
      <div class="col-md-6 px-0">
        <div class="img-box">
          <img src="../images/about-img.jpg" alt="">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- end about section -->

<!-- why us section -->

<section class="why_us_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        Why Choose Us
      </h2>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="box ">
          <div class="img-box">
            <img src="../images/w1.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Fast Delivery
            </h5>
            <p>
              variations of passages of Lorem Ipsum available
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="box ">
          <div class="img-box">
            <img src="../images/w2.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Free Shiping
            </h5>
            <p>
              variations of passages of Lorem Ipsum available
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="box ">
          <div class="img-box">
            <img src="../images/w3.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Best Quality
            </h5>
            <p>
              variations of passages of Lorem Ipsum available
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- end why us section -->


<!-- client section -->

<section class="client_section layout_padding-bottom">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        What Says Our Customers
      </h2>
    </div>
  </div>
  <div class="client_container ">
    <div id="carouselExample2Controls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="container">
            <div class="box">
              <div class="detail-box">
                <p>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                </p>
                <p>
                  It is a long established fact that a reader will be distracted by the readable content of a page
                  when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                  distribution of letters, as opposed to using 'Content here, content here', making it lookIt is a
                  long established fact that a reader will be distracted by the readable content of a page when
                  looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                  distribution of letters, as opposed to using 'Content here, content here', making it look
                </p>
              </div>
              <div class="client-id">
                <div class="img-box">
                  <img src="../images/client.jpg" alt="">
                </div>
                <div class="name">
                  <h5>
                    James Dew
                  </h5>
                  <h6>
                    Photographer
                  </h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="container">
            <div class="box">
              <div class="detail-box">
                <p>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                </p>
                <p>
                  It is a long established fact that a reader will be distracted by the readable content of a page
                  when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                  distribution of letters, as opposed to using 'Content here, content here', making it lookIt is a
                  long established fact that a reader will be distracted by the readable content of a page when
                  looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                  distribution of letters, as opposed to using 'Content here, content here', making it look
                </p>
              </div>
              <div class="client-id">
                <div class="img-box">
                  <img src="../images/client.jpg" alt="">
                </div>
                <div class="name">
                  <h5>
                    James Dew
                  </h5>
                  <h6>
                    Photographer
                  </h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="container">
            <div class="box">
              <div class="detail-box">
                <p>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                </p>
                <p>
                  It is a long established fact that a reader will be distracted by the readable content of a page
                  when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                  distribution of letters, as opposed to using 'Content here, content here', making it lookIt is a
                  long established fact that a reader will be distracted by the readable content of a page when
                  looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                  distribution of letters, as opposed to using 'Content here, content here', making it look
                </p>
              </div>
              <div class="client-id">
                <div class="img-box">
                  <img src="../images/client.jpg" alt="">
                </div>
                <div class="name">
                  <h5>
                    James Dew
                  </h5>
                  <h6>
                    Photographer
                  </h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel_btn-box">
        <a class="carousel-control-prev" href="#carouselExample2Controls" role="button" data-slide="prev">
          <span>
            <i class="fa fa-angle-left" aria-hidden="true"></i>
          </span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExample2Controls" role="button" data-slide="next">
          <span>
            <i class="fa fa-angle-right" aria-hidden="true"></i>
          </span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
</section>
<!-- end client section -->
<script>
  const all = document.getElementById('all');
  const show = document.getElementById('productShow');
  const phantrang = document.getElementById('phantrang');
  <?php
  for ($j = 1; $j <= $index + 1; $j++) {
  ?>
    const chuyentrang<?php echo $j ?> = document.getElementById('chuyentrang<?php echo $j ?>');
  <?php
  }
  for ($j = 1; $j <= $index + 1; $j++) {
  ?>
    chuyentrang<?php echo $j ?>.addEventListener("click", () => {
      show.innerHTML = `      <?php
                              $end = 0;
                              if (($j * 6) > $sizeLists) {
                                $end = $sizeLists;
                              } else {
                                $end = $j * 6;
                              }
                              for ($i = (($j - 1) * 6); $i < $end; $i++) {
                                $value = $productsShow[$i];
                              ?>
        <div class="col-sm-6 col-lg-4">
          <div class="box">
            <div class="img-box">
              <?php
                                if ($value->discount->active != 0) {
              ?>
                <div class="product-label">
                  <span class="sale">-<?php echo ($value->discount->values * 100) ?>%</span>
                </div>
              <?php
                                }
              ?>
              <div style="position: absolute;">
                <img src="{{ asset('images/'.$value['image']) }}" alt="">
              </div>
              <a href="{{ url('/addcartonindex/'.$value['id'])}}" class="add_cart_btn" id="addcartonindex">
                  <span>
                    Add To Cart<br>
                  </span>
                </a>
            </div>
            <div class="detail-box">
            <a href="/detail/{{ $value['id'] }}">
                <h5>
                  <?php echo $value['name'] ?>
                </h5>
              </a>
              <div class="product_info">
              <h5>
                  <span>$</span><?php echo (number_format($value['price'] * (1 - $value->discount->values))) ?>
                  <?php
                                if ($value->discount->active != 0) {
                  ?>
                      <del class="product-old-price" style="margin-left: 8px;">$<?php echo (number_format($value['price'])) ?></del>
                      <?php
                                }
                      ?>
                </h5>
                <?php
                                $ratingProduct = getRatingByProductId($rating, $value['id']);
                                if (count($ratingProduct) > 0) {
                ?>
                  <div class="star_container">
                    <?php
                                  $rating_value = getRatingValue($ratingProduct);
                                  if ($rating_value == 1) {
                    ?>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true" style="color: gray;"></i>
                      <i class="fa fa-star" aria-hidden="true" style="color: gray;"></i>
                      <i class="fa fa-star" aria-hidden="true" style="color: gray;"></i>
                      <i class="fa fa-star" aria-hidden="true" style="color: gray;"></i>
                      <span>(<?php echo count($ratingProduct) ?>)</span>
                    <?php
                                  } else if ($rating_value == 2) {
                    ?>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true" style="color: gray;"></i>
                      <i class="fa fa-star" aria-hidden="true" style="color: gray;"></i>
                      <i class="fa fa-star" aria-hidden="true" style="color: gray;"></i>
                      <span style="color: black;">(<?php echo count($ratingProduct) ?>)</span>
                    <?php
                                  } else if ($rating_value == 3) {
                    ?>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true" style="color: gray;"></i>
                      <i class="fa fa-star" aria-hidden="true" style="color: gray;"></i>
                      <span style="color: black;">(<?php echo count($ratingProduct) ?>)</span>
                    <?php
                                  } else if ($rating_value == 4) {
                    ?>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true" style="color: gray;"></i>
                      <span style="color: black;">(<?php echo count($ratingProduct) ?>)</span>
                    <?php
                                  } else if ($rating_value == 5) {
                    ?>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <span style="color: black;">(<?php echo count($ratingProduct) ?>)</span>
                    <?php
                                  }
                    ?>

                  </div>
                <?php
                                }
                ?>
              </div>
            </div>
          </div>
        </div>
      <?php
                              } ?>`;
      if (!chuyentrang<?php echo $j ?>.classList.contains('activee')) {
        //Xoa them class active
        chuyentrang<?php echo $j ?>.classList.add('activee');
        <?php
        for ($k = 1; $k <= $index + 1; $k++) {
          if ($k != $j) {
        ?>
            if (chuyentrang<?php echo $k ?>.classList.contains('activee')) {
              chuyentrang<?php echo $k ?>.classList.remove('activee');
            }
        <?php
          }
        }
        ?>
        //Update show
      }
    })
  <?php
  }
  ?>
</script>
<script>
  filterSelection("all")

  function filterSelection(c) {
    var x, i;
    x = document.getElementsByClassName("filterDiv");
    if (c == "all") c = "";
    for (i = 0; i < x.length; i++) {
      w3RemoveClass(x[i], "show");
      if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
    }
  }

  function w3AddClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
      if (arr1.indexOf(arr2[i]) == -1) {
        element.className += " " + arr2[i];
      }
    }
  }

  function w3RemoveClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
      while (arr1.indexOf(arr2[i]) > -1) {
        arr1.splice(arr1.indexOf(arr2[i]), 1);
      }
    }
    element.className = arr1.join(" ");
  }

  // Add active class to the current button (highlight it)
  var btnContainer = document.getElementById("myBtnContainer");
  var btns = btnContainer.getElementsByClassName("btn");
  for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
      var current = document.getElementsByClassName("activeww");
      current[0].className = current[0].className.replace(" activeww", "");
      this.className += " activeww";
    });
  }
  const filterbox = document.getElementById("filterbox");
  const filter = document.getElementById("filter");
  filter.addEventListener('click', () => {
    if (filterbox.style.display == "none") {
      filterbox.style.display = "inline";
    } else {
      filterbox.style.display = "none";
    }
  })


  const price1 = document.getElementById("price1");
  const price2 = document.getElementById("price2");
  const price3 = document.getElementById("price3");
  const price4 = document.getElementById("price4");
  const sale = document.getElementById("sale");
  const notsale = document.getElementById("notsale");
  const allsale = document.getElementById("allsale");

  price1.addEventListener('click', () => {
    if (sale.classList.contains("chose")) {
      window.location = "{{ url('/filter/price1/sale')}}";
    } else if (notsale.classList.contains("chose")) {
      window.location = "{{ url('/filter/price1/notsale')}}";
    } else {
      window.location = "{{ url('/filter/price1/all')}}";
    }
  })
  price2.addEventListener('click', () => {
    if (sale.classList.contains("chose")) {
      window.location = "{{ url('/filter/price2/sale')}}";
    } else if (notsale.classList.contains("chose")) {
      window.location = "{{ url('/filter/price2/notsale')}}";
    } else {
      window.location = "{{ url('/filter/price2/all')}}";
    }
  })
  price3.addEventListener('click', () => {
    if (sale.classList.contains("chose")) {
      window.location = "{{ url('/filter/price3/sale')}}";
    } else if (notsale.classList.contains("chose")) {
      window.location = "{{ url('/filter/price3/notsale')}}";
    } else {
      window.location = "{{ url('/filter/price3/all')}}";
    }
  })
  price4.addEventListener('click', () => {
    if (sale.classList.contains("chose")) {
      window.location = "{{ url('/filter/price4/sale')}}";
    } else if (notsale.classList.contains("chose")) {
      window.location = "{{ url('/filter/price4/notsale')}}";
    } else {
      window.location = "{{ url('/filter/price4/all')}}";
    }
  })
  sale.addEventListener('click', () => {
    if (price1.classList.contains("chose")) {
      window.location = "{{ url('/filter/price1/sale')}}";
    } else if (price2.classList.contains("chose")) {
      window.location = "{{ url('/filter/price2/sale')}}";
    } else if (price3.classList.contains("chose")) {
      window.location = "{{ url('/filter/price3/sale')}}";
    } else if (price4.classList.contains("chose")) {
      window.location = "{{ url('/filter/price4/sale')}}";
    } else {
      window.location = "{{ url('/filter/price0/sale')}}";
    }
  })
  notsale.addEventListener('click', () => {
    if (price1.classList.contains("chose")) {
      window.location = "{{ url('/filter/price1/notsale')}}";
    } else if (price2.classList.contains("chose")) {
      window.location = "{{ url('/filter/price2/notsale')}}";
    } else if (price3.classList.contains("chose")) {
      window.location = "{{ url('/filter/price3/notsale')}}";
    } else if (price4.classList.contains("chose")) {
      window.location = "{{ url('/filter/price4/notsale')}}";
    } else {
      window.location = "{{ url('/filter/price0/notsale')}}";
    }
  })

  allsale.addEventListener('click', () => {
    if (price1.classList.contains("chose")) {
      window.location = "{{ url('/filter/price1/all')}}";
    } else if (price2.classList.contains("chose")) {
      window.location = "{{ url('/filter/price2/all')}}";
    } else if (price3.classList.contains("chose")) {
      window.location = "{{ url('/filter/price3/all')}}";
    } else if (price4.classList.contains("chose")) {
      window.location = "{{ url('/filter/price4/all')}}";
    } else {
      window.location = "{{ url('/filter/price0/all')}}";
    }
  })

  const addcartonindex = document.getElementById("addcartonindex");
  addcartonindex.addEventListener('click', () => {
    <?php
    if (!Auth::check()) {
    ?>
      swal("ADD CART", "You must login before add product to your cart!");
      event.preventDefault();
    <?php
    } else {
    ?>
      swal("ADD CART", "Add that product to your cart successfully!");
    <?php
    }
    ?>
  })
</script>
@endsection