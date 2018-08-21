@extends('base')

@section('content')
  <div class="container">
    <div class="columns is-multiline">
      <div class="column is-7" style="position:relative">
        @can('delete', $image)
          <a href="{{ url('/image/delete/' . $image->id) }}" class="delete" style="position:absolute;right:0"></a>
        @endcan
        <img src="{{ url('/uploads/img/' . $image->name) }}">
        <div>{{ $image['description'] }}</div>
      </div>

      <div class="column is-7">
        <h3 class="is-size-5 mb-2">Comments</h3>
        @include('common.comments', $comments)
        @include('common.comment-form', $image)
      </div>
    </div>
  </div>
@endsection