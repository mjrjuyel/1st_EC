<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $casts = [
        'created_at' =>'datetime',
        'updated_at' => 'datetime'
    ];
    public function creator(){
        return $this->belongsTo(User::class,'brand_creator');
    }
    public function editor(){
        return $this->belongsTo(User::class,'brand_editor');
    }
    use HasFactory;
}
