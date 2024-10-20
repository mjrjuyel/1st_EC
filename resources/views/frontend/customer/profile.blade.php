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
            <div class="col-lg-4">
                <div class="cart_container">
                    <div class="card p-2">
                        <div class=" card-header text-center">
                            <h3 class="text-primary">Welcome, {{ $customer->name }}</h3>
                        </div>

                        <div class="row mt-3">
                            <div class="card-body">
                                <img src="{{ asset('contents/admin') }}/assets/images/users/avatar-1.jpg"
                                    class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                <h4 class="mb-0 mt-2">{{ $customer->name }}</h4>
                                <p class="text-success font-14">Founder</p>

                                <!-- <button type="button" class="btn btn-success btn-sm mb-2">Follow</button>
                                <button type="button" class="btn btn-danger btn-sm mb-2">Message</button> -->

                                <div class="text-start mt-3">
                                    <p class="text-success mb-2 font-13"><strong>Full Name :</strong> <span
                                            class="ms-2">Geneva
                                            D. McKnight</span></p>

                                    <p class="text-success mb-2 font-13"><strong>Email :</strong><span
                                            class="ms-2">{{ $customer->email }}</span></p>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="list-group" id="list-tab" role="tablist">
                                            <a class="list-group-item list-group-item-action active" id="list-home-list"
                                                data-toggle="list" href="#list-home" role="tab" aria-controls="home"><i
                                                    class="ri-home-8-line"></i> Dashboard</a>
                                            <a class="list-group-item list-group-item-action"
                                                href="{{ route('wishlist') }}">
                                                <i class="ri-heart-line"></i> WishList</a>
                                            <a class="list-group-item list-group-item-action"
                                                href="{{ route('allcart') }}">
                                                <i class="ri-shopping-cart-2-line"></i></i> Cart</a>
                                            <a class="list-group-item list-group-item-action" id="my-order-list"
                                                data-toggle="list" href="#my-order" role="tab"
                                                aria-controls="messages"><i class="ri-shopping-bag-2-line"></i> My
                                                Order</a>
                                            <a class="list-group-item list-group-item-action" id="order-track-list"
                                                data-toggle="list" href="#order-track" role="tab"
                                                aria-controls="messages"><i class="ri-shopping-bag-2-line"></i> Order
                                                Track</a>
                                            <!-- <a class="list-group-item list-group-item-action" id="list-settings-list"
                                                data-toggle="list" href="#list-settings" role="tab"
                                                aria-controls="settings"><i class="ri-settings-2-line"></i> Settings</a> -->
                                            <a href="{{ route('customer.logout') }}"
                                                class="list-group-item list-group-item-action text-danger"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="ri-logout-circle-line"></i> Logout
                                            </a>
                                            <form id="logout-form"
                                                action="{{ route('customer.logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Order Total -->
                </div>
            </div>

            <div class="col-lg-8 mt-5">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-home" role="tabpanel"
                        aria-labelledby="list-home-list">
                        <div class="card px-2 py-3">
                            <div class="card-header bg-primary">
                                Dashboard
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="ri-shopping-bag-2-line widget-icon"
                                                        style="font-size:24px;"></i>
                                                </div>
                                                <h5 class="text-success fw-normal mt-0 text-"
                                                    title="Number of Customers">
                                                    My Order</h5>
                                                <h3 class="mt-3 mb-3">{{ $order->count() }}</h3>
                                            </div> <!-- end card-body-->
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="ri-checkbox-line widget-icon" style="font-size:24px;"></i>
                                                </div>
                                                <h5 class="text-success fw-normal mt-0" title="Number of Customers">
                                                    Order Delivered</h5>
                                                <h3 class="mt-3 mb-3">{{ $complete->count() }}</h3>
                                            </div> <!-- end card-body-->
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="ri-arrow-go-back-line widget-icon"
                                                        style="font-size:24px;"></i>
                                                </div>
                                                <h5 class=" fw-normal mt-0 text-danger" title="Number of Customers">
                                                    Order Return</h5>
                                                <h3 class="mt-3 mb-3">{{ $return->count() }}</h3>
                                            </div> <!-- end card-body-->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="ri-close-circle-fill widget-icon"
                                                        style="font-size:24px;"></i>
                                                </div>
                                                <h5 class=" fw-normal mt-0 text-warning" title="Number of Customers">
                                                    Order Cancle</h5>
                                                <h3 class="mt-3 mb-3">{{ $cancle->count() }}</h3>
                                            </div> <!-- end card-body-->
                                        </div>
                                    </div>
                                </div>

                                <h2 class=" text-primary pt-2">Order:</h2>
                                <table class="table mt-3">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">Order Id</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="mt-2">
                                        @if($order->count() > 0)
                                            @foreach($order as $order)
                                                <tr>
                                                    <th>{{ $order->order_id }}</th>
                                                    <td>{{ date('d,M,Y'),strtotime($order->date) }}
                                                    </td>
                                                    <td>${{ $order->total }}</td>
                                                    @if($order->status == 0)
                                                        <td class="badge badge-danger">Order pending</td>
                                                    @elseif($order->status == 1)
                                                        <td class="badge badge-primary">Order Received</td>
                                                    @elseif($order->status == 2)
                                                        <td class="badge badge-primary">Order Shipped</td>
                                                    @elseif($order->status == 3)
                                                        <td class="badge badge-primary">Order Delivered</td>
                                                    @elseif($order->status == 4)
                                                        <td class="badge badge-danger">Order Return</td>
                                                    @elseif(($order->status == 5))
                                                        <td class="badge badge-danger">Order Cancled</td>
                                                    @endif
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
                    <div class="tab-pane fade" id="my-order" role="tabpanel" aria-labelledby="my-order-list">
                        <div class="card px-2 py-3">
                            <div class="card-header bg-primary">
                                My Order
                            </div>
                            <div class="card-body">
                                <h2 class=" text-primary pt-2">Order:</h2>
                                <table class="table mt-3 text-center">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">Order Id</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">payment Option</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="mt-2">
                                        @if($orders->count() > 0)
                                            @foreach($orders as $order)
                                                <tr>
                                                    <th>{{ $order->order_id }}</th>
                                                    <td>{{ date('d,M,Y'),strtotime($order->date) }}
                                                    </td>
                                                    <td>{{ $order->total }}</td>
                                                    <td>{{ $order->payment_type }}</td>

                                                    @if($order->status == 0)
                                                        <td class="badge badge-danger mt-3">Order pending</td>
                                                    @elseif($order->status == 1)
                                                        <td class="badge badge-primary mt-3">Order Received</td>
                                                    @elseif($order->status == 2)
                                                        <td class="badge badge-primary mt-3">Order Shipped</td>
                                                    @elseif($order->status == 3)
                                                        <td class="badge badge-primary mt-3">Order Delivered</td>
                                                    @elseif($order->status == 4)
                                                        <td class="badge badge-danger mt-3">Order Return</td>
                                                    @else
                                                        <td class="badge badge-danger mt-3">Order Cancled</td>
                                                    @endif

                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <button type="button"
                                                                class="btn btn-secondary dropdown-toggle"
                                                                data-toggle="dropdown" aria-expanded="false">
                                                                Dropdown
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item text-warning"
                                                                    href="#">Return</a>
                                                                <a class="dropdown-item text-danger" href="#">Cancle</a>
                                                            </div>
                                                        </div>
                                                    </td>
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
                    <!-- === order Tracking Form -->
                    <div class="tab-pane fade" id="order-track" role="tabpanel" aria-labelledby="order-track-list">
                        <div class="card px-2 py-3">
                            <div class="card-header bg-primary">
                                Track Order:
                            </div>
                            <div class="card-body pt-5">
                                <form action="{{route('order.track')}}" method="get">
                                    @csrf
                                    <div class="form-group">
                                        <label class="">Order id:</label>
                                        <input type="text" class="form-control" name="order_id" placeholder="ex: 09878">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-info">Track Product</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                        <div class="card px-2 py-3">
                            <div class="card-header bg-primary">
                                Setting
                            </div>
                        </div>
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
