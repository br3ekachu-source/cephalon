<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $artist->name }}</title>
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <style>
        @include('components.styles')
        .hero { text-align:center; padding:48px 0 24px; }
        .hero h1 { font-family: 'Arges', ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji"; font-size: 120px; line-height: 100%; letter-spacing: 0.64px; margin: 50px 0 8px; font-weight: normal; text-transform: uppercase; }
        .hero h1 .sub { display:block; margin-top:8px; margin-bottom:80px; }
        .grid { display:grid; gap: 56px 16px; margin-top: 80px; }
        /* Сетки по брейкпоинтам */
        @media (min-width: 960px) { .grid { grid-template-columns: repeat(3, 1fr); } }
        @media (min-width: 480px) and (max-width: 959.98px) { .grid { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 479.98px) { .grid { grid-template-columns: 1fr; } }
        .card { background: #121215; border-radius: 64px; padding: 16px; display:flex; flex-direction: column; align-items:center; justify-content:space-between; height: 304px; box-shadow: inset 0 0 0 1px rgba(255,255,255,0.03); overflow: visible; transition: all 0.3s ease; text-decoration: none; }
        .card-image-container { flex: 1; display: flex; align-items: center; justify-content: center; }
        .card:hover { background: linear-gradient(135deg, #ff6b9d, #c44569, #f8b500, #ff6b9d); background-size: 400% 400%; animation: gradientShift 2s ease infinite; }
        @keyframes gradientShift { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }
        .card img { max-width: 276px; max-height: 216px; height: auto; object-fit: contain; filter: drop-shadow(0 8px 24px rgba(0,0,0,.45)); border-radius: 12px; transition: transform 0.3s ease; }
        .card:hover img { transform: scale(1.05); }
        .product-name { font-family: 'Arges', ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji"; font-size: 39.81px; font-weight: 1000; text-align: center; color: var(--text); text-transform: uppercase; letter-spacing: 0%; line-height: 100%; text-decoration: none; }
        .card:hover .product-name { color: #fff; }
        .footer { color: var(--muted); font-size:12px; text-align:center; padding: 28px 8px; }
        .back-link { color: var(--muted); text-decoration: none; font-family: 'Geist Mono', monospace; font-size: 19.2px; font-weight: 400; line-height: 16.8px; letter-spacing: 0.06px; text-transform: uppercase; }
        .back-link:hover { color: #fff; }
        .empty-state { grid-column: 1 / -1; background: #121215; border-radius: 64px; padding: 80px 24px; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; box-shadow: inset 0 0 0 1px rgba(255,255,255,0.03); }
        .empty-state-icon { width: 120px; height: 120px; background: linear-gradient(135deg, #ff6b9d, #c44569, #f8b500); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 32px; }
        .empty-state-icon svg { width: 60px; height: 60px; fill: white; }
        .empty-state-title { font-family: 'Arges', ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji"; font-size: 48px; font-weight: normal; text-transform: uppercase; letter-spacing: 0.64px; margin-bottom: 16px; color: var(--text); }
        .empty-state-subtitle { font-family: 'Geist Mono', monospace; font-size: 16px; color: var(--muted); text-transform: uppercase; letter-spacing: 0.06px; }
    </style>
    </head>
<body>
    @include('components.header')
    <div class="container">



        <section class="grid">
            @forelse($artist->products as $product)
                <a class="card" href="{{ $product->external_link }}" target="_blank" rel="noopener" title="{{ $product->name }}">
                    <div class="card-image-container">
                    @if($product->image)
                        <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}">
                    @else
                        <img src="https://via.placeholder.com/480x240?text={{ urlencode($product->name) }}" alt="{{ $product->name }}">
                    @endif
                    </div>
                    <div class="product-name">{{ $product->name }}</div>
                </a>
            @empty
                <div class="empty-state">
                    <div class="empty-state-icon">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 4V2C7 1.45 7.45 1 8 1H16C16.55 1 17 1.45 17 2V4H20C20.55 4 21 4.45 21 5S20.55 6 20 6H19V19C19 20.1 18.1 21 17 21H7C5.9 21 5 20.1 5 19V6H4C3.45 6 3 5.55 3 5S3.45 4 4 4H7ZM9 3V4H15V3H9ZM7 6V19H17V6H7ZM9 8H15C15.55 8 16 8.45 16 9V17C16 17.55 15.55 18 15 18H9C8.45 18 8 17.55 8 17V9C8 8.45 8.45 8 9 8ZM10 10V16H14V10H10Z" fill="currentColor"/>
                        </svg>
                    </div>
                    <div class="empty-state-title">Нет товаров</div>
                    <div class="empty-state-subtitle">Товары появятся скоро</div>
                </div>
            @endforelse
        </section>

    </div>
</body>
</html>


