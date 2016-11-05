<div class="box">
  <article class="media">
    <div class="media-left">
      <figure class="image is-64x64">
        <img src="{{ $image or 'http://placehold.it/128x128' }}" alt="Image">
      </figure>
    </div>
    <div class="media-content">
      <div class="content">
        <h3>{!! $title !!}</h3>
        <p>{!! $content !!}</p>
      </div>
    </div>
    </article>
</div>
