<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  protected $table = 'items';

  public function owner()
  {
    return $this->belongsTo('App\User', 'owner', 'id');
  }

  public function lender()
  {
    return $this->belongsTo('App\User', 'lender', 'id');
  }

  public function state()
  {
    return $this->belongsTo('App\State', 'state', 'id');
  }

}
