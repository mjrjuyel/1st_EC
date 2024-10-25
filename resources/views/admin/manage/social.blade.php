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
        <form method="post" action="{{ url('dashboard/manage/social/update') }}"
            enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header bg-secondary">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="card_header"><i class="fab fa-facebook-f header_icon"></i>
                                Social Media</h3>
                        </div>
                        <div class="col-md-4 text-end card_header_btn">
                            <a class="btn btn-sm btn-dark"
                                href="{{ url('dashboard/manage/contact') }}"><i
                                    class="fa fa-th"></i>Contact Information</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text"><i class="uil-facebook-f"></i></span>
                                <input type="text" class="form-control" name="facebook"
                                    value="{{ $social->sm_facebook }}">
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text"><i class="uil-linkedin"></i></span>
                                <input type="text" class="form-control" name="linkedin"
                                    value="{{ $social->sm_linkedin }}">
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text"><i class="uil-twitter"></i></span>
                                <input type="text" class="form-control" name="twitter"
                                    value="{{ $social->sm_x }}">
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text"><i class="uil-youtube"></i></span>
                                <input type="text" class="form-control" name="youtube"
                                    value="{{ $social->sm_youtube }}">
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text"><i class="uil-paypal"></i></span>
                                <input type="text" class="form-control" name="pinterest"
                                    value="{{ $social->sm_pinterest }}">
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text"><i class="uil-vuejs-alt"></i></span>
                                <input type="text" class="form-control" name="vimeo" value="{{ $social->sm_vimeo }}">
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text"><i class="uil-instagram"></i></span>
                                <input type="text" class="form-control" name="instagram"
                                    value="{{ $social->sm_instagram }}">
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text"><i class="uil-whatsapp"></i></span>
                                <input type="text" class="form-control" name="whatsapp"
                                    value="{{ $social->sm_whatsapp }}">
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text"><i class="uil-facebook-messenger"></i></span>
                                <input type="text" class="form-control" name="skype" value="{{ $social->sm_skype }}">
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text"><i class="uil-pound"></i></span>
                                <input type="text" class="form-control" name="flickr"
                                    value="{{ $social->sm_flickr }}">
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
