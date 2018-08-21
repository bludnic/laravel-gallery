@extends('admin.base')

@section('content')
  <div class="container">
    <h3 class="is-size-5 mb-2">New user</h3>
    <div class="columns is-multiline">
      <div class="column is-7">
        <form action="{{ url('/admin/users/create/') }}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="field">
            <div class="control has-icons-left has-icons-right">
              <input name="name" class="input{{ $errors->has('name') ? ' is-danger' : '' }}" type="text" value="{{ old('name') }}" placeholder="Name">
              <span class="icon is-small is-left">
                <i class="fas fa-user"></i>
              </span>
            </div>
            @if ($errors->has('name'))
              <p class="help is-danger">{{ $errors->first('name') }}</p>
            @endif
          </div>

          <div class="field">
            <div class="control has-icons-left has-icons-right">
              <input name="email" class="input{{ $errors->has('email') ? ' is-danger' : '' }}" type="email" value="{{ old('email') }}" placeholder="E-mail">
              <span class="icon is-small is-left">
                <i class="fas fa-envelope"></i>
              </span>
            </div>
            @if ($errors->has('email'))
              <p class="help is-danger">{{ $errors->first('email') }}</p>
            @endif
          </div>

          <div class="field">
            <div class="control has-icons-left has-icons-right">
              <input name="password" class="input{{ $errors->has('password') ? ' is-danger' : '' }}" type="password" placeholder="Password">
              <span class="icon is-small is-left">
                <i class="fas fa-lock"></i>
              </span>
            </div>
            @if ($errors->has('password'))
              <p class="help is-danger">{{ $errors->first('password') }}</p>
            @endif
          </div>

          <div class="field">
            <div class="control has-icons-left has-icons-right">
              <input class="input" name="password_confirmation" type="password" placeholder="Confirm Password">
              <span class="icon is-small is-left">
                <i class="fas fa-lock"></i>
              </span>
            </div>
          </div>

          <div class="field">
            <div class="control">
              <button class="button is-link" type="submit">Create</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
@endsection