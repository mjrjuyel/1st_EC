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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Products</li>
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
                    <div class="row mb-2">
                        <div class="col-sm-5">
                            <a href="#" class="btn btn-primary mb-2" data-bs-toggle="modal"
                                data-bs-target="#staticStoreModal"><i class="mdi mdi-plus-circle me-2"></i> Add
                                Product</a>
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
                        <table class="table table-centered text-center ytable" id="">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">Product Thumbnail</th>
                                    <th class="text-center">Product Name</th>
                                    <th class="text-center">Product Code</th>
                                    <th class="text-center">Category</th>
                                    <th class="text-center">CSub Category</th>
                                    <th class="text-center">Barnd</th>
                                    <th class="text-center">Featured</th>
                                    <th class="text-center">Today Deal</th>
                                    <th class="text-center">Status</th>
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


<!-- Soft Delete Modal  -->
<div id="softDelete_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('dashboard.product.softdel')}}" method="post">
        @csrf
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-warning">
                <h4 class="modal-title" id="primary-header-modalLabel">Product Product</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body modal_body">
                Are You Sure want to Delete?
                <input type="hidden" name="modal_id" id="modal_id">
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
    $(function () {
        $('.ytable').DataTable({
            prosessing: true,
            serverSide: true,
            ordering: false,
            ajax: "{{ route('dashboard.product') }}",
            columns: [{
                    data: 'pro_thumbnail',
                    name: 'pro_thumbnail',
                    render: function (data, type, full, meta) {
                        return '<img src="{{ asset('uploads/admin/product') }}/' +
                            data + '"Width="100px" style="object-fit:cover;" alt="">';
                    }
                },
                {
                    data: 'pro_title',
                    name: 'pro_title'
                },
                {
                    data: 'pro_code',
                    name: 'pro_code'
                },
                {
                    data: 'cat_title',
                    name: 'cat_title'
                },
                {
                    data: 'subcat_title',
                    name: 'subcat_title'
                },

                {
                    data: 'brand_title',
                    name: 'brand_title'
                },
                {
                    data: 'pro_featured',
                    name: 'pro_featured'
                },
                {
                    data: 'pro_today_deal',
                    name: 'pro_today_deal'
                },
                {
                    data: 'pro_status',
                    name: 'pro_status'
                },
                {
                    data: 'action',
                    name: 'action',
                    serachable: true,
                    orderable: true,

                },

            ]
        });
    })

    // Active featured 
    $(document).on("click", ".active_feature", function () {
        var Id = $(this).data('id');
        var url = "{{ url('dashboard/product/act_feature') }}" + "/" + Id;
        // alert(url);
        $.ajax({
            url: url,
            type: "get",
            success: function (response) {
                if (response.status === "success") {
                    window.location.href = response.redirect;
                }
            }
        });
    });

    // DEactive featured 
    $(document).on("click", ".deactive_feature", function () {
        var Id = $(this).data('id');
        // $(".modal_body #modal_id").val(deleteID);
        var url = "{{ url('dashboard/product/deact_feature') }}" + "/" + Id;
        // alert(url);
        $.ajax({
            url: url,
            type: "get",
            success: function (response) {
                if (response.status === "success") {
                    window.location.href = response.redirect;
                }
            }
        });
    });

    // Active Today deal 
    $(document).on("click", ".active_today_deal", function () {
        var Id = $(this).data('id');
        var url = "{{ url('dashboard/product/act_today_deal') }}" + "/" + Id;
        // alert(url);
        $.ajax({
            url: url,
            type: "get",
            success: function (response) {
                if (response.status === "success") {
                    window.location.href = response.redirect;
                }
            }
        });
    });

    // DEactive Today deal 
    $(document).on("click", ".deactive_today_deal", function () {
        var Id = $(this).data('id');
        // $(".modal_body #modal_id").val(deleteID);
        var url = "{{ url('dashboard/product/deact_today_deal') }}" + "/" + Id;
        // alert(url);
        $.ajax({
            url: url,
            type: "get",
            success: function (response) {
                if (response.status === "success") {
                    window.location.href = response.redirect;
                }
            }
        });
    });

    // Active status 
    $(document).on("click", ".active_status", function () {
        var Id = $(this).data('id');
        var url = "{{ url('dashboard/product/act_status') }}" + "/" + Id;
        // alert(url);
        $.ajax({
            url: url,
            type: "get",
            success: function (response) {
                if (response.status === "success") {
                    window.location.href = response.redirect;
                }
            }
        });
    });

    // DEactive status 
    $(document).on("click", ".deactive_status", function () {
        var Id = $(this).data('id');
        // $(".modal_body #modal_id").val(deleteID);
        var url = "{{ url('dashboard/product/deact_status') }}" + "/" + Id;
        // alert(url);
        $.ajax({
            url: url,
            type: "get",
            success: function (response) {
                if (response.status === "success") {
                    window.location.href = response.redirect;
                }
            }
        });
    });

</script>
<script src="{{ asset('contents/admin') }}/assets/js/dataTables.min.js"></script>
@endsection
