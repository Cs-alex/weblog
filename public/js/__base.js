$(document).ready(function() {

    var lang = window.location.href.split('/')[3];

    // Header menü és beállítások hover
    $('.nav-wrapper').hover(function() {
        $('.nav-dropdown').hide();
        $(this).children('.nav-dropdown').slideDown(200);
    }, function() {
        $('.nav-dropdown').hide();
    });

    // Kereső
    $('#search-input').keypress(function(e) {
        if (e.keyCode == 13) {
            window.location.href = '//' + window.location.host + '/' + lang + '/search/' + $('#search-input').val().replace(' ', '+');
        }
    });

    // Színsémák beállítása
    $('.color-scheme').click(function() {
        var src = ($('.divider')[0]) ? $('.divider').attr('src').split('divider')[0] : '';
        var scheme = $(this).attr('id');
        var oldScheme = $('body').attr('class').replace('body-', '');
        $.ajax({
            type: 'POST',
            url: '/scheme',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: { data: scheme },
            success: function() {
                $('*').each(function() {
                    if ($(this).is('[class*="scheme"]')) {
                        $('body').removeClass('body-' + oldScheme);
                        $('body').addClass('body-' + scheme);
                        $('.header-font').removeClass('header-' + oldScheme);
                        $('.header-font').addClass('header-' + scheme);
                        $('#search, .option, footer').removeClass('menu-' + oldScheme);
                        $('#search, .option, footer').addClass('menu-' + scheme);
                        $('article').removeClass(oldScheme);
                        $('article').addClass(scheme);
                        $('.title, .intro-title, .about').removeClass('text-large-' + oldScheme);
                        $('.title, .intro-title, .about').addClass('text-large-' + scheme);
                        $('#search-input, .select-items').removeClass('search-' + oldScheme);
                        $('#search-input, .select-items').addClass('search-' + scheme);
                        $('#links-dropdown').children('.nav-dropdown-link').removeClass('menu-' + oldScheme);
                        $('#links-dropdown').children('.nav-dropdown-link').addClass('menu-' + scheme);
                        $('.text-small, .intro-text, .poem, .profession').removeClass('text-small-' + oldScheme);
                        $('.text-small, .intro-text, .poem, .profession').addClass('text-small-' + scheme);
                        $('footer').children('a').removeClass('footer-' + oldScheme);
                        $('footer').children('a').addClass('footer-' + scheme);
                        ($('.divider')[0]) ? $('.divider').attr('src', src + 'divider-' + scheme + '.png') : '';
                    }
                });
                $('.nav-dropdown').hide();
            }
        });
    });

    // Nyelv
    if (lang == 'hu') {
        $('#flag').data('lang', 'en').children('span').removeClass('flag-icon-hu').addClass('flag-icon-gb');
    } else if (lang == 'en') {
        $('#flag').data('lang', 'hu').children('span').removeClass('flag-icon-gb').addClass('flag-icon-hu');
    }

    $('#flag').click(function() {
        window.location.href = window.location.href.split(lang)[0] + $(this).data('lang');
    });

});