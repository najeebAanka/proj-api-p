<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">

        <a href="" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/img/favicon/favicon.png') }}" width="20" height="30" />
            </span>
            <span class="app-brand-text  menu-text fw-bolder ms-2" style="font-size: 26px ">sab_test</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="{{ url('dashboard/home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>




        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Pages</span>
        </li>


        <li class="menu-item" id="set_this">
            <a href="{{ url('dashboard/sections') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Sections</div>
            </a>
        </li>

        <li class="menu-item" id="set_this1">
            <a href="{{ url('dashboard/blogs') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Account Settings">Blogs</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ url('dashboard/products') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-copy"></i>
                <div data-i18n="Account Settings">Products</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ url('dashboard/countries') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Account Settings">Countries</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ url('dashboard/gold-prices') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-money"></i>
                <div data-i18n="Account Settings">Gold Prices</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ url('dashboard/app-settings') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Account Settings">App Settings</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ url('dashboard/leads') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="Account Settings">
                    <span>Leads<span class="badge badge-center rounded-pill bg-danger" style="margin-left: 35px;"
                            <?php
                            $ddddd = \App\Models\Lead::where('seen', 0)->count();
                            if ($ddddd == '0') {
                                echo 'hidden';
                            }
                            ?>>
                            {{ \App\Models\Lead::where('seen', 0)->count() }}
                        </span></span>
                </div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ url('dashboard/users') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Account Settings">
                    <span>Users<span class="badge badge-center rounded-pill bg-danger" style="margin-left: 35px;"
                            <?php
                            $ddddd = \App\Models\User::where('seen', 0)->count();
                            if ($ddddd == '0') {
                                echo 'hidden';
                            }
                            ?>>
                            {{ \App\Models\User::where('seen', 0)->count() }}
                        </span></span>
                </div>
            </a>
        </li>




    </ul>
</aside>
