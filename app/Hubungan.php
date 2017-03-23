<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hubungan extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'nama'
  ];

  protected $dates = ['deleted_at'];
}
