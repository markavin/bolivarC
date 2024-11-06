<!-- Navbar Blade -->
<nav class="navbar navbar-expand-lg navbar-light bg-light"
    style="width: 250px; height: 50px; padding: 0.1rem 0.1rem; border-radius: 0.9rem;">
    <div class="container-fluid">
        <ul class="navbar-nav ms-auto">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @if (Auth::check())
                                <strong class="user-info me-2">
                                    {{ Auth::user()->namaPengguna }}_
                                    {{ Auth::user()->role ? Auth::user()->role->namaRole : 'Role tidak ditemukan' }}
                                </strong>
                            @else
                                <span class="me-2">User not authenticated</span>
                            @endif
                        </a>

                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#">profile</a></li>
                    <li><a class="dropdown-item" href="#">reset password</a></li>
                    <li><a class="dropdown-item" href="#">else</a></li>
                </ul>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    </div>
    </li>
    </ul>
    </div>
</nav>
