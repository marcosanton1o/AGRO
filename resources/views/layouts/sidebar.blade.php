<nav class="navbar">
    <div class="logo_item" style="color: #39bda7">
        <i class="bx bx-menu" id="sidebarOpen"></i>
        AgroTec
    </div>
   
    <div class="navbar_content">
        <span class="username">{{ Auth::user()->name }}</span>
        <i class="bx bx-user-circle" style="font-size: 2rem;"></i>
    </div>
</nav>
<nav class="sidebar">
    <div class="menu_content">
        <ul class="menu_items">
            <div class="menu_title">Principal</div>
            <li class="item">
                <a href="{{ route('dashboard') }}" class="nav_link">
                    <span class="navlink_icon">
                        <i class="bx bx-home-alt"></i>
                    </span>
                    <span class="navlink">Dashboard</span>
                </a>
            </li>
            <li class="item">
                <a href="{{ route('plantacaoindex') }}" class="nav_link">
                    <span class="navlink_icon">
                        <i class="bx bx-grid-alt"></i>
                    </span>
                    <span class="navlink">Plantacoes</span>
                </a>
            </li>
        </ul>
        <ul class="menu_items">
            <div class="menu_title menu_setting"></div>
            <li class="item">
                <a href="{{ route('profile.edit') }}" class="nav_link">
                    <span class="navlink_icon">
                        <i class="bx bx-user"></i>
                    </span>
                    <span class="navlink">{{ __('Profile') }}</span>
                </a>
            </li>
            <li class="item">
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <a href="{{ route('logout') }}" class="nav_link"
                       onclick="event.preventDefault(); this.closest('form').submit();">
                        <span class="navlink_icon">
                            <i class="bx bx-log-out"></i>
                        </span>
                        <span class="navlink">{{ __('Log Out') }}</span>
                    </a>
                </form>
            </li>
        </ul>
    </div>
</nav>
<script src="script.js"></script>
