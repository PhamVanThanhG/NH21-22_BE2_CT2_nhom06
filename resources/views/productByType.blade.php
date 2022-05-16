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
<!-- product section -->

<section class="product_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        Our Products
      </h2>
    </div>
    <ul class="filters_menu">
      <a href="{{ url('/product')}}"><li>All</li></a>
      <?php
      foreach ($product_type as $value) {
        if ($_GET['typeid'] == $value['id']) {
          ?>
          <a href="{{ url('/productByType?typeid='.$value['id'])}}"><li class="active"><?php echo ($value['type_name']) ?></li></a>
          <?php
        }else{
          ?>
          <a href="{{ url('/productByType?typeid='.$value['id'])}}"><li><?php echo ($value['type_name']) ?></li></a>
          <?php
        }
      ?>
      <?php
      }
      ?>
    </ul>
    <div class="row" id="productShow">
      <?php
      for ($i = 0; $i < 6; $i++) {
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
              <a href="#">
                <h5>
                  <?php echo $value['name'] ?>
                </h5>
              </a>
              <div class="product_info">
                <h5>
                  <span>$</span><?php echo (number_format($value['price'])) ?>
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
  </div>
</section>
<!-- end product section -->
@endsection