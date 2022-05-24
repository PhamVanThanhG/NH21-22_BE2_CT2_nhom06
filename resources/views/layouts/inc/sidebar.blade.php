<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo"><a href="#" class="simple-text logo-normal">
        ECommerce Shop 6
      </a></div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item {{Request::is('dashboard')?'active':'';}}  ">
          <a class="nav-link" href="{{url('dashboard')}}">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item {{Request::is('producttype')?'active':'';}} ">
          <a class="nav-link" href="{{url('producttype')}}">
            <i class="material-icons">person</i>
            <p>Product Type</p>
          </a>
        </li>
        <li class="nav-item {{Request::is('add_product_type')?'active':'';}}">
          <a class="nav-link" href="{{url('add_product_type')}}">
            <i class="material-icons">person</i>
            <p>Add Product Type</p>
          </a>
        </li>
        <li class="nav-item {{Request::is('products')?'active':'';}} ">
          <a class="nav-link" href="{{url('products')}}">
            <i class="material-icons">person</i>
            <p>Products</p>
          </a>
        </li>
        <li class="nav-item {{Request::is('add_products')?'active':'';}}">
          <a class="nav-link" href="{{url('add_products')}}">
            <i class="material-icons">person</i>
            <p>Add Products</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="#">
            <i class="material-icons">content_paste</i>
            <p>Table List</p>
          </a>
        </li>
      </ul>
    </div>
  </div>