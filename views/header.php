<header class="row">
    <div class="col-6" id="header-left">
        <a href="<?php echo BASEURL; ?>dashboard">
            <img src="<?php echo BASEURL; ?>public/img/logo.png">
        </a>
        <div id="nav-wrapper">
            <div class="header-div" id="nav">
                <i class="fas fa-bars header-font"></i>
            </div>
            <nav id="nav-dropdown">
                <a href="<?php echo BASEURL; ?>about" class="nav-dropdown-link lit-text-heavy">Rólam</a>
                <a href="" class="nav-dropdown-link lit-text-heavy">Letöltések</a>
                <a href="" class="nav-dropdown-link lit-text-heavy">Galléria</a>
            </nav>
        </div>
        <div id="nav-overlay"></div>
        <div id="nav-wrapper">
            <div class="header-div" id="flag">
                <span class="flag-icon-background flag-icon-gb"></span>
            </div>
        </div>
    </div>
    <div class="col-6" id="header-right">
        <div class="input-group" id="search">
            <input type="search" id="search-input" class="form-control" placeholder="Keresés...">
            <div class="input-group-append">
                <button class="btn btn-secondary" id="search-btn">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </div>
</header>