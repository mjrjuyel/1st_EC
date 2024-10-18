<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Category extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' =>'datetime'
    ];

    public function creator(){
        return $this->belongsTo(User::class,'cat_creator');
    }

    public function editor(){
        return $this->belongsTo(User::class,'cat_editor');
    }
    public function subcategory(){
        return $this->hasMany(SubCategory::class,'cat_id','id');
    }

    public function childcategory(){
        return $this->hasMany(ChildCategory::class,'cat_id','id');
    }

    public function products(){
        return $this->hasMany(Product::class,'category_id','id');
    }
    
    use HasFactory;
}
