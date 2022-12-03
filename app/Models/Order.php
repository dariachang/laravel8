<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [''];
    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
    public function user(){
        return $this->belongTo(User::class);
    }
    public function cart(){
        return $this->belongTo(Cart::class);
    }
}
