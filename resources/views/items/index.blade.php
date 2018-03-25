@extends('layouts.app')

@section('content')

<div class="items-box">
  <h2>Items ter leen aangeboden</h2>
  <ul class="items-list">
    <li>Fake ITEM</li>
    <li>Fake ITEM</li>
    <li>Fake ITEM</li>
  </ul>
  <p>Niet weergeven wanneer er geen zijn</p>
  <p>Items kunnen accepteren</p>
</div>
<div class="items-box">
  <h2>Geretourde items</h2>
  <p>Niet weergeven wanneer er geen zijn</p>
  <p>Items kunnen accepteren</p>
  <p>na hoe lang zijn ze retour</p>
</div>


<div class="items-box">
  <h2>Mijn items</h2>
  @if (count($myItems) > 0)
    <ul class="items-list">
    @foreach ($myItems as $item)
      <li>
        <div class="item-description">
          <h3>{{$item->name}}</h3>
          <small>{{$item->description}}</small>
        </div>
        <div class="item-status">
          {{$item->state->state_description}}
        </div>
        <div class="item-actions">
          @if ($item->state_id == 1)
            <a href="/items/{{$item->id}}/edit">Leen aan iemand uit</a>
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
  <h2>Geleende items</h2>
  @if (count($lentItems) > 0)
    <ul class="items-list">
    @foreach ($lentItems as $item)
      <li>
        <div class="item-description">
          <h3>{{$item->name}}</h3>
          <small>{{$item->description}}</small>
        </div>
        <div class="item-status">
          Uitgeleend: {{$item->updated_at->diffForHumans()}}
        </div>
        <div class="item-actions">
          @if ($item->state_id == 1)
            <button type="button" name="button">Leen uit</button>
          @endif
        </div>
      </li>
    @endforeach
  </ul>
  @else
    <p>Je hebt geen items geleend van iemand anders.</p>
  @endif
  <p>Hoelang is het al ter leen</p>
</div>

@endsection
