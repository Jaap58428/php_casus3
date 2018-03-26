@extends('layouts.app')

@section('content')

<h2>Item uitlenen aan iemand</h2>
{{Form::open(array('action'=> ['ItemController@update', $item->id],'method'=>'post','class'=>'create-form'))}}
  <fieldset class="create-field">
    <label for="newOwner">Nieuwe Eigenaar</label>
    <select required class="" name="newOwner">
      @foreach ($users as $user)
        <option disabled selected style="display: none">Kies een lener</option>
        @if ($user->id != auth()->user()->id)
          <option value="{{ $user->id }}">{{$user->name}}</option>
        @endif
      @endforeach
    </select>
  </fieldset>
  <fieldset class="create-field">
    <span></span>
    <input class="create-submit" type="submit" value="Aanpassen">
  </fieldset>
  {{Form::hidden('_method', 'PUT')}}
{{Form::close()}}

@endsection
