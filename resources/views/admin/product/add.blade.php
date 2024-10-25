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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Products</a></li>
                        <li class="breadcrumb-item active">Add</li>
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
                                        Insert Product</h3>
                                    </div>
                                    <div class="col-md-4 text-end"><a
                                            href="{{ route('dashboard.product') }}"
                                            class="btn btn-sm btn-primary btn_header ">
                                            <i class="fa-brands fa-servicestack btn_icon"></i>All Product</a>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3">
                                <form class="ps-3 pe-3 "
                                    action="{{ route('dashboard.product.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="username" class="form-label">Product Name<span
                                                            class="important">*
                                                            :</span></label>
                                                    <input class="form-control" type="text" id="username" name="title"
                                                        value="{{ old('title') }}"
                                                        placeholder="Product Name">
                                                    @error('title')
                                                        <strong class="invalid_msg">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="code" class="form-label">Product Code<span
                                                            class="important">*
                                                            :</span></label>
                                                    <input class="form-control" type="text" id="code" name="code"
                                                        value="{{ old('code') }}"
                                                        placeholder="Product Code">
                                                    @error('code')
                                                        <strong class="invalid_msg">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="Brands" class="form-label">Product Brands<span
                                                            class="important">*:</span></label>
                                                    <select class="form-control" value="{{old('brand')}}" type="text" id="Brands" name="brand">
                                                        <option value="">Select Brand</option>
                                                        @foreach($brand as $brand)
                                                        <option value="{{$brand->id}}">{{$brand->brand_title}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('brand')
                                                    <strong class="invalid_msg">{{$message}}</strong>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="Unit" class="form-label">Product Units<span
                                                            class="important">*:</span></label>
                                                    <input class="form-control" value="{{old('unit')}}" type="text" id="Unit" name="unit"
                                                        placeholder="Unit (e.g. kg, pc etc)">
                                                    @error('unit')
                                                    <strong class="invalid_msg">{{$message}}</strong>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                    <label for="Unit" class="form-label">Cash On Del</label>
                                                    <input type="checkbox" id="switch4" value="1" checked name="COD"
                                                        data-switch="Delivery" />
                                                    <label for="switch4" data-on-label="yes"
                                                        data-off-label="no"></label>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="Unit" class="form-label">Add In Slider</label>
                                                    <input type="checkbox" id="switch2" value="1"  name="slider"
                                                        data-switch="Delivery" />
                                                    <label for="switch2" data-on-label="yes"
                                                        data-off-label="no"></label>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="Unit" class="form-label">Today Deal </label><br>
                                                    <input type="checkbox" id="switch5" value="1" checked  name="TD" data-switch="info" />
                                                    <label for="switch5" data-on-label="yes"
                                                        data-off-label="no"></label>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="Unit" class="form-label">Flash Deal</label><br>
                                                    <input type="checkbox" id="switch3" value="1" checked name="FD" data-switch="info" />
                                                    <label for="switch3" data-on-label="yes"
                                                        data-off-label="no"></label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                    <label for="Unit" class="form-label">Trendy Product</label>
                                                    <input type="checkbox" id="switch6" value="1" name="trendy"
                                                        data-switch="Delivery" />
                                                    <label for="switch6" data-on-label="yes"
                                                        data-off-label="no"></label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <label for="Unit" class="form-label">Purchase price<span
                                                            class="important">*:</span></label>
                                                    <input class="form-control" value="{{old('purchase')}}" type="number" id="" name="purchase" />
                                                    @error('purchase')
                                                    <strong class="invalid_msg">{{$message}}</strong>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label for="" class="form-label">Selling Price<span
                                                            class="important">*:</span></label><br>
                                                    <input class="form-control" value="{{old('selling')}}" type="number" id="" name="selling" />
                                                    @error('selling')
                                                    <strong class="invalid_msg">{{$message}}</strong>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label for="" class="form-label">Discount</label><br>
                                                    <input class="form-control" value="{{old('discount')}}" type="number" id="" name="discount" />
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="" class="form-label">Video Embedded<span
                                                            class="important">*:</span></label>
                                                    <input class="form-control" value="{{old('video')}}" type="text" id="text" name="video">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <label for="tags" class="form-label">Product Colors<span
                                                            class="important">*
                                                            :</span></label>
                                                    <input class="form-control"  type="text" id="tags" name="color"
                                                        value="{{ old('color') }}"
                                                        placeholder="Product Color" data-role="tagsinput">
                                                    <span class="info-text">Press Enter to seperate</span>
                                                    @error('color')
                                                        <strong class="invalid_msg">{{ $message }}</strong>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label for="tags" class="form-label">Product Size<span
                                                            class="important">*
                                                            :</span></label>
                                                    <input class="form-control" type="text" id="tags" name="size"
                                                        value="{{ old('size') }}"
                                                        placeholder="Product Size" data-role="tagsinput">
                                                    <span class="info-text">Press Enter to seperate</span>
                                                    @error('color')
                                                        <strong class="invalid_msg">{{ $message }}</strong>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label for="Unit" class="form-label">Product Quantity<span
                                                            class="important">*
                                                            :</span></label>
                                                    <input class="form-control" value="{{old('quantity')}}" type="text" id="Unit" name="quantity"
                                                        placeholder="">
                                                    @error('quantity')
                                                        <strong class="invalid_msg">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="subcategpry" class="form-label">Product Category /
                                                        SubCategory<span class="important">*
                                                            :</span></label>
                                                    <select class="form-control" value="{{old('category')}}" type="text" id="subcategpry"
                                                        name="category">
                                                        <option value="">Select Category</option>

                                                        @foreach($cat as $cat)
                                                            @php
                                                                $subcat=App\Models\SubCategory::where('subcat_status','1')->where('cat_id',$cat->id)->get();
                                                            @endphp
                                                            <option disabled>{{ $cat->cat_title }}</option>
                                                            @foreach($subcat as $sub)
                                                                <option value="{{ $sub->id }}">
                                                                    --{{ $sub->subcat_title }}</option>
                                                            @endforeach
                                                        @endforeach
                                                    </select>
                                                    @error('category')
                                                        <strong class="invalid_msg">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="childcategpry" class="form-label">Product Child
                                                        Category<span class="important">*
                                                            :</span></label>
                                                    <select class="form-control" value="{{old('childcategory')}}" type="text" id="childcategory"
                                                        name="childcategory">
                                                    </select>
                                                    @error('category')
                                                        <strong class="invalid_msg">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="tags" class="form-label">Product Tags<span
                                                            class="important">*
                                                            :</span></label>
                                                    <input class="form-control"type="text" id="tags" name="tags"
                                                        value="{{ old('tags') }}"
                                                        placeholder="Product Tags" data-role="tagsinput">
                                                    <span class="info-text">Press Enter to seperate tags</span>
                                                    @error('tags')
                                                        <strong class="invalid_msg">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row ">
                                                <div class="col-md-12 mb-3 ">
                                                    <label for="" class="form-label">Thumbnail Pic<span
                                                            class="important">*
                                                            :</span></label>
                                                    <input class="form-control" value="{{old('')}}" type="file" name="thumbnail">
                                                    @error('thumbnail')
                                                        <strong class="invalid_msg">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row ">
                                                <div class="col-md-12 mb-3 ">
                                                    <label for="" class="form-label">Product Image 1<span
                                                            class="important">*
                                                            :</span></label>
                                                    <input class="form-control" value="{{old('')}}" type="file" name="pic2">
                                                    @error('pic2')
                                                        <strong class="invalid_msg">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row ">
                                                <div class="col-md-12 mb-3 ">
                                                    <label for="" class="form-label">Product Image 2</label>
                                                    <input class="form-control" value="{{old('')}}" type="file" name="pic3">
                                                </div>
                                            </div>

                                            <div class="row ">
                                                <div class="col-md-12 mb-3 ">
                                                    <label for="" class="form-label">Product Image 3</label>
                                                    <input class="form-control" value="{{old('')}}" type="file" name="pic4">
                                                    
                                                </div>
                                            </div>

                                            <div class="row ">
                                                <div class="col-md-12 mb-3 ">
                                                    <label for="" class="form-label">Product Image 4</label>
                                                    <input class="form-control" value="{{old('')}}" type="file" name="pic5">
                                                </div>
                                            </div>

                                            <div class="row ">
                                                <div class="col-md-12 mb-3 ">
                                                    <label for="" class="form-label">Product Image 5</label>
                                                    <input class="form-control" value="{{old('')}}" type="file" name="pic6">
                                                    @error('pic6')
                                                        <strong class="invalid_msg">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="detail" class="form-label">Product Details
                                                        <span class="important">*
                                                            :</span></label>
                                                    <textarea class="form-control" value="{{old('description')}}" type="text" style="resize:none;"
                                                        id="summernote" name="description"></textarea>

                                                    @error('description')
                                                        <strong class="invalid_msg">{{ $message }}</strong>
                                                    @enderror
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

    $("#subcategpry").change(function(){
        var id = $(this).val();
    //    alert(id)
        $.ajax({
            url: "{{url('/get-childid/')}}/"+id,
            type: "get",
            success: function(data){
                $('select[name="childcategory"]').empty();
                $.each(data,function(key,data){
                    $('select[name="childcategory"]').append('<option value="'+data.id+'">'+data.child_cat_title+'</option>');
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
