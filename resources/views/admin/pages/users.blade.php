@extends('admin.base')

@section('content')
  <div class="container">
    <a href="{{ url('/admin/users/new') }}" class="button is-primary mb-2">Add new</a>
    <div class="columns is-multiline">
      <div class="column is-12">
        <table class="table is-bordered is-fullwidth">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>E-mail</th>
              <th style="width: 128px">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
              <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                  <a href="{{ url('/admin/users/edit/' . $user->id) }}" class="button is-primary">
                    <span class="icon is-small">
                      <i class="fas fa-edit"></i>
                    </span>
                  </a>
                  <a href="{{ url('/admin/users/delete/' . $user->id) }}" class="button is-danger">
                    <span class="icon is-small">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection