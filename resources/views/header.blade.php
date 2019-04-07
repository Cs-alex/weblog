<header class="row">
    <div class="col-xl-6 col-lg-7 col-md-7 col-sm-12" id="header-left">
        <a href="<?php echo URL::to('/'); ?>/{{ $data['lang'] }}" id="logo">
            <img src="<?php echo URL::to('/'); ?>/public/img/logo.png">
        </a>
        <div class="nav-wrapper">
            <div class="header-div" id="nav">
                <i class="fas fa-bars header-font {{ $data['scheme']->color_scheme == null ? 'header-scheme-0' : 'header-'.$data['scheme']->color_scheme }}"></i>
            </div>
            <nav id="links-dropdown" class="nav-dropdown">
                <a href="<?php echo URL::to('/'); ?>/{{ $data['lang'] }}/about" class="nav-dropdown-link {{ $data['scheme']->color_scheme == null ? 'menu-scheme-0' : 'menu-'.$data['scheme']->color_scheme }}">@lang('header.about')</a>
                <a href="" class="nav-dropdown-link lit-text-heavy {{ $data['scheme']->color_scheme == null ? 'menu-scheme-0' : 'menu-'.$data['scheme']->color_scheme }}">@lang('header.download')</a>
                <a href="" class="nav-dropdown-link lit-text-heavy {{ $data['scheme']->color_scheme == null ? 'menu-scheme-0' : 'menu-'.$data['scheme']->color_scheme }}">@lang('header.gallery')</a>
            </nav>
        </div>
        <div id="nav-overlay"></div>
        <div class="nav-wrapper">
            <div class="header-div" id="settings">
                <i class="fas fa-cog header-font {{ $data['scheme']->color_scheme == null ? 'header-scheme-0' : 'header-'.$data['scheme']->color_scheme }}"></i>
            </div>
            <nav id="settings-dropdown" class="nav-dropdown">
                <button id="scheme-0" class="nav-dropdown-link color-scheme menu-scheme-0">@lang('header.scheme1')</button>
                <button id="scheme-1" class="nav-dropdown-link color-scheme menu-scheme-1">@lang('header.scheme2')</button>
                <button id="scheme-2" class="nav-dropdown-link color-scheme menu-scheme-2">@lang('header.scheme3')</button>
            </nav>
        </div>
        <div class="nav-wrapper">
            <div class="header-div" id="flag" data-lang="en">
                <span class="flag-icon-background flag-icon-gb"></span>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-5 col-md-5 col-sm-12" id="header-right">
        <div class="input-group {{ $data['scheme']->color_scheme == null ? 'menu-scheme-0' : 'menu-'.$data['scheme']->color_scheme }}" id="search">
            <i id="search-icon" class="fas fa-search"></i>
            <input type="search" id="search-input" class="{{ $data['scheme']->color_scheme == null ? 'search-scheme-0' : 'search-'.$data['scheme']->color_scheme }}" placeholder="@lang('header.search')">
        </div>
    </div>
</header>