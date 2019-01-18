$(document).ready(function() {

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
            window.location.href = '//' + window.location.host + '/Dashboard/search?q=' + $('#search-input').val().replace(' ', '+');
        }
    });

    // Színsémák beállítása
    $('.color-scheme').click(function() {
        var scheme = $(this).attr('id');
        var oldScheme = $('body').attr('class').replace('body-', '');
        $.ajax({
            type: 'POST',
            url: '/' + window.location.pathname.split('/')[2] + '/setScheme',
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
                        $('.title').removeClass('text-large-' + oldScheme);
                        $('.title').addClass('text-large-' + scheme);
                        $('#search-input, .select-items').removeClass('search-' + oldScheme);
                        $('#search-input, .select-items').addClass('search-' + scheme);
                        $('#links-dropdown').children('.nav-dropdown-link').removeClass('menu-' + oldScheme);
                        $('#links-dropdown').children('.nav-dropdown-link').addClass('menu-' + scheme);
                        $('.text-small').removeClass('text-small-' + oldScheme);
                        $('.text-small').addClass('text-small-' + scheme);
                        $('footer').children('a').removeClass('footer-' + oldScheme);
                        $('footer').children('a').addClass('footer-' + scheme);
                    }
                })
                $('.nav-dropdown').hide();
            }
        });
    });

});