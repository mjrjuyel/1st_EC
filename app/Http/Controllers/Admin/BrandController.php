<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Brand;
use App\Events\BrandProcessed;
use Auth;
use Carbon\Carbon;
// use Intervention\Image\ImageManagerStatic as Image;
use Image;
use Session;
use DataTables;
use DB;

class BrandController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $data=Brand::where('brand_status','1')->latest('id')->get();
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
                            href="'.url('/dashboard/brand/view/'.$data->brand_slug).'"><i
                                class="uil-table"></i>view</a></li>
                    <li><a class="dropdown-item"
                            href=" '. url('dashboard/brand/edit/'.$data->brand_slug).'"><i
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
        return view('admin.brand.all');
    }
    public function store(Request $request){
        $request->validate([
            'title'=>'required',
            'pic'=>'required',
        ]);
        // if($validate->fails()){
        //     return redirect('dashboard/brand')->withErrors($validate)->withInput();
        //  }
        if($request->hasFile('pic')){
            $image =$request->file('pic');
            $imageName='Brand-'.uniqId().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/admin/brands/'),$imageName);
         }
        $insert = Brand::create([
            'brand_title'=>$request['title'],
            'brand_pic'=>$imageName ?? null,
            'brand_slug'=>'Brand-'.uniqId(),
            'brand_creator'=>Auth::user()->id,
            'created_at'=>carbon::now(),
        ]);

        $date=carbon::now();
        $event =[
            'title'=>$request['title'],
        ];
        // return $event;
        // event Caling
        event(new BrandProcessed($event));

         Session::flash('success','Brand has Created SuccessFully');
         return redirect()->back();
   }

   public function edit($slug){
    $edit =Brand::where('brand_status','1')->where('brand_slug',$slug)->first();
    // dd($edit);
    return view('admin.brand.edit',compact('edit'));
   }
    public function update(Request $request){
        $id = $request['id'];
        $slug = $request['slug'];
        $request->validate([
            'title'=>'required|unique:brands,brand_title,'.$id,
            'pic'=>'',
        ]);
        
        $insert = Brand::where('brand_status','1')->where('id',$id)->update([
            'brand_title'=>$request['title'],
            'brand_slug'=>$slug,
            'brand_editor'=>Auth::user()->id,
            'updated_at'=>carbon::now(),
        ]);

        if($request->hasFile('pic')){
            $image =$request->file('pic');
            $imageName='Brand-'.uniqId().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/admin/brands/'),$imageName);
            Brand::where('id',$id)->update([
                'brand_pic'=>$imageName,
            ]);
        }
            Session::flash('success','Brand has updated SuccessFully');
            return redirect()->back();
    }

    public function view($slug){
        $view = Brand::where('brand_status','1')->where('brand_slug',$slug)->first();
        return view('admin.brand.view',compact('view'));
    }

    public function softdelete(){
        echo "This is SoftDelete function";
        // $id =$request['modal_id'];
        // $request->all();
        // $softdel =Brand::where('brand_status','1')->where('id',$id)->update([
        //     'brand_status'=>0,
        //     'brand_editor'=>Auth::user()->id,
        //     'updated_at'=>Carbon::now(),
        // ]);
        // if($softdel){
        //     Session::flash('success','Data has deleted!');
        //     return redirect()->route('dashboard.brand');
        // }
    }
    // public function hello(){
    //     return "This Is hello Msg";
    // }
    public function deleteI(Request $request){
        $id=$request['modal_id'];
        $del=Brand::where('id',$id)->delete();
        if($del){
                // Ro₩ Gap Reduce
            $allRows = Brand::all();
        // Update the auto-incrementing column values
            foreach ($allRows as $index => $row) {
                $row->id = $index + 1;
                $row->save();
            }
        }
        return redirect()->back();
    }
   
}
