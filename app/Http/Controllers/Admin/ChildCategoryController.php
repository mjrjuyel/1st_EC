<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use App\Models\Category;
use carbon\carbon;
use Session;
use Auth;
use DataTables;
use DB;

class ChildCategoryController extends Controller
{
    public function index(){
        $cat = Category::where('cat_status',1)->latest('id')->get();
        // $data = ChildCategory::with(['category','subcategory'])->where('child_cat_status','1')->latest('id')->get();
        $data = DB::table('child_categories')->leftJoin('categories','child_categories.cat_id','categories.id')->leftJoin('sub_categories','child_categories.subcat_id','sub_categories.id')
            ->select('categories.cat_title','sub_categories.subcat_title','child_categories.*')->get();
            // dd($data);
        // if($request->ajax()){
        //     
        //     $data = DB::table('child_categories')->leftJoin('categories','child_categories.cat_id','categories.id')->leftJoin('sub_categories','child_categories.Child_cat_id','sub_categories.id')
        //     ->select('categories.cat_title','sub_categories.Child_cat_title','child_categories.child_cat_title')->get();
        //     // return $data;
        //     return DataTables::of($data)
        //      ->addIndexColumn()
        //         ->addColumn('action',function($data){
        //         $actionBtn='<a href="">delete</a>';
        //        return $actionBtn;
        //     })->rawColumns('action')->make(true);
        // }
        return view('admin.childcategory.all',compact(['data','cat']));
        
    }
    public function store(Request $request){
        // return $request->all();
        $request->validate([
            'title'=>'required',
            'subcat'=>'required',
        ]);

        $cat = Subcategory::where('id',$request->subcat)->first();
        // return $request->all();
        $insert = ChildCategory::create([
            'Child_cat_title'=>$request['title'],
            'cat_id'=>$cat->cat_id,
            'subcat_id'=>$request['subcat'],
            'Child_cat_slug'=>'subcat-'.uniqId(),
            'Child_cat_creator'=>Auth::user()->id,
            'created_at'=>carbon::now(),
        ]);
        if($insert){
            Session::flash('success','New Product Child Category Added');
            return redirect()->route('dashboard.childcategory');
        }
    }

    public function view($slug){
        $cat = Category::where('cat_status','1')->latest('id')->get();
        $view = ChildCategory::with(['category','subcategory'])->where('Child_cat_slug',$slug)->first();
        return view('admin.childcategory.view',compact(['view','cat']));
    }

    public function edit($slug){
        $cat = Category::where('cat_status','1')->latest('id')->get();
        $edit = ChildCategory::where('Child_cat_slug',$slug)->first();
        return view('admin.childcategory.edit',compact(['edit','cat']));
    }
    
    public function update(Request $request){
        $slug = $request['slug'];
        $id = $request['id'];

        $request->validate([
            'title'=>'required',
            'subcat'=>'required',
        ]);
        $cat = Subcategory::where('id',$request->subcat)->first();
        $update = ChildCategory::where('id',$id)->update([
            'Child_cat_title'=>$request['title'],
            'cat_id'=>$cat->cat_id,
            'subcat_id'=>$request['subcat'],
            'Child_cat_slug'=>$slug,
            'Child_cat_editor'=>Auth::user()->id,
            'updated_at'=>carbon::now(),
        ]);

        if($update){
            Session::flash('success','Child Category has Updated!');
            return redirect()->back()->with('dashboard/childcategory/edit/'.$slug);
        }
    }
    public function deleteI($id){
        $del = ChildCategory::find($id);
        $del->delete();

        if($del){
            $alldata = ChildCategory::orderBy('id','ASC')->get();
            foreach($alldata as $index => $value){
                $value->id = $index + 1;
                $value->save();
            }
            Session::flash('success','Deleted This Data');
            return redirect()->back();
        }  
    }
}
