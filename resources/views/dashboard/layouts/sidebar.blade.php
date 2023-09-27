<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }} " href="/dashboard">

                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/mahasiswa*') ? 'active' : '' }} "
                    href="/dashboard/mahasiswa">

                    Data Mahasiswa
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/admin*') ? 'active' : '' }}" href="/dashboard/admin">

                    Data Admin
                </a>
            </li>
        </ul>
    </div>
</nav>
