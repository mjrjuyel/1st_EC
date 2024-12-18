@extends('layouts.home')
@section('content')
@if(Session::has('success'))
    <script type="text/javascript">
        swal({
            title: "Success!",
            text: "{{ Session::get('success') }}",
            icon: "success",
            button: "OK",
            timer: 5000,
        });

    </script>
@endif
@if(Session::has('error'))
    <script type="text/javascript">
        swal({
            title: "Opps!",
            text: "{{ Session::get('error') }}",
            icon: "error",
            button: "OK",
            timer: 5000,
        });

    </script>
@endif
<!-- Banner -->
<div class="banner">
    <div class="banner_background"
        style="background-image:url({{ asset('contents/frontend') }}/assets/images/banner_background.jpg)">
    </div>
    <div class="container fill_height">
        <div class="row fill_height">
            <div class="banner_product_image"><img
                    src="{{ asset('uploads/admin/product/'.$banner->pro_thumbnail) }}"
                    alt="helo"></div>
            <div class="col-lg-5 offset-lg-4 fill_height">
                <div class="banner_content">
                    <h1 class="banner_text">{{$banner->pro_title}}</h1>
                    @if($banner->pro_discount_price == null)
                        <div class="banner_price">${{ $banner->pro_selling_price }}</div>
                    @else
                        <div class="banner_price">
                            <span>${{ $banner->pro_selling_price }}</span>${{ $banner->pro_discount_price }}</div>
                    @endif
                    <div class="banner_product_name">{{ $banner->brand->brand_title }}</div>
                    <div class="button banner_button"><a
                            href="{{ url('/product/'.$banner->pro_slug) }}">Shop Now</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Characteristics -->
<div class="characteristics">
    <div class="container">
        <div class="row">
            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">
                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img
                            src="{{ asset('contents/frontend') }}/assets/images/char_1.png" alt="">
                    </div>
                    <div class="char_content">
                        <div class="char_title">Free Delivery</div>
                        <div class="char_subtitle">from $50</div>
                    </div>
                </div>
            </div>

            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">

                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img
                            src="{{ asset('contents/frontend') }}/assets/images/char_2.png" alt="">
                    </div>
                    <div class="char_content">
                        <div class="char_title">Free Delivery</div>
                        <div class="char_subtitle">from $50</div>
                    </div>
                </div>
            </div>

            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">

                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img
                            src="{{ asset('contents/frontend') }}/assets/images/char_3.png" alt="">
                    </div>
                    <div class="char_content">
                        <div class="char_title">Free Delivery</div>
                        <div class="char_subtitle">from $50</div>
                    </div>
                </div>
            </div>

            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">
                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img
                            src="{{ asset('contents/frontend') }}/assets/images/char_4.png" alt="">
                    </div>
                    <div class="char_content">
                        <div class="char_title">Free Delivery</div>
                        <div class="char_subtitle">from $50</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Deals of the week -->

