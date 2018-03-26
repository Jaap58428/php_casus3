<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class StateController extends Controller
{
  public function acceptLent(Request $request)
  {
    $item = Item::find($request->input('id'));
    $item->state_id = 3;

    if ($item->save()) {
      return redirect('/items');
    }
  }

  public function denyLent(Request $request)
  {
    $item = Item::find($request->input('id'));
    $item->lender_id = null;
    $item->state_id = 1;

    if ($item->save()) {
      return redirect('/items');
    }
  }

  public function startReturn(Request $request)
  {
    $item = Item::find($request->input('id'));
    $item->state_id = 4;

    if ($item->save()) {
      return redirect('/items');
    }
  }

  public function acceptReturn(Request $request)
  {
    $item = Item::find($request->input('id'));
    $item->lender_id = null;
    $item->state_id = 1;

    if ($item->save()) {
      return redirect('/items');
    }
  }
}
