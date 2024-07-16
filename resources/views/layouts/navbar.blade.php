<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('project*') ? 'active' : '' }}" href="{{ url('/project') }}">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('task*') ? 'active' : '' }}" href="{{ url('/task') }}">Tasks</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navBarDropDown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $info['name'] ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navBarDropDown">
                        <!-- <li><a class="dropdown-item" href="#">Profile</a></li> -->
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>