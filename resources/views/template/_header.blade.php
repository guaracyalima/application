<header class="site-header">
    <div class="container-fluid">

        <a href="#" class="site-logo">
            <img class="hidden-md-down" src="{{ asset('assets/img/logo.png') }}" alt="">
            <img class="hidden-lg-up" src="{{ asset('assets/img/logo.png') }}" alt="">
        </a>

        <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
            <span>toggle menu</span>
        </button>

        <button class="hamburger hamburger--htla">
            <span>toggle menu</span>
        </button>

        @include('template.topo_menu')
        <!--.site-header-content-->
    </div><!--.container-fluid-->
</header>