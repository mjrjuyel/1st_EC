@extends('layouts.home')
@section('category_css')
<link rel="stylesheet"
    href="{{ asset('contents/frontend') }}/assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" href="{{ asset('contents/frontend') }}/assets/styles/shop_styles.css">
<link rel="stylesheet" href="{{ asset('contents/frontend') }}/assets/styles/shop_responsive.css">
@endsection
<!-- Home -->
@section('content')
<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll"
        data-image-src="{{ asset('contents/frontend') }}/assets/images/shop_background.jpg">
    </div>
    <div class="home_overlay"></div>
    <div class="home_content d-flex flex-column align-items-center justify-content-center">
        <h2 class="home_title">{{ $subcat->subcat_title }}</h2>
    </div>
</div>

<!-- Shop -->

<div class="shop">
    <div class="container">
        <div class="brands">
            <div class="container">

                <div class="row">
                    <div class="col">
                        <div class="brands_slider_container">
                            <!-- Brands Slider -->
                            <div class="owl-carousel owl-theme brands_slider">
                                @foreach($brand as $brand)
                                    <div class="owl-item">
                                        <div class="brands_item d-flex flex-column justify-content-center">
                                            <h2>{{ $brand->brand_title }}</h2>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- Brands Slider Navigation -->
                            <div class="brands_nav brands_prev"><i class="ri-arrow-left-line"></i></div>
                            <div class="brands_nav brands_next"><i class="ri-arrow-right-line"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- product list -->
        <div class="row">
            <div class="col-lg-3">

                <!-- Shop Sidebar -->
                <div class="shop_sidebar">
                    <div class="sidebar_section">
                        <div class="sidebar_title">ChildCategories</div>
                        <ul class="sidebar_categories">
                                <li>
                                    <a href="{{ route('category.product',$subcat->category->id) }}">{{ $subcat->category->cat_title }}</a> / <a class="text-primary" href="#">{{ $subcat->subcat_title }}</a>
                                </li>
                            
                        <ul class="sidebar_categories">
                            @foreach($childcat as $childcat)
                                <li><a
                                        href="{{ route('category.subcategory.product',$subcat->id) }}">{{ $childcat->child_cat_title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar_section filter_by_section">
                        <div class="sidebar_title">Filter By</div>
                        <div class="sidebar_subtitle">Price</div>
                        <div class="filter_price">
                            <div id="slider-range" class="slider_range"></div>
                            <p>Range: </p>
                            <p><input type="text" id="amount" class="amount" readonly
                                    style="border:0; font-weight:bold;"></p>
                        </div>
                    </div>
                    <div class="sidebar_section">
                        <div class="sidebar_subtitle color_subtitle">Color</div>
                        <ul class="colors_list">
                            <li class="color"><a href="#" style="background: #b19c83;"></a></li>
                            <li class="color"><a href="#" style="background: #000000;"></a></li>
                            <li class="color"><a href="#" style="background: #999999;"></a></li>
                            <li class="color"><a href="#" style="background: #0e8ce4;"></a></li>
                            <li class="color"><a href="#" style="background: #df3b3b;"></a></li>
                            <li class="color"><a href="#" style="background: #ffffff; border: solid 1px #e1e1e1;"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="sidebar_section">
                        <div class="sidebar_subtitle brands_subtitle">Brands</div>
                        <ul class="brands_list">
                            <li class="brand"><a href="#">Apple</a></li>
                            <li class="brand"><a href="#">Beoplay</a></li>
                            <li class="brand"><a href="#">Google</a></li>
                            <li class="brand"><a href="#">Meizu</a></li>
                            <li class="brand"><a href="#">OnePlus</a></li>
                            <li class="brand"><a href="#">Samsung</a></li>
                            <li class="brand"><a href="#">Sony</a></li>
                            <li class="brand"><a href="#">Xiaomi</a></li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="col-lg-9">

                <!-- Shop Content -->

                <div class="shop_content">
                    <div class="shop_bar clearfix">
                        <div class="shop_product_count"><span>{{ $products->count() }}</span> products found</div>
                        <div class="shop_sorting">
                            <span>Sort by:</span>
                            <ul>
                                <li>
                                    <span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
                                    <ul>
                                        <li class="shop_sorting_button"
                                            data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name
                                        </li>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "price" }'>
                                            price</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="product_grid row">
                        <div class="product_grid_border"></div>
                        <!-- Product Item -->
                        @foreach($products as $product)
                            <div class="col-md-3 col-sm-3">
                                <div
                                    class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="viewed_image"><img
                                            src="{{ asset('uploads/admin/product/'.$product->pro_thumbnail) }}"
                                            alt=""></div>
                                    <div class="viewed_content text-center">

                                        @if($product->pro_discount_price != null)
                                            <div class="viewed_price">
                                                ${{ $product->pro_discount_price }}<span>${{ $product->pro_selling_price }}</span>
                                            </div>
                                        @else
                                            <div class="viewed_price">${{ $product->pro_selling_price }}</div>
                                        @endif
                                        <div class="viewed_name"><a
                                                href="{{ route('product',$product->pro_slug) }}">{{ $product->pro_title }}</a>
                                        </div>
                                    </div>
                                    <ul class="item_marks">
                                        @if($product->pro_discount_price != null)
                                            @php
                                                $benefit =$product->pro_selling_price -
                                                $product->pro_discount_price;
                                                $result = $benefit/$product->pro_selling_price*100;
                                                $percentage=round($result);
                                            @endphp
                                            <li class="item_mark item_discount">-{{ $percentage }}%</li>
                                        @else
                                            <li class="item_mark item_discount">New</li>
                                        @endif
                                    </ul>


                                </div>
                            </div>
                        @endforeach
                        <!-- Product Item -->
                    </div>
                    {{ $products->links() }}
                    <!-- Shop Page Navigation -->

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
                        @foreach($ranproducts as $random)
                            <div
                                class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="viewed_image"><img
                                        src="{{ asset('uploads/admin/product/'.$random->pro_thumbnail) }}"
                                        alt=""></div>
                                <div class="viewed_content text-center">

                                    @if($random->pro_discount_price != null)
                                        <div class="viewed_price">
                                            ${{ $random->pro_discount_price }}<span>${{ $random->pro_selling_price }}</span>
                                        </div>
                                    @else
                                        <div class="viewed_price">${{ $random->pro_selling_price }}</div>
                                    @endif
                                    <div class="viewed_name"><a
                                            href="{{ route('product',$random->pro_slug) }}">{{ $random->pro_title }}</a>
                                    </div>
                                </div>
                                <ul class="item_marks">
                                    @if($random->pro_discount_price != null)
                                        @php
                                            $benefit =$random->pro_selling_price -
                                            $random->pro_discount_price;
                                            $result = $benefit/$random->pro_selling_price*100;
                                            $percentage=round($result);
                                        @endphp
                                        <li class="item_mark item_discount">-{{ $percentage }}%</li>
                                    @else
                                        <li class="item_mark item_discount">New</li>
                                    @endif
                                </ul>
                            </div>
                        @endforeach
                        <!-- Recently Viewed Item -->
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Brands -->



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

@section('category_js')
<script src="{{ asset('contents/frontend') }}/assets/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="{{ asset('contents/frontend') }}/assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.js">
</script>
<script src="{{ asset('contents/frontend') }}/assets/plugins/parallax-js-master/parallax.min.js">
</script>
<script src="{{ asset('contents/frontend') }}/assets/js/shop_custom.js"></script>
@endsection
