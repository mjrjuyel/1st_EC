@extends('layouts.home')
@section('product_css')
<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
<link rel='stylesheet' href='https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css'>
<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
<link rel="stylesheet" href="{{ asset('contents/frontend') }}/assets/styles/product_styles.css">
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>
@endsection
@section('product')
<div class="container mt-2 mb-3">
    <div class="row no-gutters">
        <div class="col-md-5 pr-2">
            <div class="card">
                <div class="demo">
                    <ul id="lightSlider">
                        <li
                            data-thumb="{{ asset('uploads/admin/product/'.$sinpro->pro_thumbnail) }}">
                            <img
                                src="{{ asset('uploads/admin/product/'.$sinpro->pro_thumbnail) }}" />
                        </li>
                        <li
                            data-thumb="{{ asset('uploads/admin/product/'.$sinpro->pro_pic2) }}">
                            <img
                                src="{{ asset('uploads/admin/product/'.$sinpro->pro_pic2) }}" />
                        </li>
                        <li
                            data-thumb="{{ asset('uploads/admin/product/'.$sinpro->pro_pic3) }}">
                            <img
                                src="{{ asset('uploads/admin/product/'.$sinpro->pro_pic3) }}" />
                        </li>
                        @if($sinpro->pic4 != '')
                            <li
                                data-thumb="{{ asset('uploads/admin/product/'.$sinpro->pro_pic4) }}">
                                <img
                                    src="{{ asset('uploads/admin/product/'.$sinpro->pro_pic4) }}" />
                            </li>
                        @endif
                        @if($sinpro->pic5 != '')
                            <li
                                data-thumb="{{ asset('uploads/admin/product/'.$sinpro->pro_pic5) }}">
                                <img
                                    src="{{ asset('uploads/admin/product/'.$sinpro->pro_pic5) }}" />
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="card mt-2">
                <h6>Reviews</h6>
                <div class="d-flex flex-row">
                    <div class="stars"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i> </div> <span class="ml-1 font-weight-bold">4.6</span>
                </div>
                <hr>
                <div class="badges"> <span class="badge bg-dark ">All (230)</span> <span class="badge bg-dark "> <i
                            class="fa fa-image"></i> 23 </span> <span class="badge bg-dark "> <i
                            class="fa fa-comments-o"></i> 23 </span> <span class="badge bg-warning"> <i
                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                            class="fa fa-star"></i> <span class="ml-1">2,123</span> </span> </div>
                <hr>

                <div class="">
                    <form action="{{ route('product.review.add') }}" method="post"
                        enctype="multipart/form-data">
                        <div class="wrapper">
                            <div class="master">
                                <h3>Review And rating</h3>
                                <p>How was your experience about our product?</p>

                                <div class="rating-component">
                                    <div class="status-msg">
                                        <label>
                                            <input class="rating_msg" type="hidden" name="rating_msg" value="" />
                                        </label>
                                    </div>
                                    <div class="stars-box">
                                        <i class="star fa fa-star" title="1 star" data-message="Poor"
                                            data-value="1"></i>
                                        <i class="star fa fa-star" title="2 stars" data-message="Too bad"
                                            data-value="2"></i>
                                        <i class="star fa fa-star" title="3 stars" data-message="Average quality"
                                            data-value="3"></i>
                                        <i class="star fa fa-star" title="4 stars" data-message="Nice"
                                            data-value="4"></i>
                                        <i class="star fa fa-star" title="5 stars" data-message="very good qality"
                                            data-value="5"></i>
                                    </div>
                                    <div class="starrate">
                                        <label>
                                            <input class="ratevalue" type="number" name="rate_value" value="0" min="1"
                                                max="5" step="1" />
                                        </label>
                                    </div>
                                </div>

                                <div class="tags-box">
                                    <input type="text" class="tag form-control" name="comment" id="inlineFormInputName"
                                        placeholder="please enter your review">
                                    <input type="hidden" name="product_id" value="{{ $sinpro->id }}" />
                                </div>

                                <div class="button-box">
                                    <input type="submit" class=" done btn btn-warning" value="Add review" />
                                </div>

                                <div class="submited-box">
                                    <div class="loader"></div>
                                    <div class="success-message">
                                        Thank you!
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <hr>
                <div class="comment-section">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-row align-items-center"> <img src="https://i.imgur.com/o5uMfKo.jpg"
                                class="rounded-circle profile-image">
                            <div class="d-flex flex-column ml-1 comment-profile">
                                <div class="comment-ratings"> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div> <span
                                    class="username">Lori Benneth</span>
                            </div>
                        </div>
                        <div class="date"> <span class="text-muted">2 May</span> </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-row align-items-center"> <img src="https://i.imgur.com/tmdHXOY.jpg"
                                class="rounded-circle profile-image">
                            <div class="d-flex flex-column ml-1 comment-profile">
                                <div class="comment-ratings"> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div> <span
                                    class="username">Timona Simaung</span>
                            </div>
                        </div>
                        <div class="date"> <span class="text-muted">12 May</span> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="d-flex flex-row align-items-center">
                    <div class="p-ratings"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                            class="fa fa-star"></i> <i class="fa fa-star"></i> </div> <span class="ml-1">5.0</span>
                </div>
                <div class="product_category">Category: {{ $sinpro->category->cat_title }} >
                    {{ $sinpro->subcat->subcat_title }}</div>
                <div class="about" style="margin:10px 0px 10px; text-transform: capitalize; font-size:24px;"> <span
                        class="font-weight-bold">{{ $sinpro->pro_title }} </span>
                </div>
                <div class="product_brand text-primary">Barnd : {{ $sinpro->brand->brand_title }}</div>
                <div class="product_brand text-primary">Unit : {{ $sinpro->pro_unit }}</div>
                <div>
                    @if($sinpro->pro_discount_price == null)
                        <h4 class="banner_price" style="margin:10px 0px 10px;">${{ $sinpro->pro_selling_price }}
                        </h4>
                    @else
                        <h4 class="banner_price" style="margin:10px 0px 10px;">
                            ${{ $sinpro->pro_discount_price }}<span
                                style="margin-left:5px;">${{ $sinpro->pro_selling_price }}</span></h4>
                    @endif

                </div>
                <form action="{{ route('product.cart.add') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $sinpro->id }}">
                    @if($sinpro->pro_discount_price != null)
                        <input type="hidden" name="price" value="{{ $sinpro->pro_discount_price }}">
                    @else
                        <input type="hidden" name="price" value="{{ $sinpro->pro_selling_price }}">
                    @endif

                    @if($sinpro->pro_stock_quantity < 1)
                        <div><span class="">Quantity:</div>
                        <div class="custom-number-input">
                            <button class="decrement">-</button>
                            <span class="text-danger">Out Of Stock</span>
                            <button class="increment">+</button>
                        </div>
                    @else
                        <div><span class="">Quantity:</div>
                        <div class="custom-number-input">
                            <span class="decrement">-</span>
                            <input type="number" name="quantity" value="1" min="1" max="100" step="1">
                            <span class="increment">+</span>
                        </div>
                    @endif
                    <br>
                    @php
                        $color = explode(',',$sinpro->pro_color);
                        $size = explode(',',$sinpro->pro_size);
                    @endphp

                    @isset($sinpro->pro_color)
                        <div><span class="">Color:</div>
                        <div class="custom-number-input">
                            <select type="text" class="form-select form-control" name="color"
                                style="width:100px; display:inline-block;">
                                @foreach($color as $color)
                                    <option value="{{ $color }}">{{ $color }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endisset

                    @isset($sinpro->pro_size)
                        <div><span class="">size:</div>
                        <div class="custom-number-input">
                            <select type="number" class="form-control" name="size"
                                style="width:100px; display:inline-block;">
                                @foreach($size as $size)
                                    <option value="{{ $size }}">{{ $size }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endisset
                    <br>
                    <div class="buttons"> <button type="submit" class="btn btn-outline-warning btn-long cart">Add to
                            Cart</button>
                        <button class="btn btn-warning btn-long buy">Buy it Now</button>
                        <a href="{{ route('product.wishlist',$sinpro->id) }}"
                            class="btn btn-light wishlist"> <i class="fa fa-heart"></i> </a>
                    </div>
                    <div style="margin-top: 10px; text-align:center;">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                </form>
                <hr>
                <div class="product-description">
                    <div class="d-flex flex-row align-items-center"> <i class="fa fa-calendar-check-o"></i> <span
                            class="ml-1">Delivery from sweden, 2-4 days</span> </div>
                    <div class="mt-2"> <span class="font-weight-bold">Description</span>
                        <p>{!!$sinpro->pro_description!!}</p>
                        <div class="bullets">
                            <div class="d-flex align-items-center"> <span class="dot"></span> <span
                                    class="bullet-text">Best in Quality</span> </div>
                            <div class="d-flex align-items-center"> <span class="dot"></span> <span
                                    class="bullet-text">Anti-creak joinery</span> </div>
                            <div class="d-flex align-items-center"> <span class="dot"></span> <span
                                    class="bullet-text">Sturdy laminate surfaces</span> </div>
                            <div class="d-flex align-items-center"> <span class="dot"></span> <span
                                    class="bullet-text">Relocation friendly design</span> </div>
                            <div class="d-flex align-items-center"> <span class="dot"></span> <span
                                    class="bullet-text">High gloss, high style</span> </div>
                            <div class="d-flex align-items-center"> <span class="dot"></span> <span
                                    class="bullet-text">Easy-access hydraulic storage</span> </div>
                        </div>
                    </div>
                    <div class="mt-2"> <span class="font-weight-bold">Store</span> </div>
                    <div class="d-flex flex-row align-items-center"> <img src="https://i.imgur.com/N2fYgvD.png"
                            class="rounded-circle store-image">
                        <div class="d-flex flex-column ml-1 comment-profile">
                            <div class="comment-ratings"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                    class="fa fa-star"></i> <i class="fa fa-star"></i> </div> <span
                                class="username">Rare Boutique</span> <small class="followers">25K Followers</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-2"> <span>Similar items:</span>
                <div class="similar-products mt-2 d-flex flex-row">
                    @if($relate)
                        @foreach($relate as $simi)
                            <a href="{{ url('/product/'.$simi->pro_slug) }}">
                                <div class="card border p-1" style="width: 9rem;margin-right: 3px;"> <img
                                        src="{{ asset('uploads/admin/product/'.$simi->pro_thumbnail) }}"
                                        style="height:100px; object-fit:cover;" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h6 class="card-title">@if($simi->pro_discount_price != '')
                                            ${{ $simi->pro_discount_price }} @else ${{ $simi->pro_selling_price }}
                        @endif
                        </h6>
                </div>
            </div>
            </a>
            @endforeach
            @endif
        </div>
    </div>
</div>
</div>
<hr>
</div>
@endsection
@section('product_js')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=">
</script>
<script src='https://sachinchoolur.github.io/lightslider/dist/js/lightslider.js'></script>
<script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'>
</script>
<script>
    $('#lightSlider').lightSlider({
        gallery: true,
        item: 1,
        loop: true,
        slideMargin: 0,
        thumbItem: 6
    });

    // product Review Code
    // $(".rating-component .star").on("mouseover", function () {
    //     var onStar = parseInt($(this).data("value"), 10); //
    //     $(this).parent().children("i.star").each(function (e) {
    //         if (e < onStar) {
    //             $(this).addClass("hover");
    //         } else {
    //             $(this).removeClass("hover");
    //         }
    //     });
    // }).on("mouseout", function () {
    //     $(this).parent().children("i.star").each(function (e) {
    //         $(this).removeClass("hover");
    //     });
    // });

    // $(".rating-component .stars-box .star").on("click", function () {
    //     var onStar = parseInt($(this).data("value"), 10);
    //     var stars = $(this).parent().children("i.star");
    //     var ratingMessage = $(this).data("message");

    //     var msg = "";
    //     if (onStar > 1) {
    //         msg = onStar;
    //     } else {
    //         msg = onStar;
    //     }
    //     $('.rating-component .starrate .ratevalue').val(msg);
    //     $(".fa-smile-wink").show();
    //     $(".button-box .done").show();

    //     if (onStar === 5) {
    //         $(".button-box .done").removeAttr("disabled");
    //     } else {
    //         $(".button-box .done").attr("disabled", "true");
    //     }

    //     for (i = 0; i < stars.length; i++) {
    //         $(stars[i]).removeClass("selected");
    //     }

    //     for (i = 0; i < onStar; i++) {
    //         $(stars[i]).addClass("selected");
    //     }

    //     $(".status-msg .rating_msg").val(ratingMessage);
    //     $(".status-msg").html(ratingMessage);
    //     $("[data-tag-set]").hide();
    //     $("[data-tag-set=" + onStar + "]").show();
    // });

    // $(".feedback-tags  ").on("click", function () {
    //     var choosedTagsLength = $(this).parent("div.tags-box").find("input").length;
    //     choosedTagsLength = choosedTagsLength + 1;

    //     if ($(this).hasClass("choosed")) {
    //         $(this).removeClass("choosed");
    //         choosedTagsLength = choosedTagsLength - 2;
    //     } else {
    //         $(this).addClass("choosed");
    //         $(".button-box .done").removeAttr("disabled");
    //     }

    //     console.log(choosedTagsLength);

    //     if (choosedTagsLength <= 0) {
    //         $(".button-box .done").attr("enabled", "false");
    //     }
    // });

    // $(".compliment-container .fa-smile-wink").on("click", function () {
    //     $(this).fadeOut("slow", function () {
    //         $(".list-of-compliment").fadeIn();
    //     });
    // });

    $(".done").on("click", function () {
        $(".rating-component").hide();
        $(".feedback-tags").hide();
        $(".button-box").hide();
        $(".submited-box").show();
        $(".submited-box .loader").show();

        setTimeout(function () {
            $(".submited-box .loader").hide();
            $(".submited-box .success-message").show();
        }, 1500);
    });

    // number increment
    const incrementBtn = document.querySelector('.increment');
    const descrementBtn = document.querySelector('.decrement');
    const numberInput = document.querySelector('input[type="number"]');
    incrementBtn.addEventListener('click', () => {
        numberInput.stepUp();
    });
    decrementBtn.addEventListener('click', () => {
        numberInput.stepDown();
    });

</script>
@endsection
