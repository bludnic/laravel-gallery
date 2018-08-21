@extends('base')

@section('content')
  <div class="container">
    <h1 class="is-size-1">403 Forbidden</h1>
    <h1 class="is-size-4 mb-2">You do not have permission for this action.</h1>
    <a href="{{ URL::previous() }}" class="button is-primary">Back</a>
  </div>
@endsection