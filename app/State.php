<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
  protected $table = 'states';

  public function items()
  {
    return $this->hasMany('App\Item', 'state_id', 'id');
  }
}
