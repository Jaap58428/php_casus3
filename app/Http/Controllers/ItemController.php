<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\State;
use Uuid;
use Carbon\Carbon;
use App\User;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $currentUser = User::find(auth()->user()->id);

      $myItems = $currentUser->itemsOwned;
      $lentItems = $currentUser->itemsLent;
      $timeNow = Carbon::now()->toDateTimeString();

      $data = array(
        'myItems' => $myItems,
        'lentItems' => $lentItems,
        'timeNow' => $timeNow,
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
      $newItem->id = Uuid::generate()->string;
      $newItem->name = $request->name;
      $newItem->description = $request->description;
      $newItem->owner_id = auth()->user()->id;
      $newItem->state_id = 1;


      // return $newItem;

      if ($newItem->save()) {
        return redirect('/items');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
