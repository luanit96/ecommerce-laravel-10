$(() => {
    $('.toggle-password').click(function() {
        let ElementInput = $('.password');
        $(this).toggleClass('fa-eye fa-eye-slash');
        ElementInput.attr('type') == 'password' ? ElementInput.attr('type', 'text') : ElementInput
            .attr('type',
                'password');
    });
    $('.toggle-confirm-password').click(function() {
        let ElementInput = $('.confirm-password');
        $(this).toggleClass('fa-eye fa-eye-slash');
        ElementInput.attr('type') == 'password' ? ElementInput.attr('type', 'text') : ElementInput
            .attr('type',
                'password');
    });
});