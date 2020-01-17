<header>
    <div class="container-fluid shown">
        <div class="row">
            <div class="col-lg-12">
                <div class="header-panel d-flex align-items-center">
                    <div class="desktop-menu-toggler shown d-flex justify-content-center align-items-center" onclick="main.desktopMenu.toggle('.desktop-menu-toggler')">
                        <i class="fas fa-ellipsis-v"></i>
                    </div>
                    @if( isset($page_title) )
                        <div class="page-title">
                            <h3>{{ $page_title }}</h3>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>