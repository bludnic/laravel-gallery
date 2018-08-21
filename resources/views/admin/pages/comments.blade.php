@extends('admin.base')

@section('content')
  <div class="container">
    <a href="{{ url('/admin/comments/new') }}" class="button is-primary mb-2">Add new</a>
    <div class="columns is-multiline">
      <div class="column is-12">
        <table class="table is-bordered is-fullwidth">
          <thead>
            <tr>
              <th>ID</th>
              <th>Text</th>
              <th>User</th>
              <th>Image</th>
              <th>Published</th>
              <th style="width: 128px">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($comments as $comment)
              <tr>
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->text }}</td>
                <td>
                  <a href="{{ url('/admin/users/edit/' . $comment->user->id) }}">
                    {{ $comment->user->email }}
                  </a>
                </td>
                <td>
                  <a href="{{ url('/admin/images/edit/' . $comment->image->id) }}">
                    {{ $comment->image->name }}
                  </a>
                </td>
                <td>{{ $comment->created_at->format('d/m/Y H:i:s') }}</td>
                <td>
                  <a href="{{ url('/admin/comments/edit/' . $comment->id) }}" class="button is-primary">
                    <span class="icon is-small">
                      <i class="fas fa-edit"></i>
                    </span>
                  </a>
                  <a href="{{ url('/admin/comments/delete/' . $comment->id) }}" class="button is-danger">
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