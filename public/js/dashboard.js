$(document).ready(function() {
    
    removeSelectedItemFromList($('.select-items').children('span').text());

    // Kategória automatikus bezárása
    $(document).click(function(event) {
        if (!$(event.target).is('.select-items, .option')) {
            $('#options').addClass('hidden');
            $('.select-arrow').removeClass('angle-up');
        }
    });

    // Kategória kiválasztása + Ajax
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

    $('.option').click(function() {
        var newText = $(this).text();
        $('.select-items').children('span').text(newText);
        removeSelectedItemFromList(newText);
        $('#options').addClass('hidden');
        $.ajax({
            type: 'POST',
            url: '/Dashboard/order',
            data: { data: $(this).data('option') },
            success: function(result) {
                console.log(result);
            }
        });
    });

    // Kijelölt kategória eltüntetése a listából
    function removeSelectedItemFromList(selected) {
        $('.option').each(function() {
            var option = $(this).text();
            if (option == selected) {
                $('.option').removeClass('hidden');
                $(this).addClass('hidden');
            }
        });
    }

});