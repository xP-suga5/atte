<x-guest-layout>
    <div class="register">
        <h2 class="title">会員登録</h2>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <p class="register-form">
                <input type="name" name="name" id="name" placeholder="名前" class="register-form_text"
                    :value="old('name')" required autofocus>
            </p>
            <p class="register-form">
                <input type="email" name="email" id="email" placeholder="メールアドレス" class="register-form_text"
                    :value="old('email')" required autofocus>
            </p>
            <p class="register-form">
                <input type="password" name="password" placeholder="パスワード" class="register-form_text" required
                    autocomplete="new-password">
            </p>
            <p class="register-form">
                <input type="password_confirmation" name="password_confirmation" placeholder="確認用パスワード"
                    class="register-form_text" required>
            </p>
            <p><input type="submit" value="会員登録" class="register-form_submit"></p>
        </form>

        <p class="register-info">アカウントをお持ちの方はこちらから</p>
        <div class="register-info-link">
            <a class="" href="{{ route('login') }}">
                {{ __('ログイン') }}
            </a>
        </div>
    </div>
</x-guest-layout>