<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>カフェ検索ポータル</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <p><a href="{{ route('cafes.index') }}">カフェ検索ポータル</a></p>
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer>
        <p>掲載データはすべて架空です</p>
    </footer>
</body>
</html>