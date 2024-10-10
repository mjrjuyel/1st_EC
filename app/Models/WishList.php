<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    protected $guarded=[];
    public $timestamps = false;
    protected $casts=[
        'created_at'=>'datetime',
        'updated_at'=>'datetime'
    ];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id');
    }
    use HasFactory;
}
