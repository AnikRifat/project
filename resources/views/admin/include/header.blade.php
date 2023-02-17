<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('admin.index')}}">

                <!--End Logo icon -->
                <!-- Logo text --><span style="">
                    <!-- dark Logo text -->
                    <img src="{{ $content->logo }}" class="dark-logo" style="height: 50px">

                </span>
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav me-auto">
                <!-- This is  -->
                {{-- <li class="nav-item d-block d-md-none d-lg-none"><img src="{{ $content->logo }}" class="dark-logo"
                style="height: 50px"></li> --}}
                <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark"
                      href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                <li class="nav-item"> <a
                      class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark"
                      href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->

            </ul>

            <h2 class="text-center mx-3 text-dark">{{ Auth::user()->name }}</h2>

        </div>
    </nav>
</header>