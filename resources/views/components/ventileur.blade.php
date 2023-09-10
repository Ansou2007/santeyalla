@can('Ventileur')

<div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
        <ul>
            <li class="menu-title">
                <span>Menu</span>
            </li>
            {{-- Dashboard --}}
            <li class="submenu active">
                <a href="#"><i class="feather-grid active"></i> <span>Tableau de Bord</span> <span
                        class="menu-arrow"></span></a>
                <ul>
                    <li><a href="{{route('Ventileur.Dashboard')}}">Ventileur Dashboard</a></li>
                </ul>

                {{-- ventilation --}}
            </li>
            <li class="submenu">
                <a href="#"><i class="fas fa-graduation-cap"></i> <span>Ventilation</span> <span
                        class="menu-arrow"></span></a>
                <ul>
                    <li><a href="{{route('Ventilation.index')}}">Liste Ventilation</a></li>
                    <li><a href="{{route('Ventilation.filtre')}}"><i class="fas fa-search"></i>Filtre Ventilation</a>
                    </li>
                    <li><a href="{{route('Ventilation.ajout')}}"><i class="fas fa-plus"></i>Ajouter Ventilation</a></li>
                </ul>
            </li>
            {{-- Livreur --}}
            <li class="submenu">
                <a href="#"><i class="fas fa-chalkboard-teacher"></i> <span>Livreur</span> <span
                        class="menu-arrow"></span></a>
                <ul>
                    <li><a href="{{route('Livreur.index')}}">Liste Livreur</a></li>
                    <li><a href="{{route('Livreur.ajout')}}">Ajouter Livreur</a></li>
                </ul>
            </li>
            {{-- Abonnement --}}
            <li class="submenu">
                <a href="#"><i class="fas fa-clipboard"></i> <span>Abonnement</span> <span
                        class="menu-arrow"></span></a>
                <ul>
                    <li><a href="javascript:void(0)">Liste Abonné</a></li>
                    <li><a href="javascript:void(0)">Liste Abonnement</a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>
@endcan