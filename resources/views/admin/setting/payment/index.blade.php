@extends('layouts.admin')
@section('content')
<div class="container-fluid">
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

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Website</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Setting</a></li>
                        <li class="breadcrumb-item active"></a></li>
                    </ol>
                </div>
                <h4 class="page-title"></h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-header bg-dark">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h3 class="card_header"><i
                                                class="fa-solid fa-money-bill-wave header_icon"></i>Payment GateWay
                                            Option
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-header bg-dark">
                                                    <h4 class="text-primary">{{$amarpay->payment_name}} Method</h4>
                                                </div>
                                                <form class="ps-3 pe-3 border"
                                                    action="{{ route('dashboard.setting.payment_gateway.amarpay-update') }}"
                                                    method="post">
                                                    @csrf
                                                    <div class="row mt-3">
                                                        <div class="col-md-12 mb-3">
                                                            <label for="username" class="form-label">Payment Name<span class="important">*
                                                                    :</span></label>
                                                            <input class="form-control" type="text" id="" value="{{$amarpay->payment_name}}"
                                                                name="name">
                                                            @error('name')
                                                                <strong class="invalid_msg">{{ $message }}</strong>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12 mb-3">
                                                            <label for="username" class="form-label"> 
                                                                Store Id<span class="important">*
                                                                    :</span></label>
                                                            <input class="form-control" type="text" id="" value="{{$amarpay->store_id}}"
                                                                name="storeid">

                                                            @error('storeid')
                                                                <strong class="invalid_msg">{{ $message }}</strong>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12 mb-3">
                                                            <label for="username" class="form-label"> 
                                                                Signature Key<span class="important">*
                                                                    :</span></label>
                                                            <input class="form-control" type="text" id="" value="{{$amarpay->signature_key}}"
                                                                name="sigkey">

                                                            @error('sigkey')
                                                                <strong class="invalid_msg">{{ $message }}</strong>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12 mb-3">
                                                            <label for="username" class="form-label"> 
                                                                Online : </label>
                                                             @if($amarpay->status != 0)
                                                            <input class="" type="checkbox" id="" value="{{$amarpay->status}}" checked name="check">
                                                            @else
                                                            <input class="" type="checkbox" id="" value="{{$amarpay->status}}" name="check">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="id" value="{{$amarpay->id}}">
                                                    <div class="mb-3 text-center">
                                                        <button class="btn btn-primary" type="submit">Upadte</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-header bg-dark">
                                                    <h4 class="text-primary">{{$ssl->payment_name}} Pay Method</h4>
                                                </div>
                                                <form class="ps-3 pe-3 border"
                                                    action="{{ route('dashboard.setting.payment_gateway.ssl-update') }}"
                                                    method="post">
                                                    @csrf
                                                    <div class="row mt-3">
                                                        <div class="col-md-12 mb-3">
                                                            <label for="username" class="form-label">Payment Name<span class="important">*
                                                                    :</span></label>
                                                            <input class="form-control" type="text" id="" value="{{$ssl->payment_name}}"
                                                                name="name">
                                                            @error('name')
                                                                <strong class="invalid_msg">{{ $message }}</strong>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12 mb-3">
                                                            <label for="username" class="form-label"> 
                                                                Store Id<span class="important">*
                                                                    :</span></label>
                                                            <input class="form-control" type="text" id="" value="{{$ssl->store_id}}"
                                                                name="storeid">

                                                            @error('storeid')
                                                                <strong class="invalid_msg">{{ $message }}</strong>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12 mb-3">
                                                            <label for="username" class="form-label"> 
                                                                Signature Key<span class="important">*
                                                                    :</span></label>
                                                            <input class="form-control" type="text" id="" value="{{$ssl->signature_key}}"
                                                                name="sigkey">

                                                            @error('sigkey')
                                                                <strong class="invalid_msg">{{ $message }}</strong>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12 mb-3">
                                                            <label for="username" class="form-label"> 
                                                                Online : </label>
                                                             @if($ssl->status != 0)
                                                            <input class="" type="checkbox" id="" value="{{$ssl->status}}" checked name="check">
                                                            @else
                                                            <input class="" type="checkbox" id="" value="{{$ssl->status}}" name="check">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="id" value="{{$ssl->id}}">
                                                    <div class="mb-3 text-center">
                                                        <button class="btn btn-primary" type="submit">Upadte</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-header bg-dark">
                                                    <h4 class="text-primary">Aamar Pay Method</h4>
                                                </div>
                                                <form class="ps-3 pe-3 border"
                                                    action="{{ route('dashboard.setting.payment_gateway.surjopay-update') }}"
                                                    method="post">
                                                    @csrf
                                                    <div class="row mt-3">
                                                        <div class="col-md-12 mb-3">
                                                            <label for="username" class="form-label">Payment Name<span class="important">*
                                                                    :</span></label>
                                                            <input class="form-control" type="text" id="" value="{{$amarpay->payment_name}}"
                                                                name="name">
                                                            @error('name')
                                                                <strong class="invalid_msg">{{ $message }}</strong>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12 mb-3">
                                                            <label for="username" class="form-label"> 
                                                                Store Id<span class="important">*
                                                                    :</span></label>
                                                            <input class="form-control" type="text" id="" value="{{$amarpay->store_id}}"
                                                                name="storeid">

                                                            @error('storeid')
                                                                <strong class="invalid_msg">{{ $message }}</strong>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12 mb-3">
                                                            <label for="username" class="form-label"> 
                                                                Signature Key<span class="important">*
                                                                    :</span></label>
                                                            <input class="form-control" type="text" id="" value="{{$amarpay->signature_key}}"
                                                                name="sigkey">

                                                            @error('sigkey')
                                                                <strong class="invalid_msg">{{ $message }}</strong>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12 mb-3">
                                                            <label for="username" class="form-label"> 
                                                                Online : </label>
                                                             @if($amarpay->status != 0)
                                                            <input class="" type="checkbox" id="" value="{{$amarpay->status}}" checked name="check">
                                                            @else
                                                            <input class="" type="checkbox" id="" value="{{$amarpay->status}}" name="check">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="id" value="{{$amarpay->id}}">
                                                    <div class="mb-3 text-center">
                                                        <button class="btn btn-primary" type="submit">Upadte</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            
                        </div>

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
@endsection
