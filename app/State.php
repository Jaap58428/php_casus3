<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
  protected $table = 'states';
  protected $casts = [
    'id' => 'string'
  ];
  public function items()
  {
    return $this->hasMany('App\Item', 'state_id', 'id');
  }
}
