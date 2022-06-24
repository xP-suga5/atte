<div class="nav">
    <h1 class="logo">Atte</h1>

    @auth
    <ul class="nav-list">
        <li class="nav-list-item"><a href="/">ホーム</a></li>
        <li class="nav-list-item"><a href="/attendance">日付一覧</a></li>
        <li class="nav-list-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button :href="route('logout')" onclick="event.preventDefault();
                            this.closest('form').submit();">
                    {{ __('ログアウト') }}
                </button>
            </form>
        </li>
    </ul>
    @endauth
</div>