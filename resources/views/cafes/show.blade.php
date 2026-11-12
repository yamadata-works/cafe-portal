<x-layout>
    <p><a href="{{ route('cafes.index') }}">← 一覧にもどる</a></p>

    <div class="cafe-detail">
        <h1>{{ $cafe->name }}</h1>
        <p>{{ $cafe->description }}</p>

        <dl>
            <dt>エリア</dt>
            <dd>{{ $cafe->area->name }}</dd>
            <dt>住所</dt>
            <dd>{{ $cafe->address }}</dd>
            <dt>営業時間</dt>
            <dd>{{ $cafe->open_hours }}</dd>
            <dt>予算</dt>
            <dd>{{ $cafe->budget }}円</dd>
            <dt>席数</dt>
            <dd>{{ $cafe->seats }}席</dd>
        </dl>

        <ul class="tag-list">
            @foreach ($cafe->tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
        </ul>
    </div>
</x-layout>