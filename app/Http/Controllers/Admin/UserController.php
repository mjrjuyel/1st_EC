<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $allAdmin = User::all();
        return view('admin.admin.all',compact('allAdmin'));
    }
}
