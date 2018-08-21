<div class="comments">
  @foreach($comments as $comment)
    <article class="media">
      <figure class="media-left">
        <p class="image is-64x64">
          <img src="https://bulma.io/images/placeholders/128x128.png">
        </p>
      </figure>
      <div class="media-content">
        <div class="content">
          <p>
            <strong>{{ $comment->user->name }}</strong>
            <small>{{ $comment->user->email }}</small>
            <small>{{ $comment->created_at->diffForHumans() }}</small>
            <br>
            {{ $comment->text }}
          </p>
        </div>
      </div>
      <div class="media-right">
        @can('delete', $comment)
          <a href="{{ url('/comment/delete/' . $comment->id) }}" class="delete"></a>
        @endcan
      </div>
    </article>
  @endforeach
</div>