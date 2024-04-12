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
                        <li class="breadcrumb-item active">SMTP</a></li>
                    </ol>
                </div>
                <h4 class="page-title">SMTP</h4>
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
                                        SMTP Upadte
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
                                    <input type="hidden" name="id" value="{{$smtp->id}}">
                                    <div class="row mt-3">
                                        <div class="col-md-8 offset-md-2 mb-3">
                                            <label for="username" class="form-label">Mail Mailer<span
                                                    class="important">*
                                                    :</span></label>
                                             <input class="form-control" type="text" id="" value="{{$smtp->mailer}}" name="mailer">
                                            @error('mailer')
                                                <strong class="invalid_msg">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-8 offset-md-2 mb-3">
                                            <label for="username" class="form-label">Mail Host<span
                                                    class="important">*
                                                    :</span></label>
                                            <input class="form-control" type="text" id="" value="{{$smtp->host}}" name="host">

                                            @error('host')
                                                <strong class="invalid_msg">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8 offset-md-2 mb-3">
                                            <label for="username" class="form-label">Mail Port<span
                                                    class="important">*
                                                    :</span></label>
                                            <input class="form-control" type="text" id="" value="{{$smtp->port}}" name="port">

                                            @error('port')
                                                <strong class="invalid_msg">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8 offset-md-2 mb-3">
                                            <label for="username" class="form-label">Mail Username<span
                                                    class="important">*
                                                    :</span></label>
                                            <input class="form-control"  type="text"   id="" name="username" value="{{$smtp->username}}" >
                                            @error('username')
                                                <strong class="invalid_msg">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8 offset-md-2 mb-3">
                                            <label for="username" class="form-label">Mail Password<span
                                                    class="important">*
                                                    :</span></label>
                                            <input class="form-control" type="text" id="" value="{{$smtp->password}}" name="password" >

                                            @error('password')
                                                <strong class="invalid_msg">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8 offset-md-2 mb-3">
                                            <label for="username" class="form-label">Mail Encription<span
                                                    class="important">*
                                                    :</span></label>
                                            <input class="form-control" type="text" id="" value="{{$smtp->encription}}" name="encription">

                                            @error('encription')
                                                <strong class="invalid_msg">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8 offset-md-2 mb-3">
                                            <label for="username" class="form-label">Mail From Address<span
                                                    class="important">*
                                                    :</span></label>
                                             <input class="form-control" type="text" id="" value="{{$smtp->from_email}}" name="from_email">
                                            @error('from_email')
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
