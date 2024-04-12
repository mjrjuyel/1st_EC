@extends('layouts.admin')
@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">E-Commerce</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Coupon</a></li>
                        <li class="breadcrumb-item active">Detail :</li>
                    </ol>
                </div>
                <h4 class="page-title">Coupon Detail </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-5">
                            <a href="#" class="btn btn-primary mb-2" data-bs-toggle="modal"
                                data-bs-target="#staticStoreModal"><i class="mdi mdi-plus-circle me-2"></i> Add
                                Coupon</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="card-header bg-dark">
                                <div class="row">
                                    <div class="col-md-7">
                                        <h3 class="card_header"><i class="fa-solid fa-warehouse header_icon"></i>{{$view->coupon_name}}
                                        </h3>
                                    </div>
                                    <div class="col-md-3 text-end"><a href="{{route('dashboard.warehouse')}}"
                                            class="btn btn-sm btn-primary btn_header ">
                                            <i class="fa-brands fa-servicestack btn_icon"></i>All Coupon</a>
                                    </div>
                                    <div class="col-md-2"><a href="{{url('dashboard/warehouse/edit/'.$view->coupon_slug)}}" class="btn btn-sm btn-primary btn_header"><i class="uil-edit btn_icon"></i>Edit</a>
                                    </div>
                                </div>
                            </div>

                            <table class="table border view_table">
                                <tr>
                                    <td>Coupon Code</td>
                                    <td>:</td>
                                    <td>{{ $view->coupon_code }}</td>
                                </tr>
                                <tr>
                                    <td>Coupon Valid Date</td>
                                    <td>:</td>
                                    <td>{{ $view->valid_date }}</td>
                                </tr>
                                <tr>
                                    <td>Coupon Amount</td>
                                    <td>:</td>
                                    <td>{{ $view->coupon_amount }}</td>
                                </tr>
                                <tr>
                                    <td>Coupon Type</td>
                                    <td>:</td>
                                    <td>{{ $view->coupon_type }}</td>
                                </tr>
                                <tr>
                                    <td>Coupon Created At</td>
                                    <td>:</td>
                                    <td>{{$view->created_at->format('D-M-Y | h:m:s A')}}</td>
                                </tr>
                                <tr>
                                    <td>Coupon Edited At</td>
                                    <td>:</td>
                                    <td>{{optional($view->updated_at)->format('D-M-Y | h:m:s A')}}</td>
                                </tr>
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

<!-- ====================== Add Modal Section  -->
<div id="staticStoreModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <h2 class="modal_form_title"><i class="mdi mdi-plus-circle me-2"></i> Add Product WareHouse</h2>
                </div>
                <hr>
                <form class="ps-3 pe-3" action="{{ route('dashboard.warehouse.store') }}" method="post"
                    enctype="multipart/form-data">
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
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Product WareHouse Name<span class="important">*
                                :</span></label>
                        <input class="form-control" type="text" name="title"
                            value="{{ old('title') }}">
                        @error('title')
                            <strong class="invalid_msg">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Product WareHouse Address<span class="important">*
                                :</span></label>
                        <input class="form-control" type="text" i name="address">

                        @error('address')
                            <strong class="invalid_msg">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label"> WareHouse Contact Number<span class="important">*
                                :</span></label>
                        <input class="form-control" type="text" i name="phone">

                        @error('phone')
                            <strong class="invalid_msg">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3 text-center">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection
