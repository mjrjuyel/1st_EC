<?php

namespace App\Http\Controllers\CustomerAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use Carbon\Carbon;


class RegisterController extends Controller
{
    public function registerForm()
    {
        return view('frontend.register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|min:6',
        ]);

        $insert=Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at'=>carbon::now()
        ]);
        if($insert){
        return redirect()->route('customer.login');
        }
    }
}
