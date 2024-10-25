@extends('layouts.admin')
@section('content')
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
    <div class="col-xl-12">
        <form method="post" action="{{ url('dashboard/manage/contact/update') }}"
            enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header bg-secondary">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="card_header"><i class="fab fa-facebook-f header_icon"></i>
                                Contact Information</h3>
                        </div>
                        <div class="col-md-4 text-end card_header_btn">
                            <a class="btn btn-sm btn-dark"
                                href="{{ url('dashboard/manage/social') }}"><i
                                    class="fa fa-th"></i>Social Media</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text"><i class="uil-phone"></i></span>
                                <input type="text" class="form-control" name="phone1" value="{{$contact->ci_phone1}}">
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text"><i class="uil-phone"></i></span>
                                <input type="text" class="form-control" name="phone2" value="{{$contact->ci_phone2}}">
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text"><i class="uil-envelope"></i></span>
                                <input type="text" class="form-control" name="email1" value="{{$contact->ci_email1}}">
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text"><i class="uil-envelope"></i></span>
                                <input type="text" class="form-control" name="email2" value="{{$contact->ci_email2}}">
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text"><i class="uil-map-pin-alt"></i></span>
                                <textarea class="form-control" style="resize:none;" rows="2" name="add1" value="">{{$contact->ci_add1}}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text"><i class="uil-map-pin-alt"></i></span>
                                <textarea class="form-control" style="resize:none;" rows="2" name="add2" value="">{{$contact->ci_add2}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-secondary text-center">
                    <button class="btn btn-md btn-dark">UPDATE</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
