(function ($) {
    "use strict";
    
    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 992) {
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });

    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Vendor carousel
    $('.vendor-carousel').owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0:{
                items:2
            },
            576:{
                items:3
            },
            768:{
                items:4
            },
            992:{
                items:5
            },
            1200:{
                items:6
            }
        }
    });


    //logout 
    $('.btnLogout').click(function() {
        $('.formLogout').submit();
    });

    // Related carousel
    $('.related-carousel').owlCarousel({
        center: true,
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:3
            },
            992:{
                items:4
            }
        }
    });

    //show end hidden product content detail

    if($('#product-detail-content-wrapper').length) {
        if($('#product-detail-content-wrapper').html().length <= 1850) 
            $('#viewAllContent').css('display', 'none');
    }

    $('#viewAllContent').on('click', function() {
        if($(this).attr('data') === 'show') {
            $('#product-detail-content-wrapper').css('height', 'auto');
            $(this).attr('data', 'hidden');
            $(this).text('Thu gọn');
        } else {
            $('#product-detail-content-wrapper').css('height', '300px');
            $(this).attr('data', 'show');
            $(this).text('Xem thêm');
        }
    });

    //checkbox sample change image
    $('.custom-radio-button input').on('click', function() {
        let dataUrl = $(this).attr('data-url');
        let id = $(this).val(); 
        $('.feature-image img').attr('src', dataUrl);
    });

    // Product Quantity
    $(".btn-quantity").on("click", function () {

        let button = $(this);
        let oldValue = button.closest('.sp-quantity').find("input.quantity-input").val();

        if (button.text() == "+") {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }

        button.closest('.sp-quantity').find("input.quantity-input").val(newVal);

    });

    //Search ajax autocomplete
    var availableTags = [];

    $.ajax({
        type: 'GET',
        url: '/product-list-ajax',
        success: function (data) {
            startAutocomplete(data);
        }
    });

    function startAutocomplete(availableTags) {
        $( "#search-product" ).autocomplete({
            source: availableTags
        });
    }
    
})(jQuery);

