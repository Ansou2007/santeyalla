@can('Administrateur')
    
<div class="sidebar-inner slimscroll">
<div id="sidebar-menu" class="sidebar-menu">
<ul>
<li class="menu-title">
<span>Menu</span>
</li>
{{-- Dashboard --}}
<li class="submenu active">
<a href="#"><i class="feather-grid active"></i> <span>Tableau de Bord</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="{{route('Admin.Dashboard')}}" class="">Admin Dashboard</a></li>
</ul>
{{-- ventilation --}}
</li>
<li class="submenu">
<a href="#"><i class="fas fa-graduation-cap"></i> <span>Ventilation</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="{{route('Ventilation.index')}}">Liste Ventilation</a></li>
<li><a href="{{route('Ventilation.filtre')}}"><i class="fas fa-search"></i>Filtre Ventilation</a></li>
<li><a href="{{route('Ventilation.ajout')}}"><i class="fas fa-plus"></i>Ajouter Ventilation</a></li>
</ul>
</li>
{{-- Livreur --}}
<li class="submenu">
<a href="#"><i class="fas fa-chalkboard-teacher"></i> <span>Livreur</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="{{route('Livreur.index')}}">Liste Livreur</a></li>
<li><a href="{{route('Livreur.ajout')}}">Ajouter Livreur</a></li>
</ul>
</li>
{{-- petrin --}}
<li class="submenu">
<a href="#"><i class="fas fa-building"></i> <span>Petrin</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="#">Liste Petrin</a></li>
<li><a href="#">Ajouter Petrin</a></li>
</ul>
</li>
{{-- Paiement --}}
<li class="submenu">
<a href="#"><i class="fas fa-book-reader"></i> <span>Paiement</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="avascript:void(0)">Liste paiement</a></li>
<li><a href="avascript:void(0)">Paiement livreur</a></li>
<li><a href="avascript:void(0)">Paiement employé</a></li>
</ul>
</li>
{{-- Employe --}}
<li class="submenu">
<a href="#"><i class="fas fa-clipboard"></i> <span>Employés</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="{{route('Employe.index')}}">Liste employé</a></li>
<li><a href="{{route('Employe.ajout')}}">Ajouter employé</a></li>
</ul>
</li>
{{-- Abonnement --}}
<li class="submenu">
<a href="#"><i class="fas fa-clipboard"></i> <span>Abonnement</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="avascript:void(0)">Liste abonnement</a></li>
<li><a href="avascript:void(0)">Ajouter abonnement</a></li>
</ul>
</li>
<li class="menu-title">
<span>Management</span>
</li>
{{-- Utilisateur --}}
<li class="submenu">
<a href="#"><i class="fas fa-users"></i> <span>Utilisateurs</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="{{route('Utilisateur.index')}}">Liste utilisateur</a></li>
<li><a href="{{route('Utilisateur.ajout')}}">Ajouter utilisateur</a></li>
</ul>
</li>
{{-- Reglages--}}
<li>
<a href="javascript:void"><i class="fas fa-cog"></i> <span>Reglages</span></a>
</li>
</ul>
</div>
</div>
@endcan