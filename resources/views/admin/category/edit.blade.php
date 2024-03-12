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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Category</a></li>
                        <li class="breadcrumb-item active">Edit :</li>
                    </ol>
                </div>
                <h4 class="page-title">Category Edit </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="card-header bg-dark">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h3 class="card_header"><i class="fa-solid fa-shirt header_icon"></i>
                                        </h3>
                                    </div>
                                    <div class="col-md-2 text-end"><a
                                            href="{{ route('dashboard.category') }}"
                                            class="btn btn-sm btn-primary btn_header ">
                                            <i class="fa-brands fa-servicestack btn_icon"></i>All Category</a>
                                    </div>
                                    <div class="col-md-2"><a
                                            href="{{ url('dashboard/category/view/'.$edit->cat_slug) }}"
                                            class="btn btn-sm btn-primary btn_header">
                                            <i class="uil-edit btn_icon"></i>View</a>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3">
                                <form class="ps-3 pe-3"
                                    action="{{ route('dashboard.category.update') }}" method="post"
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
                                    <input type="hidden" name="id" value="{{$edit->id}}">
                                    <input type="hidden" name="slug" value="{{$edit->cat_slug}}">
                                    <div class="row">
                                        <div class="col-md-6 offset-md-2 mb-3">
                                            <label for="username" class="form-label">Product Category Title<span
                                                    class="important">*
                                                    :</span></label>
                                            <input class="form-control" type="text" id="username" value="{{$edit->cat_title}}" name="title"
                                                value="{{ old('title') }}">

                                            @error('title')
                                                <strong class="invalid_msg">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 offset-md-2 mb-3">
                                            <label for="categoryPic" class="form-label">Product Category Pic<span
                                                    class="important">*
                                                    :</span></label>
                                            <input class="form-control" type="file" id="categoryPic" value="" name="pic">

                                            @error('title')
                                                <strong class="invalid_msg">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            @if($edit->cat_pic != '')
                                            <img src="{{asset('uploads/admin/category/'.$edit->cat_pic)}}" class="img-fluid" alt="" style="width:100%; object-fit:cover;">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-3 text-center">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </form>
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