<div class="deals_featured">
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">

                <!-- Deals -->

                <div class="deals">
                    <div class="deals_title">Deals of the Week</div>
                    <div class="deals_slider_container">

                        <!-- Deals Slider -->
                        <div class="owl-carousel owl-theme deals_slider">

                            <!-- Deals Item -->
                            @foreach($todaydeal as $deal)
                            <div class="owl-item deals_item">
                                <div class="deals_image"><img
                                        src="{{ asset('contents/frontend') }}/assets/images/deals.png"
                                        alt=""></div>
                                <div class="deals_content">
                                    <div class="deals_info_line d-flex flex-row justify-content-start">
                                        <div class="deals_item_category"><a href="{{route('product',$deal->pro_slug)}}">{{$deal->pro_title}}</a></div>
                                        <div class="deals_item_price_a ml-auto"> ${{$deal->pro_selling_price}}</div>
                                    </div>
                                    <div class="deals_info_line d-flex flex-row justify-content-start">
                                        <div class="deals_item_name">{{$deal->category->cat_title}}</div>
                                        <div class="deals_item_price ml-auto">@if($deal->pro_discount_price != null) ${{$deal->pro_discount_price}} @endif</div>
                                    </div>
                                    <div class="available">
                                        <div class="available_line d-flex flex-row justify-content-start">
                                            <div class="available_title">Available: <span>6</span></div>
                                            <div class="sold_title ml-auto">Already sold: <span>28</span></div>
                                        </div>
                                        <div class="available_bar"><span style="width:17%"></span></div>
                                    </div>
                                    <div class="deals_timer d-flex flex-row align-items-center justify-content-start">
                                        <div class="deals_timer_title_container">
                                            <div class="deals_timer_title">Hurry Up</div>
                                            <div class="deals_timer_subtitle">Offer ends in:</div>
                                        </div>
                                        <div class="deals_timer_content ml-auto">
                                            <div class="deals_timer_box clearfix" data-target-time="">
                                                <div class="deals_timer_unit">
                                                    <div id="deals_timer1_hr" class="deals_timer_hr"></div>
                                                    <span>hours</span>
                                                </div>
                                                <div class="deals_timer_unit">
                                                    <div id="deals_timer1_min" class="deals_timer_min"></div>
                                                    <span>mins</span>
                                                </div>
                                                <div class="deals_timer_unit">
                                                    <div id="deals_timer1_sec" class="deals_timer_sec"></div>
                                                    <span>secs</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>

                    </div>

                    <div class="deals_slider_nav_container">
                        <div class="deals_slider_prev deals_slider_nav"><i class="ri-arrow-left-fill ml-auto"></i></i>
                        </div>
                        <div class="deals_slider_next deals_slider_nav"><i class="ri-arrow-right-fill ml-auto"></i>
                        </div>
                    </div>
                </div>

                <!-- Featured -->
                <div class="featured">
                    <div class="tabbed_container">
                        <div class="tabs">
                            <ul class="clearfix">
                                <li class="active">Featured</li>
                                <li>On Sale</li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>

                        <!-- Product Panel -->
                        <div class="product_panel panel active">
                            <div class="featured_slider slider">
                                <!-- Slider Item -->
                                @foreach($featured as $fea)
                                    <div class="featured_slider_item">
                                        <div class="border_active"></div>
                                        <div
                                            class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                            <div
                                                class="product_image d-flex flex-column align-items-center justify-content-center">
                                                <img src="{{ asset('uploads/admin/product/'.$fea->pro_thumbnail) }}"
                                                    alt="" width="70%"></div>
                                            <div class="product_content">
                                                @if($fea->pro_discount_price == null)
                                                    <div class="product_price">${{ $fea->pro_selling_price }}</div>
                                                @else
                                                    <div class="product_price discount">
                                                        ${{ $fea->pro_discount_price }}<span>${{ $fea->pro_selling_price }}</span>
                                                    </div>
                                                @endif
                                                <div class="product_name">
                                                    <div><a
                                                            href="{{ route('product',$fea->pro_slug) }}">{{ $fea->pro_title }}</a>
                                                    </div>
                                                </div>
                                                <div class="product_extras">
                                                <form action="{{ route('product.cart.add') }}"
                                                            method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $fea->id }}">
                                                            @if($fea->pro_discount_price != null)
                                                                <input type="hidden" name="price" value="{{ $fea->pro_discount_price }}">
                                                            @else
                                                                <input type="hidden" name="price" value="{{ $fea->pro_selling_price }}">
                                                            @endif

                                                            @if($fea->pro_stock_quantity < 1)
                                                            <input type="hidden" name="quantity" value="0"
                                                            min="1" max="100" step="1">
                                                            @else
                                                                 <input type="hidden" name="quantity" value="1"
                                                                     min="1" max="100" step="1">
                                                            @endif
                                                            <button type="submit" class="product_cart_button">Add to Cart</button>
                                                        </form>
                                                </div>
                                            </div>
                                            <div class="product_fav"><a
                                                    href="{{ route('product.wishlist',$fea->id) }}"><i
                                                        class="ri-heart-3-fill"></i></a></div>
                                            <ul class="product_marks">
                                                @if($fea->pro_discount_price != null)
                                                    @php
                                                        $benefit =$fea->pro_selling_price -
                                                        $fea->pro_discount_price;
                                                        $result = $benefit/$fea->pro_selling_price*100;
                                                        $percentage=round($result);
                                                    @endphp
                                                    <li class="product_mark product_discount">-{{ $percentage }}%</li>
                                                @else
                                                    <li class="product_mark product_discount">New</li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="featured_slider_dots_cover"></div>
                        </div>

                        <!-- Product Panel -->

                        <div class="product_panel panel">
                            <div class="featured_slider slider">

                                <!-- Slider Item -->
                                @foreach($popular as $popular)
                                    <div class="featured_slider_item">
                                        <div class="border_active"></div>
                                        <div
                                            class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                            <div
                                                class="product_image d-flex flex-column align-items-center justify-content-center">
                                                <img src="{{ asset('uploads/admin/product/'.$popular->pro_thumbnail) }}"
                                                    alt="" width="70%"></div>
                                            <div class="product_content">
                                                @if($popular->pro_discount_price == null)
                                                    <div class="product_price">${{ $popular->pro_selling_price }}
                                                    </div>
                                                @else
                                                    <div class="product_price discount">
                                                        ${{ $popular->pro_discount_price }}<span>${{ $popular->pro_selling_price }}</span>
                                                    </div>
                                                @endif
                                                <div class="product_name">
                                                    <div><a
                                                            href="{{ route('product',$popular->pro_slug) }}">{{ $popular->pro_title }}</a>
                                                    </div>
                                                </div>
                                                <div class="product_extras">
                                                    <div class="product_color">
                                                        <input type="radio" checked name="product_color"
                                                            style="background:#b19c83">
                                                        <input type="radio" name="product_color"
                                                            style="background:#000000">
                                                        <input type="radio" name="product_color"
                                                            style="background:#999999">
                                                    </div>
                                                    <button class="product_cart_button">Add to Cart</button>
                                                </div>
                                            </div>
                                            <div class="product_fav"><a
                                                    href="{{ route('product.wishlist',$popular->id) }}"><i
                                                        class="ri-heart-3-fill"></i></a></div>
                                            <ul class="product_marks">
                                                @if($popular->pro_discount_price != null)
                                                    @php
                                                        $benefit =$popular->pro_selling_price -
                                                        $popular->pro_discount_price;
                                                        $result = $benefit/$popular->pro_selling_price*100;
                                                        $percentage=round($result);
                                                    @endphp
                                                    <li class="product_mark product_discount">-{{ $percentage }}%</li>
                                                @else
                                                    <li class="product_mark product_discount">New</li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="featured_slider_dots_cover"></div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Popular Categories -->

