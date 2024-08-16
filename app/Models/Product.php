<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded =[];
    public $timestamps = false;
    protected $casts =[
        'created_at'=>'datetime',
        'updated_at'=>'datetime',
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function subcat(){
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }
    public function childcategory(){
        return $this->belongsTo(ChildCategory::class,'child_cat_id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function creator(){
        return $this->belongsTo(User::class,'pro_creator');
    }
    public function editor(){
        return $this->belongsTo(User::class,'pro_editor');
    }
    use HasFactory;
}
