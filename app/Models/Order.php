<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    public $timestaps = false;
    protected $casts = [
        'created_at'=>'datetime',
        'updated_at'=>'datetime',
    ];

    public function orderDetail(){
        return $this->hasMany(OrderDetail::class,'order_id');
    }
    use HasFactory;
}