<div class="popular_categories">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="popular_categories_content">
                    <div class="popular_categories_title">Popular Categories</div>
                    <div class="popular_categories_slider_nav">
                        <div class="popular_categories_prev popular_categories_nav"><i class="ri-arrow-left-fill"></i>
                        </div>
                        <div class="popular_categories_next popular_categories_nav"><i class="ri-arrow-right-fill"></i>
                        </div>
                    </div>
                    <div class="popular_categories_link"><a href="#">full catalog</a></div>
                </div>
            </div>

            <!-- Popular Categories Slider -->

            <div class="col-lg-9">
                <div class="popular_categories_slider_container">
                    <div class="owl-carousel owl-theme popular_categories_slider">

                        <!-- Popular Categories Item -->
                        @foreach($categoryItem as $cat)
                            <div class="owl-item">
                                <div
                                    class="popular_category d-flex flex-column align-items-center justify-content-center">
                                    <div class="popular_category_image"><img
                                            src="{{ asset('uploads/admin/category/'.$cat->cat_pic) }}"
                                            alt=""></div>
                                    <div class="popular_category_text"><a
                                            href="{{ route('category.product',$cat->id) }}"
                                            style="color:#000;">{{ $cat->cat_title }}</a></div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Banner -->

<div class="banner_2">
    <div class="banner_2_background"
        style="background-image:url({{ asset('contents/frontend') }}/assets/images/banner_2_background.jpg)">
    </div>
    <div class="banner_2_container">
        <div class="banner_2_dots"></div>
        <!-- Banner 2 Slider -->

        <div class="owl-carousel owl-theme banner_2_slider">

            <!-- Banner 2 Slider Item -->
            <div class="owl-item">
                <div class="banner_2_item">
                    <div class="container fill_height">
                        <div class="row fill_height">
                            <div class="col-lg-4 col-md-6 fill_height">
                                <div class="banner_2_content">
                                    <div class="banner_2_category">Laptops</div>
                                    <div class="banner_2_title">MacBook Air 13</div>
                                    <div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Maecenas fermentum laoreet.</div>
                                    <div class="rating_r rating_r_4 banner_2_rating">
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                    </div>
                                    <div class="button banner_2_button"><a href="#">Explore</a></div>
                                </div>

                            </div>
                            <div class="col-lg-8 col-md-6 fill_height">
                                <div class="banner_2_image_container">
                                    <div class="banner_2_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/banner_2_product.png"
                                            alt=""></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Banner 2 Slider Item -->
            <div class="owl-item">
                <div class="banner_2_item">
                    <div class="container fill_height">
                        <div class="row fill_height">
                            <div class="col-lg-4 col-md-6 fill_height">
                                <div class="banner_2_content">
                                    <div class="banner_2_category">Laptops</div>
                                    <div class="banner_2_title">MacBook Air 13</div>
                                    <div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Maecenas fermentum laoreet.</div>
                                    <div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i>
                                    </div>
                                    <div class="button banner_2_button"><a href="#">Explore</a></div>
                                </div>

                            </div>
                            <div class="col-lg-8 col-md-6 fill_height">
                                <div class="banner_2_image_container">
                                    <div class="banner_2_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/banner_2_product.png"
                                            alt=""></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Banner 2 Slider Item -->
            <div class="owl-item">
                <div class="banner_2_item">
                    <div class="container fill_height">
                        <div class="row fill_height">
                            <div class="col-lg-4 col-md-6 fill_height">
                                <div class="banner_2_content">
                                    <div class="banner_2_category">Laptops</div>
                                    <div class="banner_2_title">MacBook Air 13</div>
                                    <div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Maecenas fermentum laoreet.</div>
                                    <div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i>
                                    </div>
                                    <div class="button banner_2_button"><a href="#">Explore</a></div>
                                </div>

                            </div>
                            <div class="col-lg-8 col-md-6 fill_height">
                                <div class="banner_2_image_container">
                                    <div class="banner_2_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/banner_2_product.png"
                                            alt=""></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Mens arrival -->
