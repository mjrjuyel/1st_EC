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
                        <li class="breadcrumb-item active">Coupon</li>
                    </ol>
                </div>
                <h4 class="page-title">Coupon</h4>
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
                                Coupon</a>
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
                                    <th class="text-center">Coupon Code</th>
                                    <th class="text-center">Coupon Lat Date</th>
                                    <th class="text-center">Coupon Amount</th>
                                    <th class="text-center">Coupon Type</th>
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
                    <h2 class="modal_form_title"><i class="mdi mdi-plus-circle me-2"></i> Add  Coupon</h2>
                </div>
                <hr>
                <form class="ps-3 pe-3" action="{{ route('dashboard.coupon.store') }}" method="post"
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
                        <label for="title" class="form-label"> Coupon Code<span class="important">*
                                :</span></label>
                        <input class="form-control" type="text" name="code"
                            value="{{ old('code') }}">
                        @error('code')
                            <strong class="invalid_msg">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="valid" class="form-label"> Coupon Valid Date<span class="important">*
                                :</span></label>
                        <input class="form-control" type="text" name="valid"  value="{{ old('valid') }}">

                        @error('valid')
                            <strong class="invalid_msg">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label"> Coupon Type<span class="important">*
                                :</span></label>
                        <select class="form-control" type="text" name="type">
                            <option value="">Select Coupon Type</option>
                            <option value="1">Fixed</option>
                            <option value="2">Percentage</option>
                        </select>

                        @error('type')
                            <strong class="invalid_msg">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="amount" class="form-label"> Coupon Amount<span class="important">*
                                :</span></label>
                        <input class="form-control" type="text" name="amount"  value="{{ old('amount') }}">

                        @error('amount')
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
        <form method="post" action="{{ url('/dashboard/coupon/softdel') }}">
           @csrf
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-warning">
                    <h4 class="modal-title" id="primary-header-modalLabel"> Coupon</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body modal_body">
                    Are You want to  Delete this?
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
            ajax: "{{ route('dashboard.coupon') }}",
            columns: [
                {
                    data: 'coupon_code',
                    name: 'coupon_code'
                },
                {
                    data: 'valid_date',
                    name: 'valid_date'
                },
                {
                    data: 'coupon_amount',
                    name: 'coupon_amount',
                    // render: function(data,type,full,meta){
                    //     return '<img src="{{asset('uploads/admin/brands')}}/' + data + '"Width="200px" style="object-fit:cover;" alt="">';
                    // }
                },
                {
                    data: 'coupon_type',
                    name: 'coupon_type',
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
