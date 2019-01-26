<header class="row">
    <div class="col-6" id="header-left">
        <a href="<?php echo URL::to('/'); ?>">
            <img src="<?php echo URL::to('/'); ?>/img/logo.png">
        </a>
        <div class="nav-wrapper">
            <div class="header-div" id="nav">
                <i class="fas fa-bars header-font {{ $data['scheme']->color_scheme == null ? 'header-scheme-0' : 'header-'.$data['scheme']->color_scheme }}"></i>
            </div>
            <nav id="links-dropdown" class="nav-dropdown">
                <a href="<?php echo URL::to('/'); ?>/about" class="nav-dropdown-link {{ $data['scheme']->color_scheme == null ? 'menu-scheme-0' : 'menu-'.$data['scheme']->color_scheme }}">Rólam</a>
                <a href="" class="nav-dropdown-link lit-text-heavy {{ $data['scheme']->color_scheme == null ? 'menu-scheme-0' : 'menu-'.$data['scheme']->color_scheme }}">Letöltések</a>
                <a href="" class="nav-dropdown-link lit-text-heavy {{ $data['scheme']->color_scheme == null ? 'menu-scheme-0' : 'menu-'.$data['scheme']->color_scheme }}">Galéria</a>
            </nav>
        </div>
        <div id="nav-overlay"></div>
        <div class="nav-wrapper">
            <div class="header-div" id="settings">
                <i class="fas fa-cog header-font {{ $data['scheme']->color_scheme == null ? 'header-scheme-0' : 'header-'.$data['scheme']->color_scheme }}"></i>
            </div>
            <nav id="settings-dropdown" class="nav-dropdown">
                <button id="scheme-0" class="nav-dropdown-link color-scheme menu-scheme-0">Irodalmi</button>
                <button id="scheme-1" class="nav-dropdown-link color-scheme menu-scheme-1">Sötét skarlát</button>
                <button id="scheme-2" class="nav-dropdown-link color-scheme menu-scheme-2">Mély Űr</button>
            </nav>
        </div>
        <div class="nav-wrapper">
            <div class="header-div" id="flag">
                <span class="flag-icon-background flag-icon-gb"></span>
            </div>
        </div>
    </div>
    <div class="col-6" id="header-right">
        <div class="input-group {{ $data['scheme']->color_scheme == null ? 'menu-scheme-0' : 'menu-'.$data['scheme']->color_scheme }}" id="search">
            <i id="search-icon" class="fas fa-search"></i>
            <input type="search" id="search-input" class="{{ $data['scheme']->color_scheme == null ? 'search-scheme-0' : 'search-'.$data['scheme']->color_scheme }}" placeholder="Keresés...">
        </div>
    </div>
</header>