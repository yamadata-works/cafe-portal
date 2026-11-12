<x-layout>
    <h1>カフェ一覧</h1>

    <form method="GET" action="{{ route('cafes.index') }}" class="search-form">
        <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="カフェ名で検索">
        <select name="area_id">
            <option value="">すべてのエリア</option>
            @foreach ($areas as $area)
                <option value="{{ $area->id }}" @selected(request('area_id') == $area->id)>{{ $area->name }}</option>
            @endforeach
        </select>
        <select name="tag_id">
            <option value="">すべてのタグ</option>
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}" @selected(request('tag_id') == $tag->id)>{{ $tag->name }}</option>
            @endforeach
        </select>
        <button type="submit">検索</button>
    </form>

    <p class="result-count">{{ $cafes->total() }}件のカフェ</p>

    <ul class="cafe-list">
        @forelse ($cafes as $cafe)
            <li>
                <a href="{{ route('cafes.show', $cafe) }}">
                    <span class="cafe-name">{{ $cafe->name }}</span>
                    <span class="cafe-meta">{{ $cafe->area->name }}・予算 {{ $cafe->budget }}円</span>
                </a>
            </li>
        @empty
            <li class="empty">条件に合うカフェが見つかりませんでした。</li>
        @endforelse
    </ul>

    {{ $cafes->links('pagination::bootstrap-4') }}
</x-layout>