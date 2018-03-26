<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class StateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

  public function acceptLent(Request $request)
  {
    $item = Item::find($request->input('id'));
    $item->state_id = 3;

    if ($item->save()) {
      return redirect('/items')->with('success', 'Je hebt het item nu te leen');
    }
  }

  public function denyLent(Request $request)
  {
    $item = Item::find($request->input('id'));
    $item->lender_id = null;
    $item->state_id = 1;

    if ($item->save()) {
      return redirect('/items')->with('error', 'Het item is terug gestuurd');
    }
  }

  public function startReturn(Request $request)
  {
    $item = Item::find($request->input('id'));
    $item->state_id = 4;

    if ($item->save()) {
      return redirect('/items')->with('success', 'Het item is aangeboden aan de eigenaar');
    }
  }

  public function acceptReturn(Request $request)
  {
    $item = Item::find($request->input('id'));
    $item->lender_id = null;
    $item->state_id = 1;

    if ($item->save()) {
      return redirect('/items')->with('success', 'Je hebt het item weer in bezit');
    }
  }
}
