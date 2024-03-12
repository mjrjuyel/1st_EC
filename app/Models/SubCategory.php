<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' =>'datetime'
    ];
    public function creator(){
        return $this->belongsTo(User::class,'subcat_creator');
    }
    public function editor(){
        return $this->belongsTo(User::class,'subcat_editor');
    }

    public function category(){
        return $this->belongsTo(Category::class,'cat_id');
    }
    use HasFactory;
}
