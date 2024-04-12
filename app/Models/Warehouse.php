<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{

    protected $guarded=[];
    public $timestamps = false;
    protected $casts=[
        'created_at'=>'datetime',
        'updated_at'=>'datetime',
    ];
    use HasFactory;
}
