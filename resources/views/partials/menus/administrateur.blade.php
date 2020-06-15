<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview menu-close">
            <a href="{!! route('users.index') !!}" class="nav-link">
                <i class="fas fa-users" style='font-size:25px'></i>
                <p>
                    Comptes
                    <i class="fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a class="nav-link" href="{!! route('etudiants.index') !!}">Etudiants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{!! route('professeurs.index') !!}">Professeurs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{!! route('users.index') !!}">Administrateurs</a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview menu-close">
            <a href="{!! route('filieres.index') !!}" class="nav-link">
                <i class="fas fa-book" style='font-size:25px'></i>
                <p>
                    Filières
                </p>
            </a>
        </li>
        <li class="nav-item has-treeview menu-close">
            <a href="{!! route('annees.index') !!}" class="nav-link">
                <i class="fas fa-calendar" style='font-size:25px'></i>
                <p>
                    Années académiques
                </p>
            </a>
        </li>
        <li class="nav-item has-treeview menu-close">
            <a href="{!! route('modules.index') !!}" class="nav-link">
                <i class="fas fa-graduation-cap"  style='font-size:25px'></i>          
                <p>
                    Domaines
                </p>
            </a>
        </li>
        <li class="nav-item has-treeview menu-close">
            <a href="{!! route('entreprises.index') !!}" class="nav-link">
                <i class="fas fa-building" style='font-size:25px'></i>
                <p>
                    Entreprises
                </p>
            </a>
        </li>
        <li class="nav-item has-treeview menu-close">
            <a href="{!! route('soutenances.index') !!}" class="nav-link">
                <i class="fas fa-book" style='font-size:25px'></i>
                <p>
                    Soutenances
                </p>
            </a>
        </li>
        <li class="nav-item has-treeview menu-close">
            <a href="{!! route('preinscriptions.index') !!}" class="nav-link">
                <i class="fas fa-users" style='font-size:25px'></i>
                <p>
                    Préinscriptions
                </p>
            </a>
        </li>
        <li class="nav-item has-treeview menu-close">
            <a href="{!! route('prospects.index') !!}" class="nav-link">
                <i class="fas fa-newspaper-o" style='font-size:25px'></i>
                <p>
                    Prospects
                </p>
            </a>
        </li>
    </ul>
</nav>