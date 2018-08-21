@extends('admin.base')

@section('content')
  <div class="container">
    <h3 class="is-size-5 mb-2">Edit comment</h3>
    <div class="columns is-multiline">
      <div class="column is-7">
        <form action="{{ url('admin/comments/update/' . $comment->id) }}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="field">
            <div class="control">
              <input class="input" type="text" disabled value="ID: {{ $comment->id }}">
            </div>
          </div>

          <div class="field">
            <div class="control">
              <textarea name="text" class="textarea{{ $errors->has('text') ? ' is-danger' : '' }}" placeholder="Comment">{{ $comment->text }}</textarea>
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
                  <option value="{{ $image['id'] }}"{{ $image['id'] === $comment['image_id'] ? ' selected' : '' }}>{{ $image['name'] }}</option>
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
                  <option value="{{ $user['id'] }}"{{ $user['id'] === $comment['user_id'] ? ' selected' : '' }}>{{ $user['email'] }}</option>
                @endforeach
              </select>
              @if ($errors->has('user_id'))
                <p class="help is-danger">{{ $errors->first('user_id') }}</p>
              @endif
            </div>
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