<div class="sidebar" id="sidebar">
    <img src="{{ asset('/img/logoobaru.png') }}" alt="Logo" class="logo">
    <h2>Bolívar Coffee</h2>
    <h3 class="bx bx-chevron-right toggle" id="sidebarToggle"></h3>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" />

    <ul class="menu">
        <li class="{{ Request::is('Bolivar/dashboard/home') ? 'active' : '' }}">
            <a href="{{ url('Bolivar/dashboard/home') }}">
                <span class="material-symbols-outlined">home</span> Home
            </a>
        </li>
        @if (Auth::check() && Auth::user()->role->namaRole === 'pegawai')
            <li class="{{ Request::is('Bolivar/dashboard/customers') ? 'active' : '' }}">
                <a href="{{ url('Bolivar/dashboard/customers') }}">
                    <span class="material-symbols-outlined">groups</span> Customers
                </a>
            </li>
            <li class="{{ Request::is('Bolivar/dashboard/menu') ? 'active' : '' }}">
                <a href="{{ url('Bolivar/dashboard/menu') }}">
                    <span class="material-symbols-outlined">local_dining</span> Menu
                </a>
            </li>
            <li class="{{ Request::is('Bolivar/dashboard/stock') ? 'active' : '' }}">
                <a href="{{ url('Bolivar/dashboard/stock') }}">
                    <span class="material-symbols-outlined">inventory</span> Stock
                </a>
            </li>
            <li class="{{ Request::is('Bolivar/dashboard/sales') ? 'active' : '' }}">
                <a href="{{ url('Bolivar/dashboard/sales') }}">
                    <span class="material-symbols-outlined">paid</span> Sales
                </a>
            </li>
            <li class="{{ Request::is('Bolivar/dashboard/purchase') ? 'active' : '' }}">
                <a href="{{ url('Bolivar/dashboard/purchase') }}">
                    <span class="material-symbols-outlined">sell</span> Purchase
                </a>
            </li>
            <li class="{{ Request::is('Bolivar/dashboard/points') ? 'active' : '' }}">
                <a href="{{ url('Bolivar/dashboard/points') }}">
                    <span class="material-symbols-outlined">currency_exchange</span> Point
                </a>
            </li>
        @elseif(Auth::check() && Auth::user()->role->namaRole === 'pemilik')
            <li class="{{ Request::is('Bolivar/dashboard/employee') ? 'active' : '' }}">
                <a href="{{ url('Bolivar/dashboard/employee') }}">
                    <span class="material-symbols-outlined">people</span> Employee
                </a>
            </li>
            <li class="{{ Request::is('Bolivar/dashboard/reports') ? 'active' : '' }}">
                <a href="{{ url('Bolivar/dashboard/reports') }}">
                    <span class="material-symbols-outlined">book</span> Reports
                </a>
            </li>
        @endif
    </ul>
    <ul class="logout">
        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" style="background: none; border: none; color: inherit;">
                    <span class="material-symbols-outlined">logout</span>
                </button>
            </form>
        </li>
    </ul>
</div>