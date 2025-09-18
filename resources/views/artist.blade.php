<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $artist->name }} — Артист</title>
    <link rel="icon" href="/favicon.ico">
    <style>
        :root { --bg:#0b0b0d; --panel:#121215; --text:#f7f7f7; --muted:#aeb0b6; }
        *{ box-sizing:border-box; }
        body{ margin:0; background: var(--bg); color:var(--text); font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial; }
        .container{ width:100%; margin:0 auto; padding:24px; max-width:1312px; }
        @media (max-width: 1311.98px) { .container { max-width: 960px; } }
        @media (max-width: 959.98px) { .container { max-width: 350px; padding:16px; } }
        a{ color:#9bd4ff; text-decoration:none; }
        header{ display:flex; align-items:center; gap:16px; }
        .avatar{ width:72px; height:72px; border-radius:16px; background:#1a1a1f; display:grid; place-items:center; overflow:hidden; }
        .avatar img{ width:100%; height:100%; object-fit:cover; }
        h1{ margin:0; font-size: clamp(22px, 3vw + 8px, 40px); }
        .grid{ display:grid; gap:16px; margin-top:24px; }
        @media (min-width: 1312px) { .grid{ grid-template-columns: repeat(3, minmax(0,1fr)); } }
        @media (min-width: 960px) and (max-width: 1311.98px) { .grid{ grid-template-columns: repeat(2, minmax(0,1fr)); } }
        @media (max-width: 959.98px) { .grid{ grid-template-columns: 1fr; } }
        .card{ background:var(--panel); border-radius:16px; padding:16px; display:flex; flex-direction:column; gap:12px; }
        .card img{ width:100%; height:180px; object-fit:contain; border-radius:12px; background:#0f0f12; }
        .name{ font-weight:700; }
        .external{ color:#9bd4ff; font-size:14px; }
        .back{ color:var(--muted); font-size:14px; margin-left:auto; }
    </style>
    </head>
<body>
    <div class="container">
        <div style="display:flex; align-items:center; gap:16px;">
            <div class="avatar">
                @if($artist->image)
                    <img src="{{ asset('storage/'.$artist->image) }}" alt="{{ $artist->name }}">
                @else
                    <img src="https://via.placeholder.com/256?text={{ urlencode($artist->name) }}" alt="{{ $artist->name }}">
                @endif
            </div>
            <h1>{{ $artist->name }}</h1>
            <a class="back" href="{{ url('/') }}">На главную</a>
        </div>

        <div class="grid">
            @forelse($artist->products as $product)
                <a class="card" href="{{ $product->external_link }}" target="_blank" rel="noopener" title="{{ $product->name }}">
                    @if($product->image)
                        <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}">
                    @else
                        <img src="https://via.placeholder.com/480x240?text={{ urlencode($product->name) }}" alt="{{ $product->name }}">
                    @endif
                    <div class="name">{{ $product->name }}</div>
                    <div class="external">Перейти в магазин →</div>
                </a>
            @empty
                <div class="card" style="grid-column:1/-1;">Пока нет товаров.</div>
            @endforelse
        </div>
    </div>
</body>
</html>


