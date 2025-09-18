<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Админ‑панель — Главная</title>
    <link rel="icon" href="/favicon.ico">
    <style>
        :root { --bg: #0b0b0d; --panel:#121215; --text:#f7f7f7; --muted:#aeb0b6; --primary:#4cc3ff; }
        * { box-sizing: border-box; }
        body { margin: 0; background: radial-gradient(1200px 600px at 20% -10%, #141418, transparent), radial-gradient(1200px 600px at 80% -10%, #101016, transparent), var(--bg); color: var(--text); font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji"; }
        .container { width: 100%; margin: 0 auto; padding: 24px; max-width: 1312px; }
        @media (max-width: 1311.98px) { .container { max-width: 960px; } }
        @media (max-width: 959.98px) { .container { max-width: 350px; padding: 16px; } }
        header { display:flex; align-items:center; justify-content:space-between; gap:16px; }
        .brand { display:flex; align-items:center; gap:12px; font-weight:700; }
        .brand__logo { width:32px; height:32px; border-radius:6px; display:grid; place-items:center; background:#1a1a1f; color:#fff; font-size:18px; }
        nav a { color: var(--muted); text-decoration:none; margin-left:16px; font-size:14px; }
        nav a:hover { color: #fff; }
        .hero { text-align:left; padding:48px 0 24px; }
        .hero h1 { font-size: clamp(28px, 4vw + 8px, 56px); line-height: 1.05; letter-spacing: 1px; margin: 0 0 8px; font-weight: 900; }
        .hero h1 .sub { display:block; font-size: .82em; margin-top:8px; color:#d5eeff; text-shadow: 0 2px 0 #1d3b4d; }
        .grid { display:grid; gap:16px; }
        /* Сетки по брейкпоинтам */
        @media (min-width: 1312px) { .grid { grid-template-columns: repeat(3, 1fr); } }
        @media (min-width: 960px) and (max-width: 1311.98px) { .grid { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 959.98px) { .grid { grid-template-columns: 1fr; } }
        /* Заполнение последнего ряда на 3-колоночной сетке */
        @media (min-width: 1312px) {
            .grid > .card { grid-column: span 1; }
            /* если остался 1 элемент */
            .grid > .card:last-child:nth-child(3n + 1) { grid-column: span 3; }
            /* если осталось 2 элемента */
            .grid > .card:nth-last-child(2):nth-child(3n + 1),
            .grid > .card:nth-last-child(2):nth-child(3n + 2) { grid-column: span 2; }
        }
        .card { background: #121215; border-radius: 18px; padding: 24px; display:flex; align-items:center; justify-content:center; height: 304px; box-shadow: inset 0 0 0 1px rgba(255,255,255,0.03); overflow: visible; }
        .card img { max-width: 276px; height: auto; object-fit: contain; filter: drop-shadow(0 8px 24px rgba(0,0,0,.45)); border-radius: 12px; }
        .footer { color: var(--muted); font-size:12px; text-align:center; padding: 28px 8px; }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="brand">
                <div class="brand__logo">A</div>
                <div>Артисты & Магазины</div>
            </div>
            <nav>
                <a href="#">Главная</a>
                <a href="#">Каталог</a>
                <a href="#">Контакты</a>
            </nav>
        </header>

        <section class="hero">
            <h1>
                Соединяем артистов и фанатов
                <span class="sub">по одному магазину за раз</span>
            </h1>
        </section>

        <section class="grid">
            @forelse ($artists as $artist)
                <a class="card" href="{{ route('public.artist', $artist) }}" title="{{ $artist->name }}">
                    @if($artist->image)
                        <img src="{{ asset('storage/'.$artist->image) }}" alt="{{ $artist->name }}">
                    @else
                        <img src="https://via.placeholder.com/320x180?text={{ urlencode($artist->name) }}" alt="{{ $artist->name }}">
                    @endif
                </a>
            @empty
                <div class="card" style="grid-column: 1 / -1; min-height: 120px;">
                    Пока нет артистов.
                </div>
            @endforelse
        </section>

        <div class="footer">© {{ date('Y') }} Артисты & Магазины</div>
    </div>
</body>
</html>
