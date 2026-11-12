<x-layout>
    <h1>カフェを登録</h1>

    <form method="POST" action="{{ route('admin.cafes.store') }}">
        @csrf
        @include('admin.cafes._form')
        <button type="submit">登録する</button>
    </form>

    <p><a href="{{ route('admin.cafes.index') }}">もどる</a></p>
</x-layout>