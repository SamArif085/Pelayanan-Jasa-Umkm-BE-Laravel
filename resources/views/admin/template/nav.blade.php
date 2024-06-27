<nav class="navbar navbar-expand navbar-light navbar-bg custom-navbar">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="bi bi-list icon-large"></i>
    </a>
    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a id="dropdownMenuButton" class="nav-link" href="#" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-dark">{{ Auth::user()->username }}</span>
                    <i class="bi bi-chevron-down"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right"></i> Log out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
