<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'discount',
    'valid_until'
  ];

  // convert name to Uppsercase
  public function setNameAttribute($value)
  {
    $this->attributes['name'] = Str::upper($value);
  }

  // Check coupon is valid
  public function checkIfValid()
  {
    return ($this->valid_until > Carbon::now()) ? true : false;
  }
}
