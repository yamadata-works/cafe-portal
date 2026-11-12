<x-layout>
    <h1>カフェ一覧</h1>

        <form method="GET" action="{{ route('cafes.index') }}">
        <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="カフェ名で検索">
        <button type="submit">検索</button>
    </form>

        <ul>
        @foreach ($cafes as $cafe)
            <li><a href="{{ route('cafes.show', $cafe) }}">{{ $cafe->name }}</a></li>
        @endforeach
    </ul>

    {{ $cafes->links('pagination::bootstrap-4') }}
</x-layout>