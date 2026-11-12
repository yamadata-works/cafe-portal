<x-layout>
    <h1>{{ $cafe->name }}</h1>

    <p>エリア：{{ $cafe->area->name }}</p>
    <p>住所：{{ $cafe->address }}</p>
    <p>営業時間：{{ $cafe->open_hours }}</p>
    <p>予算：{{ $cafe->budget }}円</p>
    <p>席数：{{ $cafe->seats }}席</p>
    <p>{{ $cafe->description }}</p>

    <ul>
        @foreach ($cafe->tags as $tag)
            <li>{{ $tag->name }}</li>
        @endforeach
    </ul>

    <a href="{{ route('cafes.index') }}">一覧にもどる</a>
</x-layout>