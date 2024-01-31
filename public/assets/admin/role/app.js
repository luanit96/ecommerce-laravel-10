$(() => {
    $('.checkboxAllPermission').click(function() {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    $('.checkboxWrapper').click(function() {
        $(this).parents('.card').find('.checkboxChildrent').prop('checked', this.checked);
    });
});