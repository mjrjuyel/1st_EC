@extends('layouts.admin')
@section('datatable_css')
<link href="{{ asset('contents/admin') }}/assets/css/dataTables.dataTables.min.css"
    rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('contents/admin') }}/assets/css/bootstrap-tagsinput.css" />
<link href="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-bs4.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" />
@endsection
@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">S&G</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Products</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
                <h4 class="page-title">Products</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9 offset-md-1">
                            <div class="card-header bg-dark">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h3 class="card_header"><i class="fa-solid fa-shirt header_icon"></i>
                                        Order Status Change</h3>
                                    </div>
                                    <div class="col-md-4 text-end"><a
                                            href="{{ route('dashboard.order') }}"
                                            class="btn btn-sm btn-primary btn_header ">
                                            <i class="fa-brands fa-servicestack btn_icon"></i>All Order</a>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3">
                                <form class="ps-3 pe-3 "
                                    action="{{ route('dashboard.order.update') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 offset-md-3">
                                            <div class="row">
                                                <input type="hidden" name="id" value="{{ $edit->id }}">
                                                <div class="col-md-12 mb-3">
                                                    <label for="username" class="form-label">Product Name<span
                                                            class="important">*:</span></label>
                                                    <input class="form-control" type="text" id="username" name="name"
                                                        value="{{ $edit->c_name }}" placeholder="Product Name">
                                                    @error('name')
                                                        <strong class="invalid_msg">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="Brands" class="form-label">Order Status<span
                                                            class="important">*:</span></label>
                                                    <select class="form-control" value="{{ $edit->status }}"
                                                        type="text" id="Brands" name="status">
                                                        <option value="">Order Status</option>
                                                        <option class="text-warning" value="0" @if($edit->status == 0) Selected @endif> Pending</option>
                                                        <option class="text-primary" value="1" @if($edit->status == 1) Selected @endif> Received</option>
                                                        <option class="text-success" value="2" @if($edit->status == 2) Selected @endif> Shipped</option>
                                                        <option class="text-success" value="3" @if($edit->status == 3) Selected @endif> Delivered</option>
                                                        <option class="text-warning" value="4" @if($edit->status == 4) Selected @endif> Return </option>
                                                        <option class="text-danger" value="5" @if($edit->status == 5) Selected @endif> Cancle</option>
                                                    </select>
                                                    @error('brand')
                                                        <strong class="invalid_msg">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="mb-3 text-center">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                            </form>
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
@section('datatable_js')
<script>
    $("input").val()

    $(document).ready(function () {
        // Initialize Summernot
        $('#summernote').summernote({
            height: 300, // Customize height (optional)
        });
    });

    $("#subcategpry").change(function () {
        var id = $(this).val();
        //    alert(id)
        $.ajax({
            url: "{{ url('/get-childid/') }}/" + id,
            type: "get",
            success: function (data) {
                $('select[name="childcategory"]').empty();
                $.each(data, function (key, data) {
                    $('select[name="childcategory"]').append('<option value="' + data.id +
                        '">' + data.child_cat_title + '</option>');
                })
            }
        })
    })

</script>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script src="{{ asset('contents/admin') }}/assets/js/bootstrap-tagsinput.min.js"></script>
<script src="{{ asset('contents/admin') }}/assets/js/dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-bs4.min.js"></script>
@endsection
