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
    use HasFactory;
}