<div class="new_arrivals">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tabbed_container">
                    <div class="tabs clearfix tabs-right">
                        <div class="new_arrivals_title">{{ $mensCatProduct->cat_title }}</div>
                        <ul class="clearfix">
                            <li class="active">Featured</li>
                        </ul>
                        <div class="tabs_line"><span></span></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-9" style="z-index:1;">

                            <!-- Product Panel -->
                            <div class="product_panel panel active">
                                <div class="arrivals_slider slider">

                                    <!-- Slider Item -->
                                    @foreach($mensCatProduct->products as $product)
                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{asset('uploads/admin/product/'.$product->pro_thumbnail) }}" style="width:80%;" alt=""></div>
                                                       
                                                <div class="product_content">
                                                @if($product->pro_discount_price == null)
                                                    <div class="product_price">${{ $product->pro_selling_price }}</div>
                                                @else
                                                    <div class="product_price discount">
                                                        ${{ $product->pro_discount_price }}<span>${{ $product->pro_selling_price }}</span>
                                                    </div>
                                                @endif
                                                    <div class="product_name">
                                                        <div><a
                                                                href="{{ route('product',$product->pro_slug) }}">{{ $product->pro_title }}</a>
                                                        </div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <form action="{{ route('product.cart.add') }}"
                                                            method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                                            @if($product->pro_discount_price != null)
                                                                <input type="hidden" name="price" value="{{ $product->pro_discount_price }}">
                                                            @else
                                                                <input type="hidden" name="price" value="{{ $product->pro_selling_price }}">
                                                            @endif

                                                            @if($product->pro_stock_quantity < 1)
                                                            <input type="hidden" name="quantity" value="0"
                                                            min="1" max="100" step="1">
                                                            @else
                                                                 <input type="hidden" name="quantity" value="1"
                                                                     min="1" max="100" step="1">
                                                            @endif
                                                            <button type="submit" class="product_cart_button">Add to Cart</button>
                                                        </form>
                                                        
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                @if($product->pro_discount_price != null)
                                                    @php
                                                        $benefit =$product->pro_selling_price -
                                                        $product->pro_discount_price;
                                                        $result = $benefit/$product->pro_selling_price*100;
                                                        $percentage=round($result);
                                                    @endphp
                                                    <li class="product_mark product_new bg-danger">-{{ $percentage }}%</li>
                                                @else
                                                    <li class="product_mark product_new">New</li>
                                                @endif
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <div class="arrivals_slider_dots_cover"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<!-- Women's Arrival -->
<div class="new_arrivals">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tabbed_container">
                    <div class="tabs clearfix tabs-right">
                        <div class="new_arrivals_title">{{ $womensCatProduct->cat_title }}</div>
                        <ul class="clearfix">
                            <li class="active">Featured</li>
                        </ul>
                        <div class="tabs_line"><span></span></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-9" style="z-index:1;">

                            <!-- Product Panel -->
                            <div class="product_panel panel active">
                                <div class="arrivals_slider slider">

                                    <!-- Slider Item -->
                                    @foreach($womensCatProduct->products as $product)
                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('uploads/admin/product/'.$product->pro_thumbnail) }}" class="" style="width:80%;"
                                                        alt=""></div>
                                                       
                                                <div class="product_content">
                                                @if($product->pro_discount_price == null)
                                                    <div class="product_price">${{ $product->pro_selling_price }}</div>
                                                @else
                                                    <div class="product_price discount">
                                                        ${{ $product->pro_discount_price }}<span>${{ $product->pro_selling_price }}</span>
                                                    </div>
                                                @endif
                                                    <div class="product_name">
                                                        <div><a
                                                                href="{{ route('product',$product->pro_slug) }}">{{ $product->pro_title }}</a>
                                                        </div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <form action="{{ route('product.cart.add') }}"
                                                            method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                                            @if($product->pro_discount_price != null)
                                                                <input type="hidden" name="price" value="{{ $product->pro_discount_price }}">
                                                            @else
                                                                <input type="hidden" name="price" value="{{ $product->pro_selling_price }}">
                                                            @endif

                                                            @if($product->pro_stock_quantity < 1)
                                                            <input type="hidden" name="quantity" value="0"
                                                            min="1" max="100" step="1">
                                                            @else
                                                                 <input type="hidden" name="quantity" value="1"
                                                                     min="1" max="100" step="1">
                                                            @endif
                                                            <button type="submit" class="product_cart_button">Add to Cart</button>
                                                        </form>
                                                        
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                @if($product->pro_discount_price != null)
                                                    @php
                                                        $benefit =$product->pro_selling_price -
                                                        $product->pro_discount_price;
                                                        $result = $benefit/$product->pro_selling_price*100;
                                                        $percentage=round($result);
                                                    @endphp
                                                    <li class="product_mark product_new bg-danger">-{{ $percentage }}%</li>
                                                @else
                                                    <li class="product_mark product_new">New</li>
                                                @endif
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <div class="arrivals_slider_dots_cover"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>
<!-- random Arrival -->
<div class="new_arrivals">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tabbed_container">
                    <div class="tabs clearfix tabs-right">
                        <div class="new_arrivals_title">{{ $randomCatProduct->cat_title }}</div>
                        <ul class="clearfix">
                            <li class="active">Featured</li>
                        </ul>
                        <div class="tabs_line"><span></span></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-9" style="z-index:1;">

                            <!-- Product Panel -->
                            <div class="product_panel panel active">
                                <div class="arrivals_slider slider">

                                    <!-- Slider Item -->
                                    @foreach($randomCatProduct->products as $product)
                                        <div class="arrivals_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset('uploads/admin/product/'.$product->pro_thumbnail) }}"
                                                        alt="" class="img-fluid"></div>
                                                       
                                                <div class="product_content">
                                                @if($product->pro_discount_price == null)
                                                    <div class="product_price">${{ $product->pro_selling_price }}</div>
                                                @else
                                                    <div class="product_price discount">
                                                        ${{ $product->pro_discount_price }}<span>${{ $product->pro_selling_price }}</span>
                                                    </div>
                                                @endif
                                                    <div class="product_name">
                                                        <div><a
                                                                href="{{ route('product',$product->pro_slug) }}">{{ $product->pro_title }}</a>
                                                        </div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <form action="{{ route('product.cart.add') }}"
                                                            method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                                            @if($product->pro_discount_price != null)
                                                                <input type="hidden" name="price" value="{{ $product->pro_discount_price }}">
                                                            @else
                                                                <input type="hidden" name="price" value="{{ $product->pro_selling_price }}">
                                                            @endif

                                                            @if($product->pro_stock_quantity < 1)
                                                            <input type="hidden" name="quantity" value="0"
                                                            min="1" max="100" step="1">
                                                            @else
                                                                 <input type="hidden" name="quantity" value="1"
                                                                     min="1" max="100" step="1">
                                                            @endif
                                                            <button type="submit" class="product_cart_button">Add to Cart</button>
                                                        </form>
                                                        
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                @if($product->pro_discount_price != null)
                                                    @php
                                                        $benefit =$product->pro_selling_price -
                                                        $product->pro_discount_price;
                                                        $result = $benefit/$product->pro_selling_price*100;
                                                        $percentage=round($result);
                                                    @endphp
                                                    <li class="product_mark product_new bg-danger">-{{ $percentage }}%</li>
                                                @else
                                                    <li class="product_mark product_new">New</li>
                                                @endif
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <div class="arrivals_slider_dots_cover"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Best Sellers -->

<div class="best_sellers">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tabbed_container">
                    <div class="tabs clearfix tabs-right">
                        <div class="new_arrivals_title">Hot Best Sellers</div>
                        <ul class="clearfix">
                            <li class="active">Top 20</li>
                            <li>Audio & Video</li>
                            <li>Laptops & Computers</li>
                        </ul>
                        <div class="tabs_line"><span></span></div>
                    </div>

                    <div class="bestsellers_panel panel active">

                        <!-- Best Sellers Slider -->

                        <div class="bestsellers_slider slider">

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_1.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_2.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Samsung J730F...</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_3.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Nomi Black White</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_4.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Samsung Charm Gold</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_5.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Beoplay H7</a></div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_6.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Huawei MediaPad T3</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_1.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_2.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_3.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_4.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_5.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_6.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="bestsellers_panel panel">

                        <!-- Best Sellers Slider -->

                        <div class="bestsellers_slider slider">

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_1.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_2.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_3.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_4.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_5.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_6.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_1.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_2.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_3.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_4.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_5.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_6.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="bestsellers_panel panel">

                        <!-- Best Sellers Slider -->

                        <div class="bestsellers_slider slider">

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_1.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_2.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_3.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_4.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_5.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_6.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_1.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_2.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_3.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_4.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item discount">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_5.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                            <!-- Best Sellers Item -->
                            <div class="bestsellers_item">
                                <div
                                    class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                    <div class="bestsellers_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/best_6.png"
                                            alt=""></div>
                                    <div class="bestsellers_content">
                                        <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                        <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a>
                                        </div>
                                        <div class="rating_r rating_r_4 bestsellers_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="bestsellers_price discount">$225<span>$300</span></div>
                                    </div>
                                </div>
                                <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                <ul class="bestsellers_marks">
                                    <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                    <li class="bestsellers_mark bestsellers_new">new</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Adverts -->

<div class="adverts">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 advert_col">
                <!-- Advert Item -->
                <div class="advert d-flex flex-row align-items-center justify-content-start">
                    <div class="advert_content">
                        <div class="advert_title"><a href="#">Trends 2018</a></div>
                        <div class="advert_text">This Year Most Trandy Product</div>
                    </div>
                    <div class="ml-auto">
                        <div class="advert_image"><img
                                src="{{ asset('contents/frontend') }}/assets/images/adv_1.png"
                                alt=""></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 advert_col">

                <!-- Advert Item -->

                <div class="advert d-flex flex-row align-items-center justify-content-start">
                    <div class="advert_content">
                        <div class="advert_subtitle">Trends 2018</div>
                        <div class="advert_title_2"><a href="#">Sale -45%</a></div>
                        <div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
                    </div>
                    <div class="ml-auto">
                        <div class="advert_image"><img
                                src="{{ asset('contents/frontend') }}/assets/images/adv_2.png"
                                alt=""></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 advert_col">

                <!-- Advert Item -->

                <div class="advert d-flex flex-row align-items-center justify-content-start">
                    <div class="advert_content">
                        <div class="advert_title"><a href="#">Trends 2018</a></div>
                        <div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
                    </div>
                    <div class="ml-auto">
                        <div class="advert_image"><img
                                src="{{ asset('contents/frontend') }}/assets/images/adv_3.png"
                                alt=""></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Trends -->

