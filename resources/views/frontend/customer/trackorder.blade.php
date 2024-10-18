@extends('layouts.home')
@section('cart_css')
<link rel="stylesheet" type="text/css"
    href="{{ asset('contents/frontend') }}/assets/styles/cart_styles.css">
<link rel="stylesheet" type="text/css"
    href="{{ asset('contents/frontend') }}/assets/styles/cart_responsive.css">
@endsection
@section('content')
@if(Session::has('muted'))
    <script type="text/javascript">
        swal({
            title: "Success!",
            text: "{{ Session::get('muted') }}",
            icon: "muted",
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
            <div class="col-lg-4">
                <div class="cart_container">
                    <div class="card p-2">
                        <div class=" card-header text-center">
                            <h3 class="text-primary">Order Tracking No({{ $order->order_id }})</h3>
                        </div>

                        <div class="row">
                            <div class="card-body">
                                <h4 class="mb-0">{{ $order->C_name }}</h4>

                                <!-- <button type="button" class="btn btn-muted btn-sm mb-2">Follow</button>
                                <button type="button" class="btn btn-danger btn-sm mb-2">Message</button> -->

                                <div class="text-start mt-3">
                                    <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span
                                            class="ms-2"> {{ $order->c_name }}</span></p>

                                    <p class="text-muted mb-2 font-13"><strong>Email :</strong><span
                                            class="ms-2"> {{ $order->c_email }}</span></p>
                                    <p class="text-muted mb-2 font-13"><strong>Order Date :</strong><span
                                            class="ms-2"> {{ date('D-M-Y'),strtotime($order->date) }}</span>
                                    </p>

                                    <p class="text-muted mb-2 font-13"><strong>Order Status: </strong>
                                        @if($order->status == 0)
                                            <span class="badge badge-danger"> Order pending</span>
                                        @elseif($order->status == 1)
                                            <span class="badge badge-primary"> Order Received</span>
                                        @elseif($order->status == 2)
                                            <span class="badge badge-primary"> Order Shipped</span>
                                        @elseif($order->status == 3)
                                            <span class="badge badge-primary"> Order Delivered</span>
                                        @elseif($order->status == 4)
                                            <span class="badge badge-danger"> Order Return</span>
                                        @elseif(($order->status == 5))
                                            <span class="badge badge-danger"> Order Cancled</span>
                                        @endif
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Order Total -->
                </div>
            </div>

            <div class="col-lg-8 mt-5">
                <div class="card">
                    <div class="card-header">
                        Order Detail
                    </div>

                    <div class="card-body">
                        <table class="table mt-3 text-center border">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Product Quantity</th>
                                    <th scope="col">Total Price</th>
                                </tr>
                            </thead>
                            <tbody class="mt-2">
                                @if($order_detail->count() > 0)
                                    @foreach($order_detail as $order)
                                        <tr>
                                            <th>{{ $order->product_name }}</th>
                                            <td>{{ $order->product_qty }} </td>
                                            <td>${{ $order->product_subtotal }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="text-waring">No Order pLaced Yet!</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <hr>
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
                muted: function (response) {
                    Swal.fire({
                        icon: 'muted',
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
                muted: function (response) {
                    Swal.fire({
                        icon: 'muted',
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
                muted: function (response) {
                    location.reload();
                }
            })
        })
        $('body').on('click', '.destroy', function () {
            $.ajax({
                url: '{{ url('cart/destroy') }}',
                type: 'get',
                muted: function (response) {
                    location.reload();
                }
            })
        })

    </script>
    @endsection
