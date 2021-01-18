@extends('layouts.templateAdmin')

@section('contenu')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        {{Auth::user()->name}}
                    </a>
                    {{-- <div class="dropdown-menu">
                        <a class="nav-link" href="" class="text-dark">
                            <i class="fa fa-user"> Profil</i>
                        </a>
                        <a href="#" class="dropdown-item">
                            <form method="POST" action="{{ route('logout') }}" style="margin-left:-10px;">
                    @csrf

                    <x-jet-dropdown-link class="text-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                        <i class="fa fa-door-open"> Déconnexion</i>
                    </x-jet-dropdown-link>
                    </form>
                    </a>
    </div> --}}
    <div class="mt-3 space-y-1 dropdown-menu">
        <!-- Account Management -->
        <x-jet-responsive-nav-link class="dropdown-item text-secondary" href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
            {{ __('Profile') }}
        </x-jet-responsive-nav-link>

        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
        <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
            {{ __('API Tokens') }}
        </x-jet-responsive-nav-link>
        @endif

        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-jet-responsive-nav-link class="dropdown-item text-secondary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                {{ __('Logout') }}
            </x-jet-responsive-nav-link>
        </form>

        <!-- Team Management -->
        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
        <div class="border-t border-gray-200"></div>

        <div class="block px-4 py-2 text-xs text-gray-400">
            {{ __('Manage Team') }}
        </div>

        <!-- Team Settings -->
        <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
            {{ __('Team Settings') }}
        </x-jet-responsive-nav-link>

        <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
            {{ __('Create New Team') }}
        </x-jet-responsive-nav-link>

        <div class="border-t border-gray-200"></div>

        <!-- Team Switcher -->
        <div class="block px-4 py-2 text-xs text-gray-400">
            {{ __('Switch Teams') }}
        </div>

        @foreach (Auth::user()->allTeams() as $team)
        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
        @endforeach
        @endif
    </div>
    </li>
    </ul>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('dashboard')}}" class="brand-link">
            <img src="{!! asset('dist/img/AdminLTELogo.png') !!}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Administration</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{!! asset('dist/img/user2-160x160.jpg') !!}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="{{url('')}}" class="d-block">{{Auth::user()->name}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview menu-open">
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('propos')}}" data-toggle="tooltip" title="A propos" class="nav-link @yield('1')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> A propos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{!! route('service') !!}" data-toggle="tooltip" title="Services" class="nav-link @yield('2')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Services</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('competence')}}" data-toggle="tooltip" title="Competences" class="nav-link @yield('3')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Competences</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{!! route('education') !!}" data-toggle="tooltip" title="Educations" class="nav-link @yield('4')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Educations</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{!! route('experience') !!}" data-toggle="tooltip" title="Experiences" class="nav-link @yield('5')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Experiences</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{!! route('contact') !!}" data-toggle="tooltip" title="Contacts" class="nav-link @yield('6')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Contacts</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{!! route('message') !!}" data-toggle="tooltip" title="Messages" class="nav-link @yield('7')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Messages</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{!! route('cvview') !!}" data-toggle="tooltip" title="Update CV" class="nav-link @yield('8')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Nouvelle version de cv</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{!! route('stat') !!}" data-toggle="tooltip" title="Statisques" class="nav-link @yield('9')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Statistiques</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('AdministraionUsers')}}" data-toggle="tooltip" title="Utilisateur" class="nav-link @yield('10')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Uiliateurs</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    @yield('home')

    <!-- Content Wrapper. Contains page content -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>

    <!-- ./wrapper -->
</body>

@endsection