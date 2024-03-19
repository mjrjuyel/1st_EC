<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use Auth;
use Carbon\Carbon;
// use Intervention\Image\ImageManagerStatic as Image;
use Image;
use Session;

class CategoryController extends Controller
{
    public function index(){
        $cat = Category::with(['subcategory','childcategory'])->where('cat_status','1')->latest('id')->get();
        return view('admin.category.all',compact('cat'));
    }
    public function store(Request $request){
        // return $request->all();
        $request->validate([
            'title'=>'required',
            'pic'=>'required',
            'term'=>'required'
        ]);

        if($request->hasFile('pic')){
            $image = $request->file('pic');
            $imageName = 'Cate-'.uniqId().'.'.$image->getClientOriginalExtension();
            // Image::make($image)->save('uploads/admin/category',$imageName);
            $image->move(public_path('uploads/admin/category/'), $imageName);
            // Category::where('id',$insert)->update([
            //     'cat_pic'=>$imageName,
            //     'created_at'=>carbon::now(),
            // ]);
        }
        
        $insert = Category::create([
            'cat_title'=>$request['title'],
            'cat_terms'=>$request['term'],
            'cat_pic'=>$imageName ?? null,
            'cat_slug'=>'cat-'.uniqId(),
            'cat_creator'=>Auth::user()->id,
            'created_at'=>carbon::now(),
        ]);

        if($insert){
            Session::flash('success','New Product Category Added');
            return redirect()->route('dashboard.category');
        }
    }

    public function view($slug){
        $view = Category::where('cat_slug',$slug)->first();
        return view('admin.category.view',compact('view'));
    }
    public function edit($slug){
        $edit = Category::where('cat_slug',$slug)->first();
        return view('admin.category.edit',compact('edit'));
    }
    public function update(Request $request){
        $slug = $request['slug'];
        $id = $request['id'];

        $old = Category::find($id);
        $request->validate([
            'title'=>'required',
            'pic'=>'',
            'term'=>''
        ]);

        $insert = Category::where('id',$id)->update([
            'cat_title'=>$request['title'],
            'cat_slug'=>$slug,
            'cat_editor'=>Auth::user()->id,
            'updated_at'=>carbon::now(),
        ]);

        if($request->hasFile('pic')){
            $path = public_path('uploads/admin/category/');
            if($old->cat_pic != '' && $old->cat_pic != null){
                $old_pic = $path.$old->cat_pic;
                unlink($old_pic);
            }
            $image = $request->file('pic');
            $imageName = 'Cate-'.uniqId().'.'.$image->getClientOriginalExtension();
            // Image::make($image)->save('uploads/admin/category',$imageName);
            $image->move(public_path('uploads/admin/category/'), $imageName);
             Category::where('id',$id)->update([
                'cat_pic'=>$imageName,
                'created_at'=>carbon::now(),
            ]);
        }

        if($insert){
            Session::flash('success','Category has Updated!');
            return redirect()->back()->with('dashboard/category/edit/'.$slug);
        }
    }
    public function deleteI($id){
        $del= category::find($id);
        // return $allSub;
        $path=public_path().'/uploads/admin/category/';
        if($del->cat_pic != '' && $del->cat_pic != null){
            $file =$path.$del->cat_pic;
            unlink($file);
        }
        $del->delete();

        if($del){
            // Ro₩ Gap Reduce
        //     $allRows = Category::with(['subcategory','childcategory'])->orderBy('id', 'asc')->get();
        // // Update the auto-incrementing column values
        //     foreach ($allRows as $index => $row) {
        //         $row->id = $index + 1;
        //         foreach($allRows->subcategory as $subcat){
        //             $subcat->cat_id = $row->id;
        //             $subcat->save();
        //         }
        //         foreach($allchild as $key => $child){
        //             $child->cat_id = $row->id;
        //             $child->save();
        //         }
        //         $row->save();
        // }
            Session::flash('success','Deleted This Data');
            return redirect()->back();
        }
      
    }
}
