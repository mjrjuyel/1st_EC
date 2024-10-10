<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('contents/frontend') }}/assets/styles/login.css">
</head>

<body style="background:url('{{ asset('contents/frontend') }}/assets/banner.jpg')">
    <div class="box">
        <form class="div_form" action="{{ route('customer.login.insert') }}" method="post">
            @csrf
            <h2 class="form_title">Login Page</h2>
            <div class="input_div">
                <input type="text" class="form_input" name="email" required="required" value="{{old('email')}}">
                <label class="input_label">Email:</label>
                <i></i>

            </div>
            <div class="input_div  mt-36">
                <input type="password" class="form_input" name="password" required="required">
                <label class="input_label">Password:</label>
                <i></i>
            </div>
            <div class="form_links">
                <!-- <a href="#" class="forget_pass">Forget Password?</a> -->
                <a href="{{ route('customer.register') }}" class="forget_pass">Signup</a>
            </div>
            <div class="">@error('password')
                <strong class="invalid_msg">{{ $message }}</strong>
                @enderror
            </div>
            <div class="">
                    @error('email')
                        <strong class="invalid_msg">{{ $message }}</strong>
                    @enderror
             </div>
                <input class="submit_button mt-36" onclick="document.getElementById('load').style.visibility ='visible'"
                    id="submit" type="submit">
                <div id="load" class="load"></div>
        </form>
    </div>
    <script>
    </script>
</body>

</html>
