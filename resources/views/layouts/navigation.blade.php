<div class="nav">
    <h1 class="logo">Atte</h1>

    @auth
    <div class="nav-menu">
        <ul class="nav-list">
            <li class="nav-list-item"><a href="/" class="nav-list-item_a">ホーム</a></li>
            <li class="nav-list-item"><a href="/attendance" class="nav-list-item_a">日付一覧</a></li>
            <li class="nav-list-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button :href="route('logout')" onclick="event.preventDefault();
                            this.closest('form').submit();" class="nav-list-item_button">
                        {{ __('ログアウト') }}
                    </button>
                </form>
            </li>
        </ul>
    </div>

    <div class="menu" id="menu">
        <span class="menu-line-top"></span>
        <span class="menu-line-middle"></span>
        <span class="menu-line-bottom"></span>
    </div>
    <nav class="drawer-nav" id="drawer-nav">
        <ul class="drawer-nav-list">
            <li class="drawer-nav-list-item"><a href="/" class="nav-list-item_a">ホーム</a></li>
            <li class="drawer-nav-list-item"><a href="/attendance" class="nav-list-item_a">日付一覧</a></li>
            <li class="drawer-nav-list-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button :href="route('logout')" onclick="event.preventDefault();
                            this.closest('form').submit();" class="drawer-nav-list-item_button">
                        {{ __('ログアウト') }}
                    </button>
                </form>
            </li>
        </ul>
    </nav>
    @endauth
</div>