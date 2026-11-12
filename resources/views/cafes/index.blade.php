<x-layout>
    <h1>カフェ一覧</h1>

    <ul>
        @foreach ($cafes as $cafe)
            <li>{{ $cafe->name }}</li>
        @endforeach
    </ul>

    {{ $cafes->links('pagination::bootstrap-4') }}
</x-layout>