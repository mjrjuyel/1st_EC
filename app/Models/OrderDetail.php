<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $guarded = [];
    public $timestaps = false;
    protected $casts = [
        'created_at'=>'datetime',
        'updated_at'=>'datetime',
    ];
    use HasFactory;
}
