<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('stages.index') }}" class="nav-link ">
                <i class="fas fa-users" style='font-size:25px'></i>
                <p>Liste de vos stagiaires</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('depots.index') }}" class="nav-link">
                <i class="fas fa-file-archive-o" style='font-size:25px'></i>
                Rapports / dépôts
            </a>
        </li>
        <li class="nav-item has-treeview menu-close">
            <a href="{!! route('soutenances.index') !!}" class="nav-link">
                <i class="fas fa-book" style='font-size:25px'></i>
                <p>
                    Bibliothèque des mémoires
                </p>
            </a>
        </li>
    </ul>
</nav>

