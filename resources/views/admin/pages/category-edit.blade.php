@extends('admin.base')

@section('content')
  <div class="container">
    <h3 class="is-size-5 mb-2">Edit category</h3>
    <div class="columns is-multiline">
      <div class="column is-7">
        <form action="{{ url('admin/categories/update/' . $category->id) }}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="field">
            <div class="control">
              <input class="input" type="text" disabled value="ID: {{ $category->id }}">
            </div>
          </div>

          <div class="field">
            <div class="control">
              <input class="input{{ $errors->has('name') ? ' is-danger' : '' }}" type="text" placeholder="Name" name="name" value="{{ $category->name }}">
            </div>
            @if ($errors->has('name'))
              <p class="help is-danger">{{ $errors->first('name') }}</p>
            @endif
          </div>

          <div class="field">
            <div class="control">
              <button class="button is-link">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection