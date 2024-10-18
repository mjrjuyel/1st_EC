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
            <div class="col-lg-6">
                <div class="cart_container">
                    <div class="cart_title">Checkout Product</div>
                    <div class="card p-2">
                        <div class="text-center">
                            <h3 class="text-primary">Billing Address</h3>
                        </div>
                        <form action="{{ route('order.place') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="">Name:</label>
                                        <input class="form-control" type="text" name="c_name"
                                            value="{{ Auth::guard('customer')->user()->name }}">
                                        @error('c_name')
                                            <strong class="text-danger pl-2 pt-1">{{ $message }}</strong>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="">Phone:</label>
                                        <input class="form-control" type="text" name="c_phone"
                                            value="{{ old('c_phone') }}" required="required">
                                        @error('c_phone')
                                            <strong class="text-danger pl-2 pt-1">{{ $message }}</strong>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="">Email:</label>
                                        <input class="form-control" type="email" name="c_email"
                                            value="{{ Auth::guard('customer')->user()->email }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="">Country:</label>
                                        <input class="form-control" type="text" name="c_country" value="Bangladesh">
                                    </div>

                                    <div class="form-group">
                                        <label class="">Zip Code:</label>
                                        <input class="form-control" type="text" name="c_zipcode"
                                            value="{{ old('c_zipcode') }}">
                                    </div>

                                    <div class="form-group">
                                        <label class="">Shipping Address:</label>
                                        <input class="form-control" type="text" name="c_address" required="required"
                                            value="{{ old('c_address') }}">
                                        @error('c_address')
                                            <strong class="text-danger pl-2 pt-1">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 ml-5">
                                    <h3 class="text-warning ml-n5">Payment Options :</h3>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="paymentOption"
                                            id="exampleRadios1" value="paypal">
                                        <label class="form-check-label" for="exampleRadios1">
                                            Paypal
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="paymentOption"
                                            id="exampleRadios2" value="DigitalPay">
                                        <label class="form-check-label" for="exampleRadios2">
                                            SSL Commerze
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="paymentOption"
                                            id="exampleRadios3" value="COD">
                                        <label class="form-check-label" for="exampleRadios3">
                                            Cash On Deliver
                                        </label>
                                        @error('paymentOption')
                                        <strong class="text-danger pl-2 pt-1">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="form-group p-2">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Order Total -->

                </div>
            </div>

            <div class="col-lg-6">
                <div class="card px-2 py-3">
                    @if(!Session::has('coupon'))
                        <form action="{{ route('coupon.apply') }}" method="get">
                            <div class="form-group p-2">
                                <div class="form-group">
                                    <label>Coupon:<span class="text-primary btn">*Coupon Will Apply If The Total Price is More Than $500.<span></label>
                                    <input type="text" class="form-control" name="coupon">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info">Apply Coupon</button>
                                </div>
                            </div>
                        </form>
                    @endif
                    <h6 class="text-primary">Order Summary</h6>
                    <div class="order_total_content text-md-right ">
                        @if(Session::has('coupon'))
                            <div class="order_total_title">
                                Coupon:({{ Session::get('coupon')['name'] }})<a
                                    href="{{ route('coupon.remove') }}"><span
                                        class="text-danger px-2"><i class="ri-xrp-line"></i></span></a></div>
                            <div class="order_total_amount">
                                {{ Session::get('coupon')['discount'] }}.00
                            </div>
                        @else
                            <div class="order_total_title">Coupon:</div>
                            <div class="order_total_amount">00.00</div>
                        @endif
                    </div>

                    <div class="order_total_content text-md-right ">
                        <div class="order_total_title">Tax:</div>
                        <div class="order_total_amount">${{ Cart::tax(); }}</div>
                    </div>
                    <div class="order_total_content text-md-right ">
                        <div class="order_total_title">Shipping Charge:</div>
                        <div class="order_total_amount">$00.00</div>
                    </div>

                    <div class="order_total_content text-md-right ">

                        @if(Session::has('coupon') && Session::get('coupon')['after_discount'] >= 500)
                            <div class="order_total_title">Total:</div>
                            <div class="order_total_amount">(${{ Cart::total() }} - ${{Session::get('coupon')['discount']}})</div>
                            <div class="order_total_title">=</div>
                            <div class="order_total_amount">
                                {{ Session::get('coupon')['after_discount'] }}.00
                            </div>
                        @else
                            <div class="order_total_title">Total:</div>
                            <div class="order_total_amount">${{ Cart::total() }}</div>
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
    $('body').on('change', '.qty', function () {
        let qty = $(this).val();
        let rowId = $('#productId').val();
        // alert(rowId);
        $.ajax({
            url: '{{ url('cart/updateqty/') }}/' + rowId + '/' + qty,
            type: 'get',
            async: false,
            success: function (response) {
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

    $('body').on('change', '.size', function () {
        let size = $(this).val();
        let rowId = $('#productId').val();
        // alert(rowId);
        $.ajax({
            url: '{{ url('cart/updatesize/') }}/' + rowId + '/' + size,
            type: 'get',
            async: false,
            success: function (response) {
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

    $('body').on('change', '.color', function () {
        let color = $(this).val();
        let rowId = $('#productId').val();
        // alert(rowId);
        $.ajax({
            url: '{{ url('cart/updatecolor/') }}/' + rowId + '/' + color,
            type: 'get',
            async: false,
            success: function (response) {
                location.reload();
            }
        })
    })
    $('body').on('click', '.destroy', function () {
        $.ajax({
            url: '{{ url('cart/destroy') }}',
            type: 'get',
            success: function (response) {
                location.reload();
            }
        })
    })

</script>
@endsection
