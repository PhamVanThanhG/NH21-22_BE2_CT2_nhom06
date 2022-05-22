@extends('master')
@section('content')
<?php
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
$productsShow = $product;
$sizeLists = count($product);
$index = $sizeLists / 6 + 1;
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
                <img src="../images/slider-img.png" alt="">
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
                <img src="../images/slider-img.png" alt="">
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
    <div class="row" id="productShow">
      <?php
      for ($i = 0; $i < 6; $i++) {
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
              <a href="" class="add_cart_btn">
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
              <a href="" class="add_cart_btn">
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
@endsection