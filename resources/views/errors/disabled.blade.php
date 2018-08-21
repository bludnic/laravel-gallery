@extends('base')

@section('content')
  <div class="container">
    <h1 class="is-size-1">Banned</h1>
    <h1 class="is-size-4 mb-2">Your account has been disabled.</h1>
    <a href="{{ url('/') }}" class="button is-primary">Home</a>
  </div>
@endsection