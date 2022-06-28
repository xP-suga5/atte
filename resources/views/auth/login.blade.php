<x-guest-layout>
    <div class="login">
        <h2 class="title">ログイン</h2>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <p class="login-form">
                <input type="email" name="email" id="email" placeholder="メールアドレス" class="login-form_text" :value="old('email')"
                    required autofocus>
            </p>
            <p class="login-form">
                <input type="password" name="password" placeholder="パスワード" class="login-form_text" required
                    autocomplete="current-password">
            </p>
            <p><input type="submit" value="ログイン" class="login-form_submit"></p>
        </form>

        <div class="login-info-link">
            <p class="login-info">アカウントをお持ちでない方はこちらから</p>
            <a href="{{ route('register') }}" class="login-info-link_a">
                {{ __('会員登録') }}
            </a>
        </div>
    </div>
</x-guest-layout>