<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            NBA teams
        </a>
        
        <ul class="navbar-nav mr-auto">
            @guest
            <li class="nav-item">
                <a class="nav-link" href="/register">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
            </li>
            @endguest

            @auth
            <li class="nav-item">
                <span class="nav-link">{{auth()->user()->name}}</a>
            </li>
            <li class="nav-item">
                <form method="POST" action="/logout">
                    @csrf
                    <button class="btn btn-link nav-link" type="submit">Logout</button>
                </form>
            </li>
            @endauth
        </ul>
    </div>
</nav>