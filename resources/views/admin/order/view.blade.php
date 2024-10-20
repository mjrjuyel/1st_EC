@extends('layouts.admin')
@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Order</a></li>
                        <li class="breadcrumb-item active">Details :</li>
                    </ol>
                </div>
                <h4 class="page-title">Oder Detail </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-5">
                            <div class="card-header bg-dark">
                                <div class="row">
                                    <div class="col-md-7">
                                        <h3 class="card_header"><i
                                                class="fa-solid fa-shirt header_icon"></i>{{ $view->order_id }}
                                        </h3>
                                    </div>
                                    <div class="col-md-3 text-end"><a
                                            href="{{ route('dashboard.order') }}"
                                            class="btn btn-sm btn-primary btn_header ">
                                            <i class="fa-brands fa-servicestack btn_icon"></i>All Oder</a>
                                    </div>
                                    <div class="col-md-2"><a
                                            href="{{ url('dashboard/order/edit/'.$view->id) }}"
                                            class="btn btn-sm btn-primary btn_header"><i
                                                class="uil-edit btn_icon"></i>Edit</a>
                                    </div>
                                </div>
                            </div>

                            <table class="table border view_table">
                                <tr>
                                    <td>Oder Id</td>
                                    <td>:</td>
                                    <td>{{ $view->order_id }}</td>
                                </tr>

                                <tr>
                                    <td> Order Status</td>
                                    <td>:</td>
                                    <td>
                                        @if($view->status == 0)
                                            <span class="btn btn-danger">Pending</span>

                                        @elseif($view->status == 1)
                                            <span class="btn btn-success">Received</span>

                                        @elseif($view->status == 2)
                                            <span class="btn btn-primary">Shipped</span>

                                        @elseif($view->status == 3)
                                            <span class="btn btn-success">Delevered</span>

                                        @elseif($view->status == 4)
                                            <span class="btn btn-warning">Return</span>

                                        @elseif($view->status == 5)
                                            <span class="btn btn-danger">Cancle</span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>Customer Name</td>
                                    <td>:</td>
                                    <td>{{ $view->c_name }}</td>
                                </tr>

                                <tr>
                                    <td>Customer Phone</td>
                                    <td>:</td>
                                    <td>{{ $view->c_phone }}</td>
                                </tr>

                                <tr>
                                    <td>Customer Email</td>
                                    <td>:</td>
                                    <td>{{ $view->c_email }}</td>
                                </tr>

                                <tr>
                                    <td>Customer Country</td>
                                    <td>:</td>
                                    <td>{{ $view->c_email }}</td>
                                </tr>

                                <tr>
                                    <td>Customer Zipcode</td>
                                    <td>:</td>
                                    <td>{{ $view->c_email }}</td>
                                </tr>

                                <tr>
                                    <td>Customer Address</td>
                                    <td>:</td>
                                    <td>{{ $view->c_email }}</td>
                                </tr>

                                @if($view->coupon_code != '')
                                    <tr>
                                        <td>Order Coupon Code</td>
                                        <td>:</td>
                                        <td>{{ $view->coupon_code }}</td>
                                    </tr>

                                    <tr>
                                        <td> Coupon Discount</td>
                                        <td>:</td>
                                        <td>${{ $view->coupon_discount }}</td>
                                    </tr>

                                    <tr>
                                        <td>After Discount</td>
                                        <td>:</td>
                                        <td>${{ $view->coupon_after_discount }}</td>
                                    </tr>
                                @endif

                                <tr>
                                    <td> Tax</td>
                                    <td>:</td>
                                    <td>${{ $view->tax }}</td>
                                </tr>

                                <tr>
                                    <td> Shipping Charge</td>
                                    <td>:</td>
                                    <td>${{ $view->shipping_charge }}</td>
                                </tr>

                                <tr>
                                    <td> Subtotal</td>
                                    <td>:</td>
                                    <td>${{ $view->subtotal }}</td>
                                </tr>

                                <tr>
                                    <td> Total</td>
                                    <td>:</td>
                                    <td>${{ $view->total }}</td>
                                </tr>



                                <tr>
                                    <td>Oder Date</td>
                                    <td>:</td>
                                    <td>{{ date('d,M,Y'),strtotime($view->date) }}</td>
                                </tr>

                                <tr>
                                    <td>Oder Edited At</td>
                                    <td>:</td>
                                    <td>{{ optional($view->updated_at)->format('D-M-Y | h:m:s A') }}
                                    </td>
                                </tr>
                            </table>

                        </div>

                        <div class="col-md-7">
                            <div class="card-header bg-dark">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h3 class="card_header"><i
                                                class="fa-solid fa-shirt header_icon"></i>{{ $view->order_id }}
                                        </h3>
                                    </div>
                                    <div class="col-md-3 text-end"><a
                                            href="{{ route('dashboard.order') }}"
                                            class="btn btn-sm btn-primary btn_header ">
                                            <i class="fa-brands fa-servicestack btn_icon"></i>Order Detail</a>
                                    </div>
                                </div>
                            </div>

                            <table class="table table-centered text-center ytable" id="">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">Product Image</th>
                                        <th class="text-center">Product Name</th>
                                        <th class="text-center">Color</th>
                                        <th class="text-center">Size</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Total</th>
                                    </tr>
                                </thead>
                                @php
                                    $total= 0;
                                @endphp
                                <tbody>
                                    @foreach($view->orderDetail as $detail)
                                        <tr>
                                            <td>
                                                @if($detail->product->pro_thumbnail != '')
                                                    <img src="{{ asset('uploads/admin/product/'.$detail->product->pro_thumbnail) }}"
                                                        class="img-fluid" alt="" style="width:200px; object-fit:cover;">
                                                @endif
                                            </td>
                                            <td>{{ $detail->product_name }}</td>
                                            <td>{{ $detail->product_color }}</td>
                                            <td>{{ $detail->product_size }}</td>
                                            <td>{{ $detail->product_qty }}</td>
                                            <td>${{ $detail->product_price }}</td>
                                            <td>${{ $detail->product_subtotal }}</td>
                                        </tr>
                                        @php
                                            $total += $detail->product_subtotal;
                                        @endphp
                                    @endforeach
                                <tfoot>
                                    <tr>
                                        <td colspan="6" class="text-right"><strong>Total Price:</strong></td>
                                        <td><strong>${{ $total }} |-</strong></td>
                                    </tr>
                                </tfoot>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<!-- end row -->
</div> <!-- container -->
</div> <!-- content -->
@endsection
