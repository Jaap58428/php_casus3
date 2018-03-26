@extends('layouts.app')

@section('content')
<div class="edit-item">
  <h2>Item toevoegen</h2>
  {{Form::open(array('action'=>'ItemController@store','method'=>'post','class'=>'create-form'))}}
    <fieldset class="create-field">
      <label for="name">Naam</label>
      <input required type="text" name="name" value="" placeholder="Bijv. Stofzuiger">
    </fieldset>
    <fieldset class="create-field">
      <label for="description">Omschrijving</label>
      <input class="item-create-description" required type="text" name="description" value="" placeholder="Korte omschrijving">
    </fieldset>
    <fieldset class="create-field">
      <span></span>
      <input class="btn btn-default" type="submit" value="Invoeren">
    </fieldset>
  {{Form::close()}}
</div>

@endsection
