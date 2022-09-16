<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand me-5" href="{{ route('admin.home') }}">LARAVEL | COMICS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.home') ? 'active' : '' }}" aria-current="page" href="{{ route('admin.home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('comics.index') ? 'active' : '' }}" href="{{ route('comics.index') }}">Comics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('comics.create') ? 'active' : '' }}" href="{{ route('comics.create') }}">Add a new comic</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    Laravel Base Crud
                </span>
            </div>
        </div>
    </nav>
</header>