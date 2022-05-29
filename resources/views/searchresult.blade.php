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
  return floor($result / count($array));
}
$productsShow = $product;
$sizeLists = count($product);
$index = $sizeLists / 6 + 1;
$sizeToShowFirst = 0;
if (count($productsShow) < 6) {
  $sizeToShowFirst = count($productsShow);
}else {
  $sizeToShowFirst = 6;
}
?>
<!-- product section -->

<section class="product_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        Search result
      </h2>
    </div>
    <h5>
    Search keyword: {{ $keyword }}
    </h5>
    <div class="row" id="productShow">
      <?php
      if (count($productsShow) != 0) {
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
                <a href="#" class="add_cart_btn">
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
      <?php
      }else{
        echo("No product");
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