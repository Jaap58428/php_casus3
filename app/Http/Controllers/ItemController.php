<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\State;
use App\User;
use Uuid;
use Carbon\Carbon;

class ItemController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $currentUser = User::find(auth()->user()->id);

      $itemsReturned = $currentUser->itemsOwned->where('state_id', 4);
      $itemsForMe = $currentUser->itemsLent->where('state_id', 2);
      $myItems = $currentUser->itemsOwned;
      $lentItems = $currentUser->itemsLent->where('state_id', 3);
      $timeNow = Carbon::now()->toDateTimeString();

      $data = array(
        'myItems' => $myItems,
        'lentItems' => $lentItems,
        'timeNow' => $timeNow,
        'itemsForMe' => $itemsForMe,
        'itemsReturned' => $itemsReturned,
      );

      return view('items.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $newItem = new Item;
      $newItem->id = (string) Uuid::generate();
      $newItem->name = $request->name;
      $newItem->description = $request->description;
      $newItem->owner_id = auth()->user()->id;
      $newItem->state_id = 1;

      if ($newItem->save()) {
        return redirect('/items')->with('success', 'Je item is toegevoegd');
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $users = User::all();
      $item = Item::find($id);
      $data = array(
        'users' => $users,
        'item' => $item,
      );

      return view('items.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $item = Item::find($id);
      $item->lender_id = $request->input('newOwner');
      $item->state_id = 2;

      $message = 'Je item is ter leen aangeboden aan ' . User::find($item->lender_id)->name;

      if ($item->save()) {
        return redirect('/items')->with('success', $message);
      }
    }


}
