<x-layout>
    <h1>管理者ログイン</h1>

    @if ($errors->any())
        <p>{{ $errors->first() }}</p>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <p>
            <label>メールアドレス<br>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </label>
        </p>
        <p>
            <label>パスワード<br>
                <input type="password" name="password" required>
            </label>
        </p>
        <button type="submit">ログイン</button>
    </form>
</x-layout>