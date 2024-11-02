<div class="sidebar" id="sidebar">
    <img src="{{ asset('/img/logoobaru.png') }}" alt="Logo" class="logo">
    <h2>Bolívar Coffee</h2>
    <h3 class="bx bx-chevron-right toggle" id="sidebarToggle"></h3>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" />

    <ul class="menu">
        <li class="{{ Request::is('dashboard/home') ? 'active' : '' }}">
            <a href="{{ url('/dashboard/home') }}" style="display: flex; align-items: center; text-decoration: none; color: inherit;">
                <span class="material-symbols-outlined">home</span> Home
            </a>
        </li>
        <li class="{{ Request::is('dashboard/customers') ? 'active' : '' }}">
            <a href="{{ url('/dashboard/customers') }}" style="display: flex; align-items: center; text-decoration: none; color: inherit;">
                <span class="material-symbols-outlined">groups</span> Customers
            </a>
        </li>
        <li class="{{ Request::is('dashboard/menu') ? 'active' : '' }}">
            <a href="{{ url('/dashboard/menu') }}" style="display: flex; align-items: center; text-decoration: none; color: inherit;">
                <span class="material-symbols-outlined">local_dining</span> Menu
            </a>
        </li>
        <li class="{{ Request::is('dashboard/stock') ? 'active' : '' }}">
            <a href="{{ url('/dashboard/stock') }}" style="display: flex; align-items: center; text-decoration: none; color: inherit;">
                <span class="material-symbols-outlined">inventory</span> Stock
            </a>
        </li>
        <li class="{{ Request::is('dashboard/sales') ? 'active' : '' }}">
            <a href="{{ url('/dashboard/sales') }}" style="display: flex; align-items: center; text-decoration: none; color: inherit;">
                <span class="material-symbols-outlined">paid</span> Sales
            </a>
        </li>
        <li class="{{ Request::is('dashboard/purchase') ? 'active' : '' }}">
            <a href="{{ url('/dashboard/purchase') }}" style="display: flex; align-items: center; text-decoration: none; color: inherit;">
                <span class="material-symbols-outlined">sell</span> Purchase
            </a>
        </li>
        <li class="{{ Request::is('dashboard/points') ? 'active' : '' }}">
            <a href="{{ url('/dashboard/points') }}" style="display: flex; align-items: center; text-decoration: none; color: inherit;">
                <span class="material-symbols-outlined">currency_exchange</span> Point
            </a>
        </li>
    </ul>
    <ul class="logout">
        <li>
            <a href="{{ url('/login') }}" style="display: flex; align-items: center; text-decoration: none; color: inherit;">
                <span class="material-symbols-outlined">logout</span>
            </a>
        </li>
    </ul>
</div>
