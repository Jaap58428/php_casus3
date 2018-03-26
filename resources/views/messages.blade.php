@if (count($errors) > 0)
  @foreach ($errors->all() as $error)
    <div class="alert-bad">
      {{$error}}
    </div>
  @endforeach
@endif

@if (session('success'))
  <div class="alert-good">
    {{session('success')}}
  </div>
@endif

@if (session('error'))
  <div class="alert-bad">
    {{session('error')}}
  </div>
@endif
