@extends('base')

@section('content')
  <div class="container">
    <div class="columns is-multiline">
      @forelse ($images as $image)
        <div class="column is-4">
          @include('common.card', $image)
        </div>
      @empty
        <div class="column">
          <p class="is-size-4 mb-2">No pictures, but you can add something.</p>
          <div>
            <a href="{{ url('/image/upload') }}" class="button">Upload</a>
          </div>
        </div>
      @endforelse
    </div>
  </div>
@endsection