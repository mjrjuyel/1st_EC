@extends('layouts.admin')
@section('datatable_css')
<link href="{{ asset('contents/admin') }}/assets/css/dataTables.dataTables.min.css"
    rel="stylesheet" />
@endsection
@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                        <li class="breadcrumb-item active">Brands</li>
                    </ol>
                </div>
                <h4 class="page-title">Brands</h4>
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
                    <div class="row mb-2">
                        <div class="col-sm-5">
                            <a href="#" class="btn btn-primary mb-2" data-bs-toggle="modal"
                                data-bs-target="#staticStoreModal"><i class="mdi mdi-plus-circle me-2"></i> Add
                                Brand</a>
                        </div>
                        <div class="col-sm-7">
                            <div class="text-sm-end">
                                <button type="button" class="btn btn-success mb-2 me-1"><i
                                        class="mdi mdi-cog-outline"></i></button>
                                <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                                <button type="button" class="btn btn-light mb-2">Export</button>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="">
                        <input type="checkbox" class="form-check-input " id="">
                        <table class="table table-centered text-center ytable" id="">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">Brand</th>
                                    <th class="text-center">Brand Pic</th>
                                    <th class="text-center">Brand Creator</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
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

                        @error('pic')
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

<!-- Soft Delete Modal  -->
<div id="Delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="{{ url('/dashboard/brand/delete') }}" enctype="multipart/form-data">
           @csrf
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-warning">
                    <h4 class="modal-title" id="primary-header-modalLabel">Product Brand</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body modal_body">
                    Are You Sure want to permanant Delete?
                    <input type="text" name="modal_id" id="modal_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('datatable_js')
<script>
    $(function(){
        $('.ytable').DataTable({
            prosessing: true,
            serverSide: true,
            ordering: false,
            ajax: "{{ route('dashboard.brand') }}",
            columns: [
                {
                    data: 'brand_title',
                    name: 'brand_title'
                },
                {
                    data: 'brand_pic',
                    name: 'brand_pic',
                    render: function(data,type,full,meta){
                        return '<img src="{{asset('uploads/admin/brands')}}/' + data + '"Width="200px" style="object-fit:cover;" alt="">';
                    }
                },
                {
                    data: 'brand_creator',
                    name: 'brand_creator'
                },
                {
                    data: 'action',
                    name: 'action',
                    serachable:true,
                    orderable:true,
                   
                },
                
            ]
        });
    })
</script>
<script src="{{ asset('contents/admin') }}/assets/js/dataTables.min.js"></script>
@endsection
