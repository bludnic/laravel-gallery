@extends('admin.base')

@section('content')
  <div class="container">
    <div style="display:flex">
      <a href="{{ url('/admin/images/new') }}" class="button is-primary mb-2">Add new</a>
      <div class="select" style="margin-left:auto">
        <select id="sort_by_user" name="sort_by_user" data-url="{{ url('/admin/images') }}">
          <option value="">Select user</option>
          @foreach($users as $user)
          <option value="{{ $user->id }}"{{ $user->id == $user_id ? ' selected' : '' }}>{{ $user->email }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="columns is-multiline">
      <div class="column is-12">
        <table class="table is-bordered is-fullwidth">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Author</th>
              <th>Published</th>
              <th style="width: 128px">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($images as $image)
              <tr>
                <td>{{ $image->id }}</td>
                <td>
                  <a target="_blank" href="{{ url('uploads/img/' . $image->name) }}">{{ $image->name }}</a>
                </td>
                <td>
                  <a href="{{ url('/admin/users/edit/' . $image->user->id) }}">
                    {{ $image->user->email }}
                  </a>
                </td>
                <td>{{ $image->created_at->format('d/m/Y H:i:s') }}</td>
                <td>
                  <a href="{{ url('/admin/images/edit/' . $image->id) }}" class="button is-primary">
                    <span class="icon is-small">
                      <i class="fas fa-edit"></i>
                    </span>
                  </a>
                  <a href="{{ url('/admin/images/delete/' . $image->id) }}" class="button is-danger">
                    <span class="icon is-small">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5">No images</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection