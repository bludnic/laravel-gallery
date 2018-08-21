@extends('admin.base')

@section('content')
  <div class="container">
    <h3 class="is-size-5 mb-2">Edit image</h3>
    <div class="columns is-multiline">
      <div class="column is-7">
        <form action="{{ url('admin/images/update/' . $image->id) }}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="field">
            <div class="control">
              <input class="input" type="text" disabled value="ID: {{ $image->id }}">
            </div>
          </div>

          <div class="field">
            <div class="control">
              <textarea class="textarea" placeholder="Description" name="description">{{ $image->description }}</textarea>
            </div>
          </div>

          <div class="field">
            <div class="select">
              <select name="category_id">
                <option value="">Select category</option>
                @foreach($categories as $category)
                  <option value="{{ $category['id'] }}"{{ $category['id'] === $image['category_id'] ? ' selected' : '' }}>{{ $category['name'] }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="field">
            <div class="control">
              <label class="checkbox">
                <input type="checkbox" name="private" {{ $image->private ? 'checked' : '' }}>
                Private
              </label>
            </div>
            @if ($errors->has('private'))
              <p class="help is-danger">{{ $errors->first('private') }}</p>
            @endif
          </div>

          <div class="field">
            <div class="control">
              <button class="button is-link" type="submit">Update</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
@endsection