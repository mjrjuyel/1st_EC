@extends('layouts.admin')
@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Sub Category</a></li>
                        <li class="breadcrumb-item active">Detail :</li>
                    </ol>
                </div>
                <h4 class="page-title">Sub Category Detail </h4>
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
                                Sub Category</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="card-header bg-dark">
                                <div class="row">
                                    <div class="col-md-7">
                                        <h3 class="card_header"><i
                                                class="fa-solid fa-shirt header_icon"></i>{{ $view->subcat_title }}
                                        </h3>
                                    </div>
                                    <div class="col-md-3 text-end"><a
                                            href="{{ route('dashboard.subcategory') }}"
                                            class="btn btn-sm btn-primary btn_header ">
                                            <i class="fa-brands fa-servicestack btn_icon"></i>All Sub Category</a>
                                    </div>
                                    <div class="col-md-2"><a
                                            href="{{ url('dashboard/subcategory/edit/'.$view->subcat_slug) }}"
                                            class="btn btn-sm btn-primary btn_header"><i
                                                class="uil-edit btn_icon"></i>Edit</a>
                                    </div>
                                </div>
                            </div>

                            <table class="table border view_table">
                                <tr>
                                    <td>Sub Category Name</td>
                                    <td>:</td>
                                    <td>{{ $view->subcat_title }}</td>
                                </tr>
                                <tr>
                                    <td>Category Belongs</td>
                                    <td>:</td>
                                    <td class="text-primary">{{ $view->category->cat_title }}</td>
                                </tr>
                                <tr>
                                    <td>Sub Category Creator</td>
                                    <td>:</td>
                                    <td>{{ $view->creator->name }}</td>
                                </tr>
                                <tr>
                                    <td>Sub Category Editor</td>
                                    <td>:</td>
                                    <td>{{ optional($view->editor)->name }}</td>
                                </tr>
                                <tr>
                                    <td>Sub Category Created At</td>
                                    <td>:</td>
                                    <td>{{ $view->created_at->format('D-M-Y | h:m:s A') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sub Category Edited At</td>
                                    <td>:</td>
                                    <td>{{ optional($view->updated_at)->format('D-M-Y | h:m:s A') }}
                                    </td>
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
                    <h2 class="modal_form_title"><i class="mdi mdi-plus-circle me-2"></i> Add Product Sub Category</h2>
                </div>
                <hr>
                <form class="ps-3 pe-3" action="{{ route('dashboard.subcategory.store') }}"
                    method="post" enctype="multipart/form-data">
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
                        <label for="" class="form-label">Product SubCategory Title<span class="important">*
                                :</span></label>
                        <input class="form-control" type="text" name="title"
                            value="{{ old('title') }}">

                        @error('title')
                            <strong class="invalid_msg">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Product Category</label>
                        <select class="form-control form_control" name="cat">
                            <option value="">Select Category</option>
                            @foreach($cat as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->cat_title }}</option>
                            @endforeach
                        </select>
                        @error('title')
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
