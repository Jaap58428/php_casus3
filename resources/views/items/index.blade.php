@extends('layouts.app')

@section('content')

<div class="items-box">
  <h2>Items aangeboden aan mij</h2>
  @if (count($itemsForMe) > 0)
    <ul class="items-list">
    @foreach ($itemsForMe as $item)
      <li>
        <div class="item-description">
          <h3>{{$item->name}}</h3>
          <small>{{$item->description}}</small>
        </div>
        <div class="item-status">
          Aangeboden door {{$item->owner->name}} sinds {{$item->updated_at->diffForHumans()}}
        </div>
        <div class="item-actions">
          <form action="/state/acceptLent" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="{{$item->id}}">
            <input class="btn btn-accept" type="submit" value="Accepteer">
          </form>
          <form action="/state/denyLent" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="{{$item->id}}">
            <input class="btn btn-deny" type="submit" value="Annuleer">
          </form>
        </div>
      </li>
    @endforeach
  </ul>
  @else
    <p>Er zijn geen items aangeboden aan mij.</p>
  @endif
</div>



<div class="items-box">
  <h2>Items terug geven aan mij</h2>
  @if (count($itemsReturned) > 0)
    <ul class="items-list">
    @foreach ($itemsReturned as $item)
      <li>
        <div class="item-description">
          <h3>{{$item->name}}</h3>
          <small>{{$item->description}}</small>
        </div>
        <div class="item-status">
          Terug gegeven door {{$item->lender->name}} sinds {{$item->updated_at->diffForHumans()}}
        </div>
        <div class="item-actions">
          <form action="/state/acceptReturn" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="{{$item->id}}">
            <input type="submit" class="btn btn-default" value="Accepteer">
          </form>
        </div>
      </li>
    @endforeach
  </ul>
  @else
    <p>Er zijn geen terug gegeven aan mij.</p>
  @endif
</div>


<div class="items-box">
  <h2>Items van mij</h2>
  @if (count($myItems) > 0)
    <ul class="items-list">
    @foreach ($myItems as $item)
      <li>
        <div class="item-description">
          <h3>{{$item->name}}</h3>
          <small>{{$item->description}}</small>
        </div>
        <div class="item-status">
          {{$item->state->state_description}} sinds {{$item->updated_at->diffForHumans()}}
        </div>
        <div class="item-actions">
          @if ($item->state_id == 1)
            <a href="/items/{{$item->id}}/edit" class="btn btn-default">Leen aan iemand uit</a>
          @endif
        </div>
      </li>
    @endforeach
  </ul>
  @else
    <p>Je hebt geen items online.</p>
  @endif
</div>


<div class="items-box">
  <h2>Items geleend van anderen</h2>
  @if (count($lentItems) > 0)
    <ul class="items-list">
    @foreach ($lentItems as $item)
      <li>
        <div class="item-description">
          <h3>{{$item->name}}</h3>
          <small>{{$item->description}}</small>
        </div>
        <div class="item-status">
          In bezit sinds {{$item->updated_at->diffForHumans()}}
        </div>
        <div class="item-actions">
          <form action="/state/startReturn" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="{{$item->id}}">
            <input class="btn btn-default" type="submit" value="Retour">
          </form>
        </div>
      </li>
    @endforeach
  </ul>
  @else
    <p>Je hebt geen items geleend van iemand anders.</p>
  @endif
</div>

@endsection
