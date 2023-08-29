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
<li><a href="{{route('Admin.Dashboard')}}"   class="{{request()->routeIs('Admin.Dashboard') ? 'active':''}}">Admin Dashboard</a></li>
</ul>
{{-- ventilation --}}
</li>
<li class="submenu">
<a href="#"><i class="fas fa-graduation-cap"></i> <span>Ventilation</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="{{route('Ventilation.ajout')}}" class="{{request()->routeIs('Ventilation.ajout') ? 'active':''}}"><i class="fas fa-plus"></i>Ajouter Ventilation</a></li>
<li><a href="{{route('Ventilation.index')}}" class="{{request()->routeIs('Ventilation.index') ? 'active':''}}"><i class="fas fa-book"></i>Liste Ventilation</a></li>
{{-- <li><a href="{{route('Ventilation.filtre')}}"><i class="fas fa-search"></i>Filtre Ventilation</a></li> --}}
<li><a href="{{route('Ventilation.rapport')}} " class="{{request()->routeIs('Ventilation.rapport') ? 'active':''}}"><i class="fas fa-print"></i>Rapport</a></li>
</ul>
</li>
{{-- Livreur --}}
<li class="submenu">
<a href="#"><i class="fas fa-chalkboard-teacher"></i> <span>Livreur</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="{{route('Livreur.ajout')}}" class="{{request()->routeIs('Livreur.ajout') ? 'active':''}}"><i class="fas fa-plus"></i>Ajouter Livreur</a></li>
<li><a href="{{route('Livreur.index')}}" class="{{request()->routeIs('Livreur.index') ? 'active':''}}" ><i class="fas fa-book"></i>Liste Livreur</a></li>
</ul>
</li>
{{-- petrin --}}
<li class="submenu">
<a href="#"><i class="fas fa-building"></i> <span>Petrin</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="#"><i class="fas fa-book"></i>Liste Petrin</a></li>
<li><a href="#"><i class="fas fa-plus"></i>Ajouter Petrin</a></li>
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
<li><a href="{{route('Employe.index')}}"><i class="fas fa-book"></i>Liste employé</a></li>
<li><a href="{{route('Employe.ajout')}}"><i class="fas fa-plus"></i>Ajouter employé</a></li>
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
<li><a href="{{route('Utilisateur.index')}}"><i class="fas fa-book"></i>Liste utilisateur</a></li>
<li><a href="{{route('Utilisateur.ajout')}}"><i class="fas fa-plus"></i>Ajouter utilisateur</a></li>
</ul>
</li>
{{-- Reglages--}}
<li>
<a href="{{route('Reglage.index')}}" ><i class="fas fa-cog"></i> <span>Reglages</span></a>
</li>
</ul>
</div>
</div>
@endcan