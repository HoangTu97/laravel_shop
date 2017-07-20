<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyCart extends Model
{
  protected $table = 'carts';
  protected $fillable = [
    'order_id', 'product_id', 'price', 'qty'
  ];

  public function order() {
    return $this->belongsTo('App\Order');
  }
}
