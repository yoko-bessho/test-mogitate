@props(['src', 'alt', 'name', 'price',])

<div class="product-card">
  <div class="card__img">
    <img src="{{ $src }}" alt="{{ $alt }}" />
  </div>
  <div class="card__content">
    <div class="card__content-tag">
      <span class="card__content-tag-item">{{ $name }}</span>
      <span class="card__content-tag-item card__content-tag-item--last">¥{{ $price }}
      </span>
    </div>
  </div>
</div>


