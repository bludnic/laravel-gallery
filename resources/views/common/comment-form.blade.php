<form action="{{ url('/comment/' . $image->id) }}" method="POST" enctype="multipart/form-data" class="mt-2">
  {{ csrf_field() }}

  <div class="field">
    <div class="control">
      <textarea class="textarea{{ $errors->has('text') ? ' is-danger' : '' }}" placeholder="Your comment here..." name="text" value="{{ old('text') }}"></textarea>
      @if ($errors->has('text'))
        <p class="help is-danger">{{ $errors->first('text') }}</p>
      @endif
    </div>
  </div>

  <div class="field">
    <div class="control">
      <button class="button is-primary" type="submit">Comment</button>
    </div>
  </div>
</form>