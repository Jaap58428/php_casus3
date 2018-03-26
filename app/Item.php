<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  protected $table = 'items';
  protected $casts = [
    'id' => 'string'
  ];
  public function owner()
  {
    return $this->belongsTo('App\User', 'owner_id', 'id');
  }

  public function lender()
  {
    return $this->belongsTo('App\User', 'lender_id', 'id');
  }

  public function state()
  {
    return $this->belongsTo('App\State', 'state_id', 'id');
  }

}
