<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;
use Session;
use DataTables;

class CouponController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $data=Coupon::where('coupon_status','1')->latest('id')->get();
            // return $data;
            return DataTables::of($data)
            ->addColumn('action',function($data){
                $actionBtn = '<div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button"
                    class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Action
                </button>
                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <li><a class="dropdown-item"
                            href="'.url('/dashboard/coupon/view/'.$data->coupon_slug).'"><i
                                class="uil-table"></i>view</a></li>
                    <li><a class="dropdown-item"
                            href=" '. url('dashboard/coupon/edit/'.$data->coupon_slug).'"><i
                                class="uil-edit"></i>Edit</a></li>
                    <li>      
                        <a  href="#" id="softDel" class="dropdown-item  text-danger" data-bs-toggle="modal" data-bs-target="#Delete"
                        data-id='.$data->id.'><i class="uil-trash-alt"></i>Delete</a>
                    </li>
                </ul>
            </div>';
            return $actionBtn;
        })->rawColumns(['action'])->make(true);
        }
        return view('admin.coupon.all');
    }
    public function store(Request $request){
        // return $request->all();
        $request->validate([
            'code'=>'required',
            'valid'=>'required',
            'amount'=>'required',
            'type'=>'required',
        ]);

        $insert = Coupon::create([
            'coupon_code'=>$request['code'],
            'valid_date'=>$request['valid'],
            'coupon_amount'=>$request['amount'],
            'coupon_type'=>$request['type'],
            'coupon_slug'=>'Coupon-'.uniqId(),
            'created_at'=>carbon::now(),
        ]);
            Session::flash('success','Coupon has Created SuccessFully');
            return redirect()->back();
   }

   public function edit($slug){
    $edit =Coupon::where('coupon_status','1')->where('coupon_slug',$slug)->first();
    // dd($edit);
    return view('admin.coupon.edit',compact('edit'));
   }
    public function update(Request $request){
        $id = $request['id'];
        $slug = $request['slug'];
        $request->validate([
            'code'=>'required',
            'valid'=>'required',
            'amount'=>'required',
            'type'=>'required',
        ]);
        
        $insert = Coupon::where('coupon_status','1')->where('id',$id)->update([
            'coupon_code'=>$request['code'],
            'valid_date'=>$request['valid'],
            'coupon_amount'=>$request['amount'],
            'coupon_type'=>$request['type'],
            'coupon_slug'=>$slug,
            'updated_at'=>carbon::now(),
        ]);

        Session::flash('success','Coupon has updated SuccessFully');
        return redirect()->back();
    }

    public function view($slug){
        $view = Coupon::where('coupon_status','1')->where('coupon_slug',$slug)->first();
        return view('admin.coupon.view',compact('view'));
    }

    public function softdelete(Request $request){
        // echo "This is SoftDelete function";
        $id =$request['modal_id'];
        // $request->all();
        $softdel =Coupon::where('coupon_status','1')->where('id',$id)->update([
            'coupon_status'=>0,
            'updated_at'=>Carbon::now(),
        ]);
        if($softdel){
            Session::flash('success','Data has deleted!');
            return redirect()->route('dashboard.coupon');
        }
    }
    
    public function deleteI(Request $request){
        $id=$request['modal_id'];
        return $request->all();
    }
}
