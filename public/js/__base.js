$(document).ready(function() {

    // Header menü és beállítások hover
    $('#nav-wrapper').hover(function() {
        if ($('#nav-dropdown').is(':visible')) {
            $('#nav-dropdown').slideUp(200);
        } else {
            $('#nav-dropdown').slideDown(200);
        }
    });

    $('#settings-wrapper').hover(function() {
        if ($('#settings-ul').is(':visible')) {
            $('#settings-ul').slideUp(200);
        } else {
            $('#settings-ul').slideDown(200);
        }
    });

    // Kereső
    $('#search-btn').click(function() {
        window.location.href = '//' + window.location.host + '/WeBlog/dashboard/search?q=' + $('#search-input').val().replace(' ', '+');
    });

    $('#search-input').keypress(function(e) {
        if (e.keyCode == 13) {
            $('#search-btn').click();
        }
    });

    // Egér
    // $(document).mousedown(function() {
    //     $('p').css('cursor', 'url(../img/pen4.png)');
    // });

});