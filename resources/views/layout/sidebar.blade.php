<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <img src="{{ asset('/img/logoobaru.png') }}" alt="Logo" class="logo">
        <h2>Bolívar Coffee</h2>
    </div>
    <h3 class="bx bx-chevron-right toggle" id="sidebarToggle" onclick="toggleSidebar()">☰</h3>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" />

    <ul class="menu">
        <li class="{{ Request::is('Bolivar/dashboard/home') ? 'active' : '' }}">
            <a href="{{ url('Bolivar/dashboard/home') }}"
                style="display: flex; align-items: center; text-decoration: none; color: inherit;"
                onclick="setActive(this)">
                <span class="material-symbols-outlined">home</span> <span class="menu-text">Home</span>
            </a>
        </li>
        @if (optional(session('user'))->id_role == 2)
            <li class="{{ Request::is('dashboard/customers') ? 'active' : '' }}">
                <a href="{{ url('Bolivar/dashboard/customers') }}"
                    style="display: flex; align-items: center; text-decoration: none; color: inherit;"
                    onclick="setActive(this)">
                    <span class="material-symbols-outlined">groups</span> <span class="menu-text">Customers</span>
                </a>
            </li>
            <li class="{{ Request::is('dashboard/menu') ? 'active' : '' }}">
                <a href="{{ url('Bolivar/dashboard/menu') }}"
                    style="display: flex; align-items: center; text-decoration: none; color: inherit;"
                    onclick="setActive(this)">
                    <span class="material-symbols-outlined">local_dining</span> <span class="menu-text">Menu</span>
                </a>
            </li>
            <li class="{{ Request::is('dashboard/stock') ? 'active' : '' }}">
                <a href="{{ url('Bolivar/dashboard/stock') }}"
                    style="display: flex; align-items: center; text-decoration: none; color: inherit;"
                    onclick="setActive(this)">
                    <span class="material-symbols-outlined">inventory</span><span class="menu-text">Stock</span>
                </a>
            </li>
            <li class="{{ Request::is('dashboard/sales') ? 'active' : '' }}">
                <a href="{{ url('Bolivar/dashboard/sales') }}"
                    style="display: flex; align-items: center; text-decoration: none; color: inherit;"
                    onclick="setActive(this)">
                    <span class="material-symbols-outlined">paid</span> <span class="menu-text">Sales</span>
                </a>
            </li>
            <li class="{{ Request::is('dashboard/purchase') ? 'active' : '' }}">
                <a href="{{ url('Bolivar/dashboard/purchase') }}"
                    style="display: flex; align-items: center; text-decoration: none; color: inherit;"
                    onclick="setActive(this)">
                    <span class="material-symbols-outlined">sell</span> <span class="menu-text">Purchase</span>
                </a>
            </li>
            <li class="{{ Request::is('dashboard/points') ? 'active' : '' }}">
                <a href="{{ url('Bolivar/dashboard/points') }}"
                    style="display: flex; align-items: center; text-decoration: none; color: inherit;"
                    onclick="setActive(this)">
                    <span class="material-symbols-outlined">currency_exchange</span> <span
                        class="menu-text">Point</span>
                </a>
            </li>
        @elseif (optional(session('user'))->id_role == 1)
            <li class="{{ Request::is('Bolivar/dashboard/employee') ? 'active' : '' }}">
                <a href="{{ url('Bolivar/dashboard/employee') }}"
                    style="display: flex; align-items: center; text-decoration: none; color: inherit;"
                    onclick="setActive(this)">
                    <span class="material-symbols-outlined">people</span> <span class="menu-text">Employee</span>
                </a>
            </li>
            <li class="{{ Request::is('Bolivar/dashboard/reports') ? 'active' : '' }}">
                <a href="{{ url('Bolivar/dashboard/reports') }}"
                    style="display: flex; align-items: center; text-decoration: none; color: inherit;"
                    onclick="setActive(this)">
                    <span class="material-symbols-outlined">book</span> <span class="menu-text">Reports</span>
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
<script>
   document.addEventListener('DOMContentLoaded', function() {
    const sidebarToggleButton = document.getElementById('sidebarToggle');
    const sidebar = document.querySelector('.sidebar');

    // Cek status sidebar dari localStorage
    if (localStorage.getItem('sidebarShrunk') === 'true') {
        sidebar.classList.add('shrunk');
    } else {
        localStorage.setItem('sidebarShrunk', 'false'); // Pastikan default-nya besar
        sidebar.classList.remove('shrunk');
    }

    // Fungsi untuk toggle sidebar
    function toggleSidebar() {
        sidebar.classList.toggle('shrunk');

        // Simpan status sidebar ke localStorage
        const isShrunk = sidebar.classList.contains('shrunk');
        localStorage.setItem('sidebarShrunk', isShrunk);

        // Ubah margin kiri dari elemen main-content sesuai status sidebar
        const mainContent = document.querySelector('.main-content');
        if (mainContent) {
            mainContent.style.marginLeft = isShrunk ? '80px' : '250px';
        }
    }

    // Tambahkan event listener ke tombol toggle
    if (sidebarToggleButton) {
        sidebarToggleButton.addEventListener('click', toggleSidebar);
    }

    // Simpan status aktif pada menu menggunakan sessionStorage
    const menuItems = document.querySelectorAll('.menu li a');
    const activePath = sessionStorage.getItem('activeMenu');
    if (activePath) {
        menuItems.forEach(item => {
            if (item.getAttribute('href') === activePath) {
                item.parentElement.classList.add('active');
            }
        });
    }

    menuItems.forEach(item => {
        item.addEventListener('click', function() {
            sessionStorage.setItem('activeMenu', item.getAttribute('href'));
            setActive(this);
        });
    });

    // Fungsi untuk mengatur elemen menu aktif
    function setActive(element) {
        const menuItems = document.querySelectorAll('.menu li');
        menuItems.forEach(item => {
            item.classList.remove('active');
        });
        element.parentElement.classList.add('active');
    }
});

</script>
