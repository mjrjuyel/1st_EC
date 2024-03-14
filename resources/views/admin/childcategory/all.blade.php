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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Product</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Category</a></li>
                        <li class="breadcrumb-item active">Child Category</li>
                    </ol>
                </div>
                <h4 class="page-title">Child Category</h4>
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
                                Child Category</a>
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
                        <table class="table table-centered ytable border table-strip text-center" id="myTable">
                            <thead class="table-light text-center">
                                <tr>
                                    <!-- <th class="all">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customCheck1">
                                            <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                        </div>
                                    </th> -->
                                    <th class=" text-center">Child Category Title</th>
                                    <th class=" text-center">Sub Category</th>
                                    <th class=" text-center">Category</th>
                                    <th class=" text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $data)
                                    <tr>
                                        <!-- <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="customCheck2">
                                                <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                            </div>
                                        </td> -->
                                        <td>
                                            {{ $data->child_cat_title }}
                                        </td>
                                        <td>
                                            {{ $data->subcat_title }}
                                        </td>
                                        <td class="text-warning">
                                            {{ $data->cat_title }}
                                        </td>

                                        <td>
                                            <div class="btn-group" role="group">
                                                <button id="btnGroupDrop1" type="button"
                                                    class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                    <li><a class="dropdown-item"
                                                            href="{{ url('/dashboard/childcategory/view/'.$data->child_cat_slug) }}"><i
                                                                class="uil-table"></i>View</a></li>
                                                    <li><a class="dropdown-item"
                                                            href="{{ url('dashboard/childcategory/edit/'.$data->child_cat_slug) }}"><i
                                                                class="uil-edit"></i>Edit</a></li>
                                                    <li>
                                                        <form
                                                            action="{{ url('/dashboard/childcategory/delete/'.$data->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="dropdown-item  text-danger" type="sumbit"><i
                                                                    class="uil-trash-alt"></i>Delete</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
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
<!-- data-bs-toggle="modal" data-bs-target="#softDelete_modal"
 data-id="" -->
<!-- ====================== Add Modal Section  -->
<div id="staticStoreModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <h2 class="modal_form_title"><i class="mdi mdi-plus-circle me-2"></i> Add Product Child Category
                    </h2>
                </div>
                <hr>
                <form class="ps-3 pe-3" action="{{ route('dashboard.childcategory.store') }}"
                    method="post" enctype="multipart/form-data">
                    
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Product Category</label>
                        <select class="form-control form_control" name="subcat">
                            @foreach($cat as $cat)
                                @php
                                $subcat =App\Models\SubCategory::where('subcat_status','1')->where('cat_id',$cat->id)->get();
                                @endphp
                                <option>{{$cat->cat_title}}</option>
                                @foreach($subcat as $sub)
                                <option value="{{$sub->id }}"> --{{$sub->subcat_title }}</option>
                                @endforeach
                            @endforeach
                        </select>
                        @error('title')
                            <strong class="invalid_msg">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Product Child Category Title<span class="important">*
                                :</span></label>
                        <input class="form-control" type="text" name="title"
                            value="{{ old('title') }}">

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

<!-- Soft Delete Modal  -->
<!-- <div id="softDelete_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="{{ route ('dashboard.category.softdel') }}">
@csrf
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-warning">
                    <h4 class="modal-title" id="primary-header-modalLabel">Product Category</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body modal_body">
                    Are You Sure want to Delete?
                    <input type="text" name="modal_id" id="modal_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </form>
    </div>
</div> -->
@endsection
@section('datatable_js')
<!-- <script>
    $(function childcategory(){
    var table=$('.ytable').DataTable({
        processing:true,
        serverSide:true,
        ajax:"{{ route('dashboard.childcategory') }}",
        columns:[
            {data:'DT_RowIndex',name:'DT_RowIndex'},
            {data:'child_cat_title',name:'child_cat_title'},
            {data:'child_cat_title',name:'child_cat_title'},
            {data:'cat_title',name:'cat_title'},
            {data:'action',name:'action',searchable:true,sortable:false,ordering:false},
        ]
    });
})
</script> -->
<script src="{{ asset('contents/admin') }}/assets/js/dataTables.min.js"></script>
@endsection
