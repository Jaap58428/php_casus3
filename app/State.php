<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
  protected $table = 'states';

  public function owner()
  {
    return $this->hasMany('App\Item', 'state', 'id');
  }
}
