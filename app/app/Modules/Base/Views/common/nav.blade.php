<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">
                Laravel Test App
            </a>
            @if (Auth::guest())
                <a class="navbar-brand pull-right" href="/auth/login">
                    login
                </a>
            @else
                <span class="navbar-brand">{{ Auth::user()->name }}</span>

                <a class="navbar-brand pull-right" href="/auth/logout">
                    log out
                </a>
            @endif
        </div>
    </div>
</nav>
