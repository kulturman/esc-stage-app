<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link">
                <i class="fas fa-users" style='font-size:25px'></i>
                <p>
                    Administration
                    <i class="right fas fa-angle-left" ></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('users.index') }}" class="nav-link ">
                        <p>Utilisateurs</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
