<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use Auth;
use Carbon\Carbon;
// use Intervention\Image\ImageManagerStatic as Image;
use Image;
use Session;

class SubcategoryController extends Controller
{
    public function index(){
        $cate = Category::where('cat_status',1)->latest('id')->get();
        $subcat = SubCategory::where('subcat_status','1')->latest('id')->get();
        return view('admin.subcategory.all',compact(['subcat','cate']));
        
    }
    public function store(Request $request){
        // return $request->all();
        $request->validate([
            'title'=>'required',
            'cat'=>'required',
        ]);
        $insert = SubCategory::create([
            'subcat_title'=>$request['title'],
            'cat_id'=>$request['cat'],
            'subcat_slug'=>'subcat-'.uniqId(),
            'subcat_creator'=>Auth::user()->id,
            'created_at'=>carbon::now(),
        ]);
        if($insert){
            Session::flash('success','New Product subcategory Added');
            return redirect()->route('dashboard.subcategory');
        }
    }

    public function view($slug){
        $cat = Category::where('cat_status','1')->latest('id')->get();
        $view = SubCategory::with('category')->where('subcat_slug',$slug)->first();
        return view('admin.subcategory.view',compact(['view','cat']));
    }

    public function edit($slug){
        $cat = Category::where('cat_status','1')->latest('id')->get();
        $edit = SubCategory::where('subcat_slug',$slug)->first();
        return view('admin.subcategory.edit',compact(['edit','cat']));
    }
    
    public function update(Request $request){
        $slug = $request['slug'];
        $id = $request['id'];

        $old = SubCategory::find($id);
        $request->validate([
            'title'=>'required',
            'cat'=>'required',
        ]);

        $insert = SubCategory::where('id',$id)->update([
            'subcat_title'=>$request['title'],
            'cat_id'=>$request['cat'],
            'subcat_slug'=>$slug,
            'subcat_editor'=>Auth::user()->id,
            'updated_at'=>carbon::now(),
        ]);

        if($insert){
            Session::flash('success','subcategory has Updated!');
            return redirect()->back()->with('dashboard/subcategory/edit/'.$slug);
        }
    }
    public function deleteI($id){
        $del = SubCategory::find($id);
        $del->delete();

        if($del){
            $alldata = SubCategory::orderBy('id','ASC')->get();
            foreach($alldata as $index => $value){
                $value->id = $index++;
                $value->save();
            }
            Session::flash('success','Deleted This Data');
            return redirect()->back();
        }  
    }
}
