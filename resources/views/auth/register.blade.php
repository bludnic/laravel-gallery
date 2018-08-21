@extends('base')

@section('content')
  <div class="container">
    <div class="columns is-multiline">

      <div class="column is-7">
        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="field">
            <div class="control has-icons-left has-icons-right">
              <input class="input{{ $errors->has('name') ? ' is-danger' : '' }}" name="name" type="text" placeholder="Name" value="{{ old('name') }}">
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
              <input class="input{{ $errors->has('email') ? ' is-danger' : '' }}" name="email" type="email" placeholder="E-mail" value="{{ old('email') }}">
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
              <input class="input{{ $errors->has('password') ? ' is-danger' : '' }}" name="password" type="password" placeholder="Password">
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
              <button class="button is-primary" type="submit">Register</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection