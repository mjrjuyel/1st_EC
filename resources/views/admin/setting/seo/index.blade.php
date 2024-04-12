@extends('layouts.admin')
@section('content')
<div class="container-fluid">

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
                        <div class="col-md-8 offset-md-2">
                            <div class="card-header bg-dark">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h3 class="card_header"><i class="fa-regular fa-envelope header_icon"></i>
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3">
                                <form class="ps-3 pe-3 border"action="{{ route('dashboard.setting.smtp.update') }}" method="post">
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
                                    <input type="hidden" name="id" value="{{$seo->id}}">
                                    <div class="row mt-3">
                                        <div class="col-md-8 offset-md-2 mb-3">
                                            <label for="username" class="form-label"> Meta Title<span
                                                    class="important">*
                                                    :</span></label>
                                            <input class="form-control" type="text" id="username" value="{{$seo->meta_title}}" name="title">

                                            @error('title')
                                                <strong class="invalid_msg">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-8 offset-md-2 mb-3">
                                            <label for="username" class="form-label"> Meta Author<span
                                                    class="important">*
                                                    :</span></label>
                                            <input class="form-control" type="text" id="" value="{{$seo->meta_author}}" name="author">

                                            @error('author')
                                                <strong class="invalid_msg">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8 offset-md-2 mb-3">
                                            <label for="username" class="form-label"> Meta Tags<span
                                                    class="important">*
                                                    :</span></label>
                                            <input class="form-control" type="text" id="" value="{{$seo->meta_tag}}" name="tags">

                                            @error('tags')
                                                <strong class="invalid_msg">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8 offset-md-2 mb-3">
                                            <label for="username" class="form-label"> Meta Description<span
                                                    class="important">*
                                                    :</span></label>
                                            <textarea class="form-control"  type="text" rows="4" style="resize:none;"  id="" name="description"
                                                >{{$seo->meta_description}}</textarea>
                                            @error('description')
                                                <strong class="invalid_msg">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8 offset-md-2 mb-3">
                                            <label for="username" class="form-label"> Meta Keywords<span
                                                    class="important">*
                                                    :</span></label>
                                            <input class="form-control" type="text" id="" value="{{$seo->meta_keywords}}" name="keywords" >

                                            @error('keywords')
                                                <strong class="invalid_msg">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <h2 class="text-warning">Other-----</h2>
                                    <div class="row">
                                        <div class="col-md-8 offset-md-2 mb-3">
                                            <label for="username" class="form-label"> Alexa Verification<span
                                                    class="important">*
                                                    :</span></label>
                                            <input class="form-control" type="text" id="" value="{{$seo->alexa_verification}}" name="alexa">

                                            @error('')
                                                <strong class="invalid_msg">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8 offset-md-2 mb-3">
                                            <label for="username" class="form-label"> Google Verification<span
                                                    class="important">*
                                                    :</span></label>
                                            <input class="form-control" type="text" id="" value="{{$seo->google_verification}}" name="g_verification">

                                            @error('')
                                                <strong class="invalid_msg">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8 offset-md-2 mb-3">
                                            <label for="username" class="form-label"> Google Analytic<span
                                                    class="important">*
                                                    :</span></label>
                                            <input class="form-control" type="text" id="" value="{{$seo->google_analytic}}" name="analytic">

                                            @error('')
                                                <strong class="invalid_msg">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>     
                                    
                                    <div class="row">
                                        <div class="col-md-8 offset-md-2 mb-3">
                                            <label for="username" class="form-label"> Google Adsense<span
                                                    class="important">*
                                                    :</span></label>
                                            <input class="form-control" type="text" id="" value="{{$seo->google_adsense}}" name="adsense">

                                            @error('')
                                                <strong class="invalid_msg">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div> 

                                    
                                    <div class="mb-3 text-center">
                                        <button class="btn btn-primary" type="submit">Upadte</button>
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
