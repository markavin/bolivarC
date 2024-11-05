<!-- Navbar Blade -->
<nav class="navbar navbar-expand-lg navbar-light bg-light"
    style="max-width: 120px; padding: 0.1rem 0.2rem; border-radius: 0.9rem;">
    <div class="container-fluid">
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex flex-column text-start">
                        @if (Auth::check())
                            <strong class="user-info">
                                {{ Auth::user()->namaPengguna }}_
                                {{ Auth::user()->role ? Auth::user()->role->namaRole : 'Role tidak ditemukan' }} -
                                {{ Auth::user()->id }}
                            </strong>
                        @else
                            <span>User not authenticated</span>
                            @endif
                    </div>
                </a>
            </li>
        </ul>
    </div>
</nav>
