<md-content>
    <md-toolbar class="md-hue-2">
        <div class="md-toolbar-tools">
            <h2 flex md-truncate>
                Laravel Test App
            </h2>
            @if (Auth::guest())
                <md-button href="/auth/login" aria-label="Log in">
                    login
                </md-button>
            @else
                {{ Auth::user()->name }}
                <md-button href="/auth/logout" aria-label="Log out">
                    Log out
                </md-button>
            @endif
        </div>
    </md-toolbar>
</md-content>
