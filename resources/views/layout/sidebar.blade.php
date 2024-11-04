<div class="sidebar" id="sidebar">
    <img src="{{ asset('/img/logoobaru.png') }}" alt="Logo" class="logo">
    <h2>Bolívar Coffee</h2>
    <h3 class="bx bx-chevron-right toggle" id="sidebarToggle"></h3>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" />

    <ul class="menu">
        <li class="{{ Request::is('dashboard/home') ? 'active' : '' }}">
            <a href="{{ url('Bolivar/dashboard/home') }}"
                style="display: flex; align-items: center; text-decoration: none; color: inherit;">
                <span class="material-symbols-outlined">home</span> Home
            </a>
        </li>
        @if (Auth::check() && Auth::user()->role->namaRole === 'pegawai')
            <li class="{{ Request::is('dashboard/customers') ? 'active' : '' }}">
                <a href="{{ url('Bolivar/dashboard/customers') }}"
                    style="display: flex; align-items: center; text-decoration: none; color: inherit;">
                    <span class="material-symbols-outlined">groups</span> Customers
                </a>
            </li>
            <li class="{{ Request::is('dashboard/menu') ? 'active' : '' }}">
                <a href="{{ url('Bolivar/dashboard/menu') }}"
                    style="display: flex; align-items: center; text-decoration: none; color: inherit;">
                    <span class="material-symbols-outlined">local_dining</span> Menu
                </a>
            </li>
            <li class="{{ Request::is('dashboard/stock') ? 'active' : '' }}">
                <a href="{{ url('Bolivar/dashboard/stock') }}"
                    style="display: flex; align-items: center; text-decoration: none; color: inherit;">
                    <span class="material-symbols-outlined">inventory</span> Stock
                </a>
            </li>
            <li class="{{ Request::is('dashboard/sales') ? 'active' : '' }}">
                <a href="{{ url('Bolivar/dashboard/sales') }}"
                    style="display: flex; align-items: center; text-decoration: none; color: inherit;">
                    <span class="material-symbols-outlined">paid</span> Sales
                </a>
            </li>
            <li class="{{ Request::is('dashboard/purchase') ? 'active' : '' }}">
                <a href="{{ url('Bolivar/dashboard/purchase') }}"
                    style="display: flex; align-items: center; text-decoration: none; color: inherit;">
                    <span class="material-symbols-outlined">sell</span> Purchase
                </a>
            </li>
            <li class="{{ Request::is('dashboard/points') ? 'active' : '' }}">
                <a href="{{ url('Bolivar/dashboard/points') }}"
                    style="display: flex; align-items: center; text-decoration: none; color: inherit;">
                    <span class="material-symbols-outlined">currency_exchange</span> Point
                </a>
            </li>
        @elseif(Auth::check() && Auth::user()->role->namaRole === 'pemilik')
            <li class="{{ Request::is('dashboard/employee') ? 'active' : '' }}">
                <a href="{{ url('Bolivar/dashboard/employee') }}"
                    style="display: flex; align-items: center; text-decoration: none; color: inherit;">
                    <span class="material-symbols-outlined">people</span>Employee
                </a>
            </li>
            <li class="{{ Request::is('dashboard/reports') ? 'active' : '' }}">
                <a href="{{ url('Bolivar/dashboard/reports') }}"
                    style="display: flex; align-items: center; text-decoration: none; color: inherit;">
                    <span class="material-symbols-outlined">book</span>Reports
                </a>
            </li>
        @endif
    </ul>
    <ul class="logout">
        <li>
            <form action="{{ route('logout') }}" method="POST"
                style="display: flex; align-items: center; text-decoration: none; color: inherit;">
                @csrf
                <button type="submit"
                    style="background: none; border: none; color: inherit; display: flex; align-items: center;">
                    <span class="material-symbols-outlined">logout</span>
                </button>
            </form>
        </li>
    </ul>
</div>
