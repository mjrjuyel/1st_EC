<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Subcategory;
use App\Models\Warehouse;
use App\Models\Product;
use App\Models\Customer;
use Session;
use DataTables;

class OrderController extends Controller
{

    public function index(Request $request){
        if($request->ajax()){
            $data=Order::latest('id')->get();
            // return $data;
            return DataTables::of($data)
            ->editColumn('payment_type', function($data){
                if($data->payment_type == null){
                    return '<span class="btn btn-success">Amar Pay</span>';
                }else{
                    return $data->payment_type;
                }
            })
            ->editColumn('status',function($data){
                if($data->status == 0){
                  return  '<span class="btn btn-danger">Pending</span>';
                }
                elseif($data->status == 1){
                    return  '<span class="btn btn-success">Received</span>';
                  }
                elseif($data->status == 2){
                    return  '<span class="btn btn-primary">Shipped</span>';
                  }
                  elseif($data->status == 3){
                    return  '<span class="btn btn-success">Delevered</span>';
                  }
                elseif($data->status == 4){
                    return  '<span class="btn btn-warning">Return</span>';
                  }
                elseif($data->status == 5){
                    return  '<span class="btn btn-danger">Cancle</span>';
                  }
            })
            ->addColumn('action',function($data){
                $actionBtn = '<div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button"
                    class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Action
                </button>
                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <li><a class="dropdown-item"
                            href="'.url('/dashboard/order/view/'.$data->id).'"><i class="uil-table"></i>view</a></li>
                    <li>
                     <a href="'.route('dashboard.order.edit',$data->id).'"  class="dropdown-item  text-primary"><i class="uil-cog"></i>Edit<a>            
                    </li>
                    <li>      
                        <a  href="#" id="softDel" class="dropdown-item  text-danger" data-bs-toggle="modal" data-bs-target="#softDelete_modal"
                        data-id='.$data->id.'><i class="uil-trash-alt"></i>Delete</a>
                    </li>
                </ul>
            </div>';
            return $actionBtn;
           })->rawColumns(['action','status','payment_type'])->make(true);
        }
        return view('admin.order.all');
    }

    public function view($id){
        $view = Order::with(['orderDetail'])->where('id',$id)->first();
        // return $view;
        return view('admin.order.view',compact('view'));
    }

    public function edit($id){
        $edit = Order::where('id',$id)->first();
        return view('admin.order.edit',compact('edit'));
    }
    
    public function update(Request $request){
        $id = $request['id'];
        $request->validate([
            'name'=>'required',
            'status'=>'required',
        ]);

        $update = Order::where('id',$id)->update([
            'c_name'=>$request['name'],
            'status'=>$request['status'],
        ]);

        if($update){
            Session::flash('success','Order Info Update!');
            return redirect()->route('dashboard.order');
        }

    }
}
