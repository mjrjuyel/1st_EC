<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Warehouse;
use Carbon\Carbon;
use Session;
use DataTables;

class WarehouseController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $data=Warehouse::where('wh_status','1')->latest('id')->get();
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
                            href="'.url('/dashboard/warehouse/view/'.$data->wh_slug).'"><i
                                class="uil-table"></i>view</a></li>
                    <li><a class="dropdown-item"
                            href=" '. url('dashboard/warehouse/edit/'.$data->wh_slug).'"><i
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
        return view('admin.warehouse.all');
    }
    public function store(Request $request){
        $request->validate([
            'title'=>'required',
            'phone'=>'required',
            'address'=>'required',
        ]);

        $insert = Warehouse::create([
            'wh_name'=>$request['title'],
            'wh_address'=>$request['address'],
            'wh_phone'=>$request['phone'],
            'wh_slug'=>'Warehouse-'.uniqId(),
            'created_at'=>carbon::now(),
        ]);
            Session::flash('success','Warehouse has Created SuccessFully');
            return redirect()->back();
   }

   public function edit($slug){
    $edit =Warehouse::where('wh_status','1')->where('wh_slug',$slug)->first();
    // dd($edit);
    return view('admin.warehouse.edit',compact('edit'));
   }
    public function update(Request $request){
        $id = $request['id'];
        $slug = $request['slug'];
        $request->validate([
            'title'=>'required',
            'phone'=>'required',
            'address'=>'required',
        ]);
        
        $insert = Warehouse::where('wh_status','1')->where('id',$id)->update([
            'wh_name'=>$request['title'],
            'wh_address'=>$request['address'],
            'wh_phone'=>$request['phone'],
            'wh_slug'=>$slug,
            'created_at'=>carbon::now(),
        ]);

        Session::flash('success','Warehouse has updated SuccessFully');
        return redirect()->back();
    }

    public function view($slug){
        $view = Warehouse::where('wh_status','1')->where('wh_slug',$slug)->first();
        return view('admin.warehouse.view',compact('view'));
    }

    public function softdelete(Request $request){
        // echo "This is SoftDelete function";
        $id =$request['modal_id'];
        // $request->all();
        $softdel =Warehouse::where('wh_status','1')->where('id',$id)->update([
            'wh_status'=>0,
            'updated_at'=>Carbon::now(),
        ]);
        if($softdel){
            Session::flash('success','Data has deleted!');
            return redirect()->route('dashboard.warehouse');
        }
    }
    
    public function deleteI(Request $request){
        $id=$request['modal_id'];
        return $request->all();
    }
}
