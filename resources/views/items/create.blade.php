@extends('layouts.app')

@section('content')

<h2>Item toevoegen</h2>
{{Form::open(array('action'=>'ItemController@store','method'=>'post','class'=>'create-form'))}}
  <fieldset class="create-field">
    <label for="name">Naam</label>
    <input required type="text" name="name" value="">
  </fieldset>
  <fieldset class="create-field">
    <label for="description">Omschrijving</label>
    <input required type="text" name="description" value="">
  </fieldset>
  <fieldset class="create-field">
    <span></span>
    <input class="create-submit" type="submit" value="Invoeren">
  </fieldset>
{{Form::close()}}

@endsection
