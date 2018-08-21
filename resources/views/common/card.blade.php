<a class="card" style="display:block" href="{{ url('/image/' . $id) }}">
  <div class="card-image">
    <figure class="image is-4by3">
      <div class="card-cover" style="background-image: url('{{ url('/uploads/img/' . $name) }}')"></div>
    </figure>
  </div>
  <div class="card-content">
    <div class="content">
      <p>{{ $description }}</p>
    </div>
  </div>
</a>