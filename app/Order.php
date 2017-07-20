<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $table = 'orders';
  protected $fillable = [
    'first_name', 'last_name', 'email', 'phone', 'address1', 'address2', 'city', 'total'
  ];

}
