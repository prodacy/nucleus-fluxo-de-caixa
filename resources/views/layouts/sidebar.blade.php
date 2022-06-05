<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-dollar-sign"></i>
        </div>
        <div class="sidebar-brand-text ml-3">{{ config('app.name', 'Laravel') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Nav::isRoute('admin.home') }}">
        <a class="nav-link" href="{{ route('admin.home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('Dashboard') }}</span></a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">
         <!-- Heading -->
        <div class="sidebar-heading">
            {{ __('Cadastros') }}
        </div>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNaoIndexados" aria-expanded="false" aria-controls="collapseNaoIndexados">
                <i class="fas fa-dollar-sign ml-1 mr-2"></i>
                <span>{{ __('Contas') }}</span>
            </a>
            <div id="collapseNaoIndexados" class="collapse m-0 p-0 ml-3 {{Request::is(['*/bills/*'])?'show':''}}" data-parent="#accordionSidebar">
                <div class="collapse-inner m-0 p-0" style="background: rgba(255,255,255,0.05);">
                    <div class="nav-item {{ Nav::isRoute('admin.bill.all') }}">
                        <a class="nav-link" href="{{ route('admin.bill.all') }}">
                            <i class="fas fa-arrows-alt-h"></i>
                            <span>Todas</span>
                        </a>
                    </div>
                     <div class="nav-item {{ Nav::isRoute('admin.bill.out') }}">
                        <a class="nav-link" href="{{ route('admin.bill.out') }}">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>À Pagar</span>
                        </a>
                    </div>
                    <div class="nav-item {{ Nav::isRoute('admin.bill.enter') }}">
                        <a class="nav-link" href="{{ route('admin.bill.enter') }}">
                            <i class="fas fa-sign-in-alt"></i>
                            <span>À Receber</span>
                        </a>
                    </div>
                </div>
            </div>
        </li>

        <li class="nav-item {{ Nav::isRoute('admin.client.index') }}">
            <a class="nav-link" href="{{ route('admin.client.index') }}">
                <i class="fas fa-fw fa-user-tie"></i>
                <span>{{ __('Clientes') }}</span>
            </a>
        </li>


        <!-- Heading -->
        <div class="sidebar-heading mt-3">
            {{ __('Configurações') }}
        </div>

        <!-- Nav Item - Meus dados -->
        <li class="nav-item {{ Nav::isRoute('profile') }}">
            <a class="nav-link" href="{{ route('profile') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>{{ __('Meus dados') }}</span>
            </a>
        </li>

        <!-- Nav Item - About -->
        <li class="nav-item {{ Nav::isRoute('about') }}">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-hands-helping"></i>
                <span>{{ __('Sobre') }}</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
