<!-- Start::app-sidebar -->
<aside class="app-sidebar sticky" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="index.html" class="header-logo">
            <img src="../assets/images/brand-logos/desktop-logo.png" alt="logo" class="desktop-logo">
            <img src="../assets/images/brand-logos/toggle-logo.png" alt="logo" class="toggle-logo">
        </a>
    </div>
    <!-- End::main-sidebar-header -->

    <!-- Start::main-sidebar -->
    <div class="main-sidebar" id="sidebar-scroll">

        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
            </div>
            <ul class="main-menu mt-5">
                <li class="slide">
                    <a href="{{route('dashboard')}}" class="side-menu__item">
                        <i class="bx bx-desktop side-menu__icon"></i>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                </li>
                {{-- <li class="slide">
                    <a href="{{route('firm-list')}}" class="side-menu__item">
                        <i class="bx bx-building-house side-menu__icon"></i>
                        <span class="side-menu__label">Firm</span>
                    </a>
                </li> --}}
                <li class="slide">
                    <a href="{{route('parties.index')}}" class="side-menu__item">
                        <i class="bx bxs-user-account side-menu__icon"></i>
                        <span class="side-menu__label">Party master</span>
                    </a>
                </li>

                <li class="slide">
                    <a href="product-list.html" class="side-menu__item">
                        <i class="bx bx-package side-menu__icon"></i>
                        <span class="side-menu__label">Product</span>
                    </a>
                </li>

                <li class="slide">
                    <a href="sells-list.html" class="side-menu__item">
                        <i class="bx bx-cart side-menu__icon"></i>
                        <span class="side-menu__label">Machines Sells</span>
                    </a>
                </li>

                <li class="slide">
                    <a href="#" class="side-menu__item">
                        <i class="bx bxs-report side-menu__icon"></i>
                        <span class="side-menu__label">Report</span>
                    </a>
                </li>

                <li class="slide">
                    <a href="add-complain.html" class="side-menu__item">
                        <i class="bx bx-error-alt side-menu__icon"></i>
                        <span class="side-menu__label">Complain</span>
                    </a>
                </li>

                <li class="slide">
                    <a href="user-list.html" class="side-menu__item">
                        <i class="bx bx-user side-menu__icon"></i>
                        <span class="side-menu__label">Users</span>
                    </a>
                </li>

                <li class="slide">
                    <a href="area.html" class="side-menu__item">
                        <i class="bx bx-area side-menu__icon"></i>
                        <span class="side-menu__label">Area</span>
                    </a>
                </li>

                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="fe fe-help-circle side-menu__icon"></i>
                        <span class="side-menu__label">support</span>
                        <i class="fe fe-chevron-down side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <!-- <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">complain</a>
                        </li> -->
                        <li class="slide">
                            <a href="#" class="side-menu__item">complain</a>
                        </li>
                        <li class="slide">
                            <a href="#" class="side-menu__item">Call</a>
                        </li>

                        <li class="slide">
                            <a href="#" class="side-menu__item">Report</a>
                        </li>

                    </ul>
                </li>
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg></div>
        </nav>
        <!-- End::nav -->

    </div>
    <!-- End::main-sidebar -->

</aside>
<!-- End::app-sidebar -->
