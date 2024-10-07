<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use App\Models\Brand;
use App\Models\Coupon;
use Auth;
use Carbon\Carbon;
use Image;
use Session;
use DataTables;

class ProductController extends Controller
{
    public function index(Request $request){
        // $product = Product::where('pro_status','1')->latest('id')->get();
        if($request->ajax()){
            $data=Product::where('pro_status','!=','2')->latest()->get();
            // return $data;
            return DataTables::of($data)
            ->editColumn('cat_title',function($data){
                return $data->category->cat_title;
            })
            ->editColumn('subcat_title',function($row){
                return $row->subcat->subcat_title;
            })
            ->editColumn('brand_title',function($data){
                return $data->brand->brand_title;
            })
            ->editColumn('pro_featured',function($data){
               if($data->pro_featured == 1){
                return '<a href="#" class="deactive_feature" data-id='.$data->id.'><i class="fa-solid fa-thumbs-down text-danger"></i> <span class="bg-success badge"> Active</span></a>';
               }
               else{
                return '<a href="#" class="active_feature" data-id='.$data->id.'><i class="fa-solid fa-thumbs-up text-danger"></i> <span class="bg-danger badge"> DeActive</span></a>';
               }
            })
            ->editColumn('pro_today_deal',function($data){
                if($data->pro_today_deal == 1){
                    return '<a href="#" class="deactive_today_deal" data-id='.$data->id.'><i class="fa-solid fa-thumbs-down text-danger"></i> <span class="bg-success badge"> Active</span></a>';
                }
                else{
                    return '<a href="#" class="active_today_deal" data-id='.$data->id.'><i class="fa-solid fa-thumbs-up text-danger"></i> <span class="bg-danger badge"> DeActive</span></a>';
                }
             })
             ->editColumn('pro_status',function($data){
                if($data->pro_status == 1){
                    return '<a href="#" class="deactive_status" data-id='.$data->id.'><i class="fa-solid fa-thumbs-down text-danger"></i> <span class="bg-success badge"> Active</span></a>';
                }
                else{
                    return '<a href="#" class="active_status" data-id='.$data->id.'><i class="fa-solid fa-thumbs-up text-danger"></i> <span class="bg-danger badge"> DeActive</span></a>';
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
                            href="'.url('/dashboard/product/view/'.$data->pro_slug).'"><i
                                class="uil-table"></i>view</a></li>
                    <li><a class="dropdown-item"
                            href=" '. url('dashboard/product/edit/'.$data->pro_slug).'"><i
                                class="uil-edit"></i>Edit</a></li>
                    <li>      
                        <a  href="#" id="softDel" class="dropdown-item  text-danger" data-bs-toggle="modal" data-bs-target="#softDelete_modal"
                        data-id='.$data->id.'><i class="uil-trash-alt"></i>Delete</a>
                    </li>
                </ul>
            </div>';
            return $actionBtn;
        })->rawColumns(['action','cat_title','subcat_title','brand_title','pro_featured','pro_today_deal','pro_status'])->make(true);
    }
        // return $product;s
        $category = Category::where('cat_status',1)->get();
        $brand = Brand::where('brand_status',1)->get();
        // $category = Category::where('cat_status',1)->get();
        return view('admin.product.all',compact(['category','brand']));;
    }   
    public function add(Request $request){
        $cat = Category::where('cat_status','1')->latest('id')->get();
        $childcat = ChildCategory::where('child_cat_status','1')->latest('id')->get();
        $brand = Brand::where('brand_status','1')->latest('id')->get();
        return view('admin.product.add',compact(['cat','childcat','brand']));
    }
    public function store(Request $request){
        // return $request->all();
        $request->validate([
            'title'=>'required',
            'code'=>'required',
            'unit'=>'required',
            'category'=>'required',
            'purchase'=>'required',
            'selling'=>'required',
            'color'=>'required',
            'size'=>'required',
            'quantity'=>'required',
            'tags'=>'required',
            'thumbnail'=>'required',
            'pic2'=>'required',
            'pic3'=>'required',
            'description'=>'required',
        ]);

        // thumnail file
        if($request->hasFile('thumbnail')){
            $image=$request->file('thumbnail');
            $image_name_1 = 'Thumb-'.uniqId().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/admin/product'),$image_name_1);
        }
        if($request->hasFile('pic2')){
            $image=$request->file('pic2');
            $image_name_2 = $request->title.'1-'.uniqId().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/admin/product'),$image_name_2);
        }
        if($request->hasFile('pic3')){
            $image=$request->file('pic3');
            $image_name_3 = $request->title.'2-'.uniqId().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/admin/product'),$image_name_3);
        }
        if($request->hasFile('pic4')){
            $image=$request->file('pic4');
            $image_name_4 =$request->title.'3-'.uniqId().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/admin/product'),$image_name_4);
        }
        if($request->hasFile('pic5')){
            $image=$request->file('pic5');
            $image_name_5 = $request->title.'4-'.uniqId().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/admin/product'),$image_name_5);
        }

        $cat = SubCategory::where('id',$request->category)->first();

        $insert =Product::create([
            'pro_title'=>$request['title'],
            'pro_code'=>$request['code'],
            'pro_thumbnail'=>$image_name_1 ?? null,
            'pro_pic2'=>$image_name_2 ?? null,
            'pro_pic3'=>$image_name_3 ?? null,
            'pro_pic4'=>$image_name_4 ?? null,
            'pro_pic5'=>$image_name_5 ?? null,
            'brand_id'=>$request['brand'],
            'category_id'=>$cat->cat_id,
            'sub_category_id'=>$request['category'],
            'child_cat_id'=>$request['childcategory'],
            'pro_unit'=>$request['unit'],
            'pro_tags'=>$request['tags'],
            'pro_description'=>$request['description'],
            'pro_video'=>$request['video'],
            'pro_color'=>$request['color'],
            'pro_size'=>$request['size'],
            'pro_purchase_price'=>$request['purchase'],
            'pro_selling_price'=>$request['selling'],
            'pro_discount_price'=>$request['discount'],
            'pro_stock_quantity'=>$request['quantity'],
            'pro_today_deal'=>$request['TD'],
            'pro_slider'=>$request['slider'],
            'flash_deal_id'=>$request['FD'],
            'cash_on_delevery'=>$request['COD'],
            'pro_slug'=>'pro-'.uniqId(),
            'pro_creator'=>Auth::user()->id,
            'created_at'=>carbon::now()->toDateTimeString(),
        ]);
        if($insert){
            Session::flash('success','Product has Created SuccessFully');
            return redirect()->back();
        }
   }

   public function view($slug){
    $view=Product::with(['category','subcat','childcategory','brand'])->where('pro_slug',$slug)->first();
    // return $view;
    return view('admin.product.view',compact('view'));
   }

   public function edit($slug){
    $edit =Product::where('pro_status','1')->where('pro_slug',$slug)->first();
    $brand = Brand::where('brand_status','1')->latest('id')->get();
    $cat = Category::where('cat_status','1')->latest('id')->get();
    $subcat = Subcategory::where('subcat_status','1')->latest('id')->get();
    // dd($edit);
    return view('admin.product.edit',compact(['edit','brand','cat']));
   }


    public function update(Request $request){
        $id = $request['id'];
        $slug = $request['slug'];
        $request->validate([
            'title'=>'required',
            'code'=>'required',
            'unit'=>'required',
            'category'=>'required',
            'purchase'=>'required',
            'selling'=>'required',
            'color'=>'required',
            'size'=>'required',
            'quantity'=>'required',
            'tags'=>'required',
            'thumbnail'=>'',
            'pic2'=>'',
            'pic3'=>'',
            'description'=>'required',
        ]);

        $old = Product::find($id);
        $path = public_path('uploads/admin/product/');
        // thumnail file
        if($request->hasFile('thumbnail')){
            if($old->pro_thumbnail != '' && $old->pro_thumbnail != null){
                $old_pic = $path.$old->pro_thumbnail;
                unlink($old_pic);
            }

            $image=$request->file('thumbnail');
            $image_name_1 = 'Thumb-'.uniqId().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/admin/product'),$image_name_1);

            Product::where('id',$id)->update([
                'pro_thumbnail'=>$image_name_1,
            ]);
        }
        if($request->hasFile('pic2')){
            if($old->pro_pic2 != '' && $old->pro_pic2 != null){
                $old_pic = $path.$old->pro_pic2;
                unlink($old_pic);
            }
    
            $image=$request->file('pic2');
            $image_name_2 = $request->title.'1-'.uniqId().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/admin/product'),$image_name_2);

            Product::where('id',$id)->update([
                'pro_pic2'=>$image_name_2,
            ]);
            
        }
        if($request->hasFile('pic3')){
            if($old->pro_pic3 != '' && $old->pro_pic3 != null){
                $old_pic = $path.$old->pro_pic3;
                unlink($old_pic);
            }
            
            $image=$request->file('pic3');
            $image_name_3 = $request->title.'2-'.uniqId().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/admin/product'),$image_name_3);

            Product::where('id',$id)->update([
                'pro_pic3'=>$image_name_3,
            ]);

        }
        if($request->hasFile('pic4')){
            if($old->pro_pic4 != '' && $old->pro_pic4 != null){
                $old_pic = $path.$old->pro_pic4;
                unlink($old_pic);
            }
           
            
            $image=$request->file('pic4');
            $image_name_4 =$request->title.'3-'.uniqId().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/admin/product'),$image_name_4);

            Product::where('id',$id)->update([
                'pro_pic4'=>$image_name_4,
            ]);
        }
        if($request->hasFile('pic5')){
            if($old->pro_pic5 != '' && $old->pro_pic5 != null){
                $old_pic = $path.$old->pro_pic5;
                unlink($old_pic);
            }

            $image=$request->file('pic5');
            $image_name_5 = $request->title.'4-'.uniqId().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/admin/product'),$image_name_5);

            Product::where('id',$id)->update([
                'pro_pic5'=>$image_name_5,
            ]);
        }

        $cat = SubCategory::where('id',$request->category)->first();

        $insert =Product::where('id',$id)->update([
            'pro_title'=>$request['title'],
            'pro_code'=>$request['code'],
            'brand_id'=>$request['brand'],
            'category_id'=>$cat->cat_id,
            'sub_category_id'=>$request['category'],
            'child_cat_id'=>$request['childcategory'],
            'pro_unit'=>$request['unit'],
            'pro_tags'=>$request['tags'],
            'pro_description'=>$request['description'],
            'pro_video'=>$request['video'],
            'pro_color'=>$request['color'],
            'pro_size'=>$request['size'],
            'pro_purchase_price'=>$request['purchase'],
            'pro_selling_price'=>$request['selling'],
            'pro_discount_price'=>$request['discount'],
            'pro_stock_quantity'=>$request['quantity'],
            'pro_today_deal'=>$request['TD'],
            'pro_slider'=>$request['slider'],
            'flash_deal_id'=>$request['FD'],
            'cash_on_delevery'=>$request['COD'],
            'pro_slug'=>$slug,
            'pro_editor'=>Auth::user()->id,
            'updated_at'=>carbon::now()->toDateTimeString(),
        ]);
        if($insert){
            Session::flash('success','Product has Updated SuccessFully');
            return redirect()->back();
        }
   }
    
    public function deleteI(Request $request){
        $id=$request['modal_id'];
        return $request->all();
    }
    // active feature
    public function active_feature($id){
        $deactive = Product::where('id',$id)->update([
            'pro_featured'=>1,
        ]);
            // Session::flash('success','Featured is Activated');
            return response()->json([
                'status' => 'success',
                'redirect' => '/dashboard/product'
            ]);
    }
    // Deactive Featured 
    public function deactive_feature($id){
        $deactive = Product::where('id',$id)->update([
            'pro_featured'=>0,
        ]);
        return response()->json([
            'status'=>'success',
            'redirect'=>'/dashboard/product',
        ]);
    }
     // active today deal
     public function active_today_deal($id){
        $deactive = Product::where('id',$id)->update([
            'pro_today_deal'=>1,
        ]);
            // Session::flash('success','Featured is Activated');
            return response()->json([
                'status' => 'success',
                'redirect' => '/dashboard/product'
            ]);
    }
    // Deactive today deal 
    public function deactive_today_deal($id){
        $deactive = Product::where('id',$id)->update([
            'pro_today_deal'=>0,
        ]);
        return response()->json([
            'status'=>'success',
            'redirect'=>'/dashboard/product',
        ]);
    }

     // active status
     public function active_status($id){
        $deactive = Product::where('id',$id)->update([
            'pro_status'=>1,
        ]);
            // Session::flash('success','Featured is Activated');
            return response()->json([
                'status' => 'success',
                'redirect' => '/dashboard/product'
            ]);
    }
    // Deactive status
    public function deactive_status($id){
        $deactive = Product::where('id',$id)->update([
            'pro_status'=>0,
        ]);
        return response()->json([
            'status'=>'success',
            'redirect'=>'/dashboard/product',
        ]);
    }

    // product SoftDelete

    public function softdelete(Request $request){
        $id=$request['modal_id'];
        $softdel = Product::where('id',$id)->update([
            'pro_status'=>2,
            'pro_editor'=>Auth::user()->id,
            'updated_at'=>carbon::now(),
        ]);

        return redirect()->back();
    }

}
