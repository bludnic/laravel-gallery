@extends('admin.base')

@section('content')
  <div class="container">
    <h3 class="is-size-5 mb-2">New image</h3>
    <div class="columns is-multiline">
      <div class="column is-7">
        <form action="{{ url('admin/images/create') }}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="field">
            <div class="file">
              <label class="file-label">
                <input class="file-input" type="file" name="image" accept=".jpg, .jpeg, .png">
                <span class="file-cta">
                  <span class="file-icon">
                    <i class="fas fa-upload"></i>
                  </span>
                  <span class="file-label">
                    Choose an image…
                  </span>
                </span>
              </label>
            </div>
            @if ($errors->has('image'))
              <p class="help is-danger">{{ $errors->first('image') }}</p>
            @endif
          </div>

          <div class="field">
            <div class="control">
              <textarea class="textarea" placeholder="Description" name="description">{{ old('description') }}</textarea>
            </div>
            @if ($errors->has('description'))
              <p class="help is-danger">{{ $errors->first('description') }}</p>
            @endif
          </div>

          <div class="field">
            <div class="select">
              <select name="category_id">
                <option value="">Select category</option>
                @foreach($categories as $category)
                  <option value="{{ $category['id'] }}"{{ $category['id'] == old('category_id') ? ' selected' : '' }}>{{ $category['name'] }}</option>
                @endforeach
              </select>
            </div>
            @if ($errors->has('category_id'))
              <p class="help is-danger">{{ $errors->first('category_id') }}</p>
            @endif
          </div>

          <div class="field">
            <div class="control">
              <label class="checkbox">
                <input type="checkbox" name="private" {{ old('private') ? 'checked' : '' }}>
                Private
              </label>
            </div>
            @if ($errors->has('private'))
              <p class="help is-danger">{{ $errors->first('private') }}</p>
            @endif
          </div>

          <div class="field">
            <div class="control">
              <button class="button is-link" type="submit">Upload</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
@endsection