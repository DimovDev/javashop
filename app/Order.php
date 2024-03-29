<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected  $guarded = [];
    public function user() {
        return $this->belongsTo(User::class);
    }

    public  function order_item(){
        return $this->hasMany(OrderItem::class);
    }

    public  function product(){
        return $this->belongsToMany(Product::class,'order_items');
    }

}
