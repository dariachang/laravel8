<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $guarded = [''];
    public function product(){
        return $this->belongTo(Product::class);
    }
    public function order(){
        return $this->belongTo(Order::class);
    }
    public function cart(){
        return $this->belongTo(Cart::class);
    }
}
