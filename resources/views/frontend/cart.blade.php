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
                    <div class="cart_title">Shopping Cart</div>

                    <div class="cart_items">
                        <ul class="cart_list">
                            @foreach($allcart as $cart)
                                <li class="cart_item clearfix">
                                    <div class="cart_item_image"><img
                                            src="{{ asset('uploads/admin/product/'.$cart->options->thumbnail)}}"
                                            alt=""></div>
                                    <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                        <div class="cart_item_name cart_info_col">
                                            <div class="cart_item_title">Name</div>
                                            <div class="cart_item_text">{{ $cart->name }}</div>
                                        </div>
                                        <div class="cart_item_color cart_info_col">
                                            @php
                                            $product=App\Models\Product::where('id',$cart->id)->first();
                                            $color=explode(',',$product->pro_color);
                                            $size =explode(',',$product->pro_size);
                                            @endphp
                                            <div class="cart_item_title">Color</div>
                                            <div class="cart_item_text">
                                                <select type="text" class="form-control color"
                                                    name="color" style="min-width: 70px;">
                                                    @foreach($color as $color)
                                                    <option value="{{ $color }}" @if($color == $cart->options->color) Selected @endif>
                                                        {{ substr($color,0,5) }}</option>
                                                    @endforeach
                                                </select></div>
                                        </div>
                                        <div class="cart_item_color cart_info_col">
                                            <div class="cart_item_title">size</div>
                                            <div class="cart_item_text">
                                                <select type="number" class="form-control size"
                                                    name="size" style="width:100px;">
                                                    @foreach($size as $size)
                                                    <option value="{{ $size }}" @if($size == $cart->options->size) Selected @endif>
                                                        {{ $size }}</option>
                                                    @endforeach
                                                </select></div>
                                        </div>
                                        <div class="cart_item_quantity cart_info_col">
                                            <div class="cart_item_title">Quantity</div>
                                            <div class="cart_item_text">
												<input type="number" class="form-control qty" name="quantity" style="width:100px;" value="{{ $cart->qty }}"
                                                    min="1" max="100">
												<input type="hidden" name="id" value="{{$cart->rowId}}" id="productId">
												</div>
                                        </div>
                                        <div class="cart_item_price cart_info_col">
                                            <div class="cart_item_title">Price</div>
                                            <div class="cart_item_text">${{ $cart->price }}</div>
                                        </div>
                                        <div class="cart_item_total cart_info_col">
                                            <div class="cart_item_title">Total</div>
                                            <div class="cart_item_text">
                                                ${{ number_format($cart->price*$cart->qty,2) }}</div>
                                        </div>
                                        <div class="cart_item_total cart_info_col">
                                            <div class="cart_item_title">Action</div>
                                            <div class="cart_item_text"><a
                                                    href="{{ route('cart.remove',$cart->rowId) }}"
                                                    class="text-danger"><i class="ri-xrp-fill"></i></a></div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>


                    <!-- Order Total -->
                    <div class="order_total">
                        <div class="order_total_content text-md-right">
                            <div class="order_total_title">Order Total:</div>
                            <div class="order_total_amount">${{Cart::total();}}</div>
                        </div>
                    </div>

                    <div class="cart_buttons">
                        <button type="button" class="button cart_button_clear destroy">Remove all</button>
                        @if(Cart::subtotal() > 0)
                        <a href="{{route('checkout')}}" type="button" class="button cart_button_checkout">CheckOut</a>
                        @else
                        <a href="#" type="button" class="button cart_button_checkout" >Nothing</a>
                        @endif
                    </div>
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

@section('cart_js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
	$('body').on('change','.qty',function(){
		let qty= $(this).val();
		let rowId = $('#productId').val();
		// alert(rowId);
		$.ajax({
            url:'{{url('cart/updateqty/')}}/'+ rowId +'/'+qty,
            type:'get',
            async: false,
            success:function(response){
                Swal.fire({
                        icon: 'success',
                        title: 'Updated!',
                        text: 'Cart updated successfully!',
                        showConfirmButton: true,
                        timer: 1500 // Automatically close after 1.5 seconds
                    });
                location.reload();
            }
        });
	});

    $('body').on('change','.size',function(){
		let size= $(this).val();
		let rowId = $('#productId').val();
		// alert(rowId);
		$.ajax({
            url:'{{url('cart/updatesize/')}}/'+ rowId +'/'+size,
            type:'get',
            async: false,
            success:function(response){
                Swal.fire({
                        icon: 'success',
                        title: 'Updated!',
                        text: 'Cart updated successfully!',
                        showConfirmButton: true,
                        timer: 1500 // Automatically close after 1.5 seconds
                    });
                location.reload();
            }
        });
	});

    $('body').on('change','.color',function(){
        let color = $(this).val();
        let rowId = $('#productId').val();
        // alert(rowId);
        $.ajax({
            url:'{{url('cart/updatecolor/')}}/'+rowId+'/'+color,
            type:'get',
            async:false,
            success:function(response){
                location.reload();
            }
        })
    })
    $('body').on('click','.destroy',function(){
        $.ajax({
            url:'{{url('cart/destroy')}}',
            type:'get',
            success:function(response){
                location.reload();
            }
        })
    })
</script>
@endsection
