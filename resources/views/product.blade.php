@extends('master')
@section('content')
<?php
$productsShow = $product;
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
      <li class="active" id="all">All</li>
      <?php
      foreach ($product_type as $value) {
      ?>
        <li id="type<?php echo ($value['id']) ?>"><?php echo ($value['type_name']) ?></li>
      <?php
      }
      ?>
    </ul>
    <div class="row" id="productShow">
      <?php
      foreach ($productsShow as $value) {
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
                <!-- <img src="http://127.0.0.1:8000/images/<?php echo ($value['image']) ?>" alt=""> -->
                <img src="{{ asset('images/'.$value['image']) }}" alt="">
              </div>
              <a href="" class="add_cart_btn">
                <span>
                  Add To Cart<br>
                </span>
                <span>
                  Detail
                </span>
              </a>
            </div>

            <div class="detail-box">
              <h5>
                <?php echo $value['name'] ?>
              </h5>
              <div class="product_info">
                <h5>
                  <span>$</span><?php echo (number_format($value['price'])) ?>
                </h5>
                <div class="star_container">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                </div>
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
        <?php
        $sizeLists = count($productsShow);
        var_dump($sizeLists);
        ?>
        <li>1</li>
        <li>2</li>
        <li class="activee">3</li>
        <li>4</li>
      </ul>
    </div>
  </div>
</section>

<!-- end product section -->
@endsection