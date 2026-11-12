<x-layout>
    <h1>カフェを編集</h1>

    <form method="POST" action="{{ route('admin.cafes.update', $cafe) }}">
        @csrf
        @method('PUT')
        @include('admin.cafes._form')
        <button type="submit">更新する</button>
    </form>

    <p><a href="{{ route('admin.cafes.index') }}">もどる</a></p>
</x-layout>