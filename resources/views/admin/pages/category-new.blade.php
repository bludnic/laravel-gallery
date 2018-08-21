@extends('admin.base')

@section('content')
  <div class="container">
    <h3 class="is-size-5 mb-2">New category</h3>
    <div class="columns is-multiline">
      <div class="column is-7">
        <form action="{{ url('admin/categories/create') }}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="field">
            <div class="control">
              <input class="input{{ $errors->has('name') ? ' is-danger' : '' }}" type="text" placeholder="Name" name="name" value="{{ old('name') }}">
            </div>
            @if ($errors->has('name'))
              <p class="help is-danger">{{ $errors->first('name') }}</p>
            @endif
          </div>

          <div class="field">
            <div class="control">
              <button class="button is-link">Create</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection