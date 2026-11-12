<x-layout>
    <h1>カフェ管理</h1>

    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <p><a href="{{ route('admin.cafes.create') }}">新しく登録する</a></p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">ログアウト</button>
    </form>

    <table border="1">
        <tr>
            <th>店名</th>
            <th>エリア</th>
            <th>操作</th>
        </tr>
        @foreach ($cafes as $cafe)
            <tr>
                <td>{{ $cafe->name }}</td>
                <td>{{ $cafe->area->name }}</td>
                <td>
                    <a href="{{ route('admin.cafes.edit', $cafe) }}">編集</a>
                    <form method="POST" action="{{ route('admin.cafes.destroy', $cafe) }}" style="display:inline" onsubmit="return confirm('削除しますか？')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">削除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $cafes->links('pagination::bootstrap-4') }}
</x-layout>