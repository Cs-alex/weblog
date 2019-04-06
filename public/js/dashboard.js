$(document).ready(function() {

    var selected = window.location.href.split('/')[5];

    // Kategória automatikus bezárása
    $(document).click(function(event) {
        if (!$(event.target).is('.select-items, .option')) {
            $('#options').addClass('hidden');
            $('.select-arrow').removeClass('angle-up');
        }
    });

    // Kategória kiválasztása + Ajax sql
    $('.select-items').click(function(event) {
        event.stopPropagation();
        if ($('#options').hasClass('hidden')) {
            $('#options').removeClass('hidden');
            $('.select-arrow').addClass('angle-up');
        } else {
            $('#options').addClass('hidden');
            $('.select-arrow').removeClass('angle-up');
        }
    });

    // Kijelölt kategória eltüntetése a listából
    $('.option').each(function() {
        var option = $(this).data('option');
        if (selected == '') {
            $('.option').removeClass('hidden');
            $(this).addClass('hidden');
            return false;
        } else if (option == selected) {
            $('.option').removeClass('hidden');
            $(this).addClass('hidden');
        }
    });

});