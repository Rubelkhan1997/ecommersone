<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shippingaddress extends Model
{
  protected $fillable = ['country_id','city_id','payment_status'];
}