<div class="trends">
    <div class="trends_background"
        style="background-image:url({{ asset('contents/frontend') }}/assets/images/trends_background.jpg)">
    </div>
    <div class="trends_overlay"></div>
    <div class="container">
        <div class="row">

            <!-- Trends Content -->
            <div class="col-lg-3">
                <div class="trends_container">
                    <h2 class="trends_title">Trends 2024</h2>
                    <div class="trends_text">
                        <p>This Year's Most Trandy Product.</p>
                    </div>
                    <div class="trends_slider_nav">
                        <div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                        <div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                    </div>
                </div>
            </div>

            <!-- Trends Slider -->
            <div class="col-lg-9">
                <div class="trends_slider_container">
                    <!-- Trends Slider -->
                    <div class="owl-carousel owl-theme trends_slider">
                        <!-- Trends Slider Item -->
                        @foreach($trendy as $trendy)
                            <div class="owl-item">
                                <div class="trends_item is_new">
                                    <div
                                        class="trends_image d-flex flex-column align-items-center justify-content-center">
                                        <img src="{{ asset('uploads/admin/product/'.$trendy->pro_thumbnail) }}"
                                            alt=""></div>
                                    <div class="trends_content">
                                        <div class="trends_category"><a
                                                href="#">{{ $trendy->category->cat_title }}</a></div>
                                        <div class="trends_info clearfix">
                                            <div class="trends_name"><a
                                                    href="{{ route('product',$trendy->pro_slug) }}">{{ substr($trendy->pro_title,0,20) }}</a>
                                            </div>
                                            <div class="trends_price">
                                                @if($trendy->pro_discount_price != null)
                                                    ${{ $trendy->pro_discount_price }}
                                                @else
                                                    ${{ $trendy->pro_selling_price }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="trends_marks">
                                        @if($trendy->pro_discount_price != null)
                                            @php
                                                $benefit =$trendy->pro_selling_price - $trendy->pro_discount_price;
                                                $result = $benefit/$trendy->pro_selling_price*100;
                                                $percentage=round($result);
                                            @endphp
                                            <li class="product_mark product_discount">-{{ $percentage }}%</li>
                                        @else
                                            <li class="product_mark product_discount">New</li>
                                        @endif
                                    </ul>
                                    <div class="trends_fav"><i class="ri-star-fill"></i></div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Reviews -->

<div class="reviews">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="reviews_title_container">
                    <h3 class="reviews_title">Latest Reviews</h3>
                    <div class="reviews_all ml-auto"><a href="#">view all <span>reviews</span></a></div>
                </div>

                <div class="reviews_slider_container">

                    <!-- Reviews Slider -->
                    <div class="owl-carousel owl-theme reviews_slider">

                        <!-- Reviews Slider Item -->
                        <div class="owl-item">
                            <div class="review d-flex flex-row align-items-start justify-content-start">
                                <div>
                                    <div class="review_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/review_1.jpg"
                                            alt=""></div>
                                </div>
                                <div class="review_content">
                                    <div class="review_name">Roberto Sanchez</div>
                                    <div class="review_rating_container">
                                        <div class="rating_r rating_r_4 review_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="review_time">2 day ago</div>
                                    </div>
                                    <div class="review_text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum
                                            laoreet.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reviews Slider Item -->
                        <div class="owl-item">
                            <div class="review d-flex flex-row align-items-start justify-content-start">
                                <div>
                                    <div class="review_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/review_2.jpg"
                                            alt=""></div>
                                </div>
                                <div class="review_content">
                                    <div class="review_name">Brandon Flowers</div>
                                    <div class="review_rating_container">
                                        <div class="rating_r rating_r_4 review_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="review_time">2 day ago</div>
                                    </div>
                                    <div class="review_text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum
                                            laoreet.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reviews Slider Item -->
                        <div class="owl-item">
                            <div class="review d-flex flex-row align-items-start justify-content-start">
                                <div>
                                    <div class="review_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/review_3.jpg"
                                            alt=""></div>
                                </div>
                                <div class="review_content">
                                    <div class="review_name">Emilia Clarke</div>
                                    <div class="review_rating_container">
                                        <div class="rating_r rating_r_4 review_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="review_time">2 day ago</div>
                                    </div>
                                    <div class="review_text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum
                                            laoreet.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reviews Slider Item -->
                        <div class="owl-item">
                            <div class="review d-flex flex-row align-items-start justify-content-start">
                                <div>
                                    <div class="review_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/review_1.jpg"
                                            alt=""></div>
                                </div>
                                <div class="review_content">
                                    <div class="review_name">Roberto Sanchez</div>
                                    <div class="review_rating_container">
                                        <div class="rating_r rating_r_4 review_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="review_time">2 day ago</div>
                                    </div>
                                    <div class="review_text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum
                                            laoreet.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reviews Slider Item -->
                        <div class="owl-item">
                            <div class="review d-flex flex-row align-items-start justify-content-start">
                                <div>
                                    <div class="review_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/review_2.jpg"
                                            alt=""></div>
                                </div>
                                <div class="review_content">
                                    <div class="review_name">Brandon Flowers</div>
                                    <div class="review_rating_container">
                                        <div class="rating_r rating_r_4 review_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="review_time">2 day ago</div>
                                    </div>
                                    <div class="review_text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum
                                            laoreet.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reviews Slider Item -->
                        <div class="owl-item">
                            <div class="review d-flex flex-row align-items-start justify-content-start">
                                <div>
                                    <div class="review_image"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/review_3.jpg"
                                            alt=""></div>
                                </div>
                                <div class="review_content">
                                    <div class="review_name">Emilia Clarke</div>
                                    <div class="review_rating_container">
                                        <div class="rating_r rating_r_4 review_rating">
                                            <i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="review_time">2 day ago</div>
                                    </div>
                                    <div class="review_text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum
                                            laoreet.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="reviews_dots"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recently Viewed -->

<div class="viewed">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="viewed_title_container">
                    <h3 class="viewed_title">Recently Viewed</h3>
                    <div class="viewed_nav_container">
                        <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                    </div>
                </div>

                <div class="viewed_slider_container">

                    <!-- Recently Viewed Slider -->

                    <div class="owl-carousel owl-theme viewed_slider">

                        <!-- Recently Viewed Item -->
                        @if($recentview->count() > 0)
                            @foreach($recentview as $recent)
                                <div class="owl-item">
                                    <div
                                        class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="viewed_image"><img
                                                src="{{ asset('uploads/admin/product/'.$recent->pro_thumbnail) }}"
                                                alt=""></div>
                                        <div class="viewed_content text-center">
                                               @if($recent->pro_discount_price == null)
                                                    <div class="viewed_price">${{ $recent->pro_selling_price }}</div>
                                                @else
                                                    <div class="viewed_price discount">
                                                        ${{ $recent->pro_discount_price }}<span>${{ $recent->pro_selling_price }}</span>
                                                    </div>
                                                @endif
                                            <div class="viewed_name"><a
                                            href="{{ route('product',$product->pro_slug) }}">{{ $recent->pro_title }}</a></div>
                                        </div>
                                        <ul class="item_marks">
                                        @if($recent->pro_discount_price != null)
                                            @php
                                                $benefit =$recent->pro_selling_price - $recent->pro_discount_price;
                                                $result = $benefit/$recent->pro_selling_price*100;
                                                $percentage=round($result);
                                            @endphp
                                            <li class="item_mark product_discount">-{{ $percentage }}%</li>
                                        @else
                                            <li class="item_mark product_discount">New</li>
                                        @endif
                                        </ul>
                                    </div>
                                </div>

                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Brands -->

<div class="brands">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="brands_slider_container">

                    <!-- Brands Slider -->

                    <div class="owl-carousel owl-theme brands_slider">

                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img
                                    src="{{ asset('contents/frontend') }}/assets/images/brands_1.jpg"
                                    alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img
                                    src="{{ asset('contents/frontend') }}/assets/images/brands_2.jpg"
                                    alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img
                                    src="{{ asset('contents/frontend') }}/assets/images/brands_3.jpg"
                                    alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img
                                    src="{{ asset('contents/frontend') }}/assets/images/brands_4.jpg"
                                    alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img
                                    src="{{ asset('contents/frontend') }}/assets/images/brands_5.jpg"
                                    alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img
                                    src="{{ asset('contents/frontend') }}/assets/images/brands_6.jpg"
                                    alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img
                                    src="{{ asset('contents/frontend') }}/assets/images/brands_7.jpg"
                                    alt=""></div>
                        </div>
                        <div class="owl-item">
                            <div class="brands_item d-flex flex-column justify-content-center"><img
                                    src="{{ asset('contents/frontend') }}/assets/images/brands_8.jpg"
                                    alt=""></div>
                        </div>

                    </div>

                    <!-- Brands Slider Navigation -->
                    <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
                    <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Newsletter -->

<div class="newsletter">
    <div class="container">
        <div class="row">
            <div class="col">
                <div
                    class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                    <div class="newsletter_title_container">
                        <div class="newsletter_icon"><img
                                src="{{ asset('contents/frontend') }}/assets/images/send.png"
                                alt=""></div>
                        <div class="newsletter_title">Sign up for Newsletter</div>
                        <div class="newsletter_text">
                            <p>...and receive %20 coupon for first shopping.</p>
                        </div>
                    </div>
                    <div class="newsletter_content clearfix">
                        <form action="#" class="newsletter_form">
                            <input type="email" class="newsletter_input" required="required"
                                placeholder="Enter your email address">
                            <button class="newsletter_button">Subscribe</button>
                        </form>
                        <div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
