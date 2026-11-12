<x-layout>
    <h1>カフェ一覧</h1>

        <form method="GET" action="{{ route('cafes.index') }}">
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

        <ul>
        @foreach ($cafes as $cafe)
            <li><a href="{{ route('cafes.show', $cafe) }}">{{ $cafe->name }}</a></li>
        @endforeach
    </ul>

    {{ $cafes->links('pagination::bootstrap-4') }}
</x-layout>