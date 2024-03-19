@extends('layouts.admin')
@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">JUYEL</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Brand</a></li>
                        <li class="breadcrumb-item active">Detail :</li>
                    </ol>
                </div>
                <h4 class="page-title">Brand Detail </h4>
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
                                Brand</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="card-header bg-dark">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h3 class="card_header"><i class="fa-solid fa-shirt header_icon"></i>{{$view->brand_title}}
                                        </h3>
                                    </div>
                                    <div class="col-md-2 text-end"><a href="{{route('dashboard.brand')}}"
                                            class="btn btn-sm btn-primary btn_header ">
                                            <i class="fa-brands fa-servicestack btn_icon"></i>All Brand</a>
                                    </div>
                                    <div class="col-md-2"><a href="{{url('dashboard/brand/edit/'.$view->brand_slug)}}" class="btn btn-sm btn-primary btn_header"><i class="uil-edit btn_icon"></i>Edit</a>
                                    </div>
                                </div>
                            </div>

                            <table class="table border view_table">
                                <tr>
                                    <td>Brand Name</td>
                                    <td>:</td>
                                    <td>{{ $view->brand_title }}</td>
                                </tr>
                                <tr>
                                    <td>Brand pic</td>
                                    <td>:</td>
                                    <td>
                                           @if($view->brand_pic != '')
                                            <img src="{{asset('uploads/admin/brands/'.$view->brand_pic)}}" class="img-fluid" alt="" style="width:50%; object-fit:cover;">
                                            @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Brand Creator</td>
                                    <td>:</td>
                                    <td>{{ $view->creator->name }}</td>
                                </tr>
                                <tr>
                                    <td>Brand Editor</td>
                                    <td>:</td>
                                    <td>{{optional($view->editor)->name}}</td>
                                </tr>
                                <tr>
                                    <td>Brand Created At</td>
                                    <td>:</td>
                                    <td>{{$view->created_at->format('D-M-Y | h:m:s A')}}</td>
                                </tr>
                                <tr>
                                    <td>Brand Edited At</td>
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
                    <h2 class="modal_form_title"><i class="mdi mdi-plus-circle me-2"></i> Add Product Brand</h2>
                </div>
                <hr>
                <form class="ps-3 pe-3" action="{{ route('dashboard.brand.store') }}" method="post"
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
                        <label for="username" class="form-label">Product Brand Title<span class="important">*
                                :</span></label>
                        <input class="form-control" type="text" id="username" name="title"
                            value="{{ old('title') }}">

                        @error('title')
                            <strong class="invalid_msg">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="categoryPic" class="form-label">Product Brand Pic<span class="important">*
                                :</span></label>
                        <input class="form-control" type="file" id="categoryPic" name="pic">

                        @error('title')
                            <strong class="invalid_msg">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="term" value="1" id="customCheck1">
                            <label class="form-check-label" for="customCheck1">I accept <a href="#">Terms and
                                    Conditions</a></label>
                        </div>
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
