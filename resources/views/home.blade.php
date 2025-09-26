<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CEPHALON</title>
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <style>
        @include('components.styles')
        .grid { display:grid; gap: 56px 16px; }
        /* Сетки по брейкпоинтам */
        @media (min-width: 1312px) { .grid { grid-template-columns: repeat(6, 1fr); } }
        @media (min-width: 960px) and (max-width: 1311.98px) { .grid { grid-template-columns: repeat(4, 1fr); } }
        @media (max-width: 959.98px) { .grid { grid-template-columns: 1fr; } }
        /* Заполнение последнего ряда на 6-колоночной сетке */
        @media (min-width: 1312px) {
            .grid > .card { grid-column: span 2; }
            /* если остался 1 элемент */
            .grid > .card:last-child:nth-child(3n + 1) { grid-column: span 6; }
            /* если осталось 2 элемента - каждый занимает по 3 колонки */
            .grid > .card:nth-last-child(2):nth-child(3n + 1) { grid-column: span 3; }
            .grid > .card:nth-last-child(1):nth-child(3n + 2) { grid-column: span 3; }
        }
        /* Заполнение последнего ряда на 4-колоночной сетке */
        @media (min-width: 960px) and (max-width: 1311.98px) {
            .grid > .card { grid-column: span 2; }
            /* если остался 1 элемент */
            .grid > .card:last-child:nth-child(2n + 1) { grid-column: span 4; }
        }
        .card { background: #121215; border-radius: 64px; padding: 24px; display:flex; align-items:center; justify-content:center; height: 304px; box-shadow: inset 0 0 0 1px rgba(255,255,255,0.03); overflow: visible; transition: all 0.3s ease; }
        .card:hover { background: linear-gradient(135deg, #ff6b9d, #c44569, #f8b500, #ff6b9d); background-size: 400% 400%; animation: gradientShift 2s ease infinite; }
        @keyframes gradientShift { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }
        .card img { max-width: 276px; height: auto; object-fit: contain; filter: drop-shadow(0 8px 24px rgba(0,0,0,.45)); border-radius: 12px; transition: transform 0.3s ease; }
        .card:hover img { transform: scale(1.05); }
        .footer { color: var(--muted); font-size:12px; text-align:center; padding: 28px 8px; }
    </style>
</head>
<body>
    @include('components.header')
    <div class="container">

        <section class="hero">
            <h1>
            Connecting Artists & Fans
                <span class="sub">One Store at a Time</span>
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
                    No artists yet.
                </div>
            @endforelse
        </section>

    </div>
</body>
</html>
