@extends('layouts.home')
@section('cart_css')
<link rel="stylesheet" type="text/css"
    href="{{ asset('contents/frontend') }}/assets/styles/cart_styles.css">
<link rel="stylesheet" type="text/css"
    href="{{ asset('contents/frontend') }}/assets/styles/cart_responsive.css">
@endsection
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
<div class="cart_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cart_container">
                    <div class="cart_title">WishList Item</div>

                    <div class="cart_items">
                        <ul class="cart_list">
                            @foreach($wishlist as $cart)
                                <li class="cart_item clearfix">
                                    <div class="cart_item_image"><img
                                            src="{{ asset('uploads/admin/product/'.$cart->product->pro_thumbnail)}}"
                                            alt=""></div>
                                    <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                        <div class="cart_item_name cart_info_col">
                                            <div class="cart_item_title">Name</div>
                                            <div class="cart_item_text">{{ $cart->product->pro_title }}</div>
                                        </div>
                                        
                                        <div class="cart_item_color cart_info_col">
                                            <div class="cart_item_title">size</div>
                                            <div class="cart_item_text">...</div>
                                        </div>
                                        <div class="cart_item_quantity cart_info_col">
                                            <div class="cart_item_title">Quantity</div>
                                            <div class="cart_item_text">
												1
												</div>
                                        </div>
                                        <div class="cart_item_price cart_info_col">
                                            <div class="cart_item_title">Price</div>
                                            <div class="cart_item_text">${{ $cart->product->pro_price }}</div>
                                        </div>

                                        <div class="cart_item_price cart_info_col">
                                            <div class="cart_item_title">View</div>
                                            <div class="cart_item_text">
                                                <a href="{{route('product',$cart->product->pro_slug)}}" class="button cart_button_checkout">View</a></div>
                                        </div>
                                        <div class="cart_item_price cart_info_col">
                                            <div class="cart_item_title">Remove</div>
                                            <div class="cart_item_text">
                                                <a href="{{route('remove.wishlist',$cart->id)}}" class="button cart_button_checkout text-warning"><i class="ri-xrp-fill"></i></a></div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="cart_buttons">
                        <a href="{{route('delete.wishlist')}}" class="button cart_button_clear destroy">Remove all</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
