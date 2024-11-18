<nav class="navbar navbar-expand-lg navbar-light bg-light" style="max-width: 180px; padding: 0.3rem 0.5rem; border-radius: 0.5rem;">
    <div class="container-fluid">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex flex-column text-start">
                        <strong>{{ session('user.namaPengguna') }}_{{ session('user.id_role') }}</strong>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#profileModal">Profile</a></li>
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#resetPasswordModal">Reset Password</a></li>
                    {{-- <li><hr class="dropdown-divider"></li> --}}
                    {{-- <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li> --}}
                </ul>
            </li>
        </ul>
    </div>
</nav>
