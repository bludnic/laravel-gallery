@extends('admin.base')

@section('content')
  <div class="container">
    <h3 class="is-size-5 mb-2">New comment</h3>
    <div class="columns is-multiline">
      <div class="column is-7">
        <form action="{{ url('admin/comments/create') }}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="field">
            <div class="control">
              <textarea name="text" class="textarea{{ $errors->has('text') ? ' is-danger' : '' }}" placeholder="Comment">{{ old('text') }}</textarea>
            </div>
            @if ($errors->has('text'))
              <p class="help is-danger">{{ $errors->first('text') }}</p>
            @endif
          </div>

          <div class="field">
            <div class="select">
              <select name="image_id">
                <option value="">Select image</option>
                @foreach($images as $image)
                  <option value="{{ $image['id'] }}">{{ $image['name'] }}</option>
                @endforeach
              </select>
            </div>
            @if ($errors->has('image_id'))
              <p class="help is-danger">{{ $errors->first('image_id') }}</p>
            @endif
          </div>

          <div class="field">
            <div class="select">
              <select name="user_id">
                <option value="">Select user</option>
                @foreach($users as $user)
                  <option value="{{ $user['id'] }}">{{ $user['email'] }}</option>
                @endforeach
              </select>
            </div>
            @if ($errors->has('user_id'))
              <p class="help is-danger">{{ $errors->first('user_id') }}</p>
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