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


    // Related carousel
    $('.related-carousel').owlCarousel({
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

    //call api province vn
    const apiUrl = 'https://vapi.vnappmob.com/api/province/';
    
    fetch(apiUrl, { 
        method: "GET"
    })
    .then(function(response) {
        return response.json();
    })
    .then(function(data) {
        data.results[0] = {
            province_id: 0,
            province_name: '--- Chọn tỉnh/thành phố ---'
        };
        let htmls = data.results.map(function(province) {
            if(province.province_id === 0) 
                return `<option value="">${province.province_name}</option>`;
            else 
                return `<option id="${province.province_id}" value="${province.province_name}">${province.province_name}</option>`;
        });
        $('#province_vn').html(htmls);
    })
    .catch(function(err) {
        console.log(`API Province Error: ${err}`);
    });

    //change province
    $('#province_vn').on('change', function() {
        let provinceId = $(this).find('option:selected').attr('id');
        //ajax call api district
        $.ajax({
            type: 'GET',
            url: `https://vapi.vnappmob.com/api/province/district/${provinceId}`,
            success: function (data) {
                data.results[0] = {
                    district_id: 0,
                    district_name: '--- Chọn quận/huyện ---'
                };
                let htmls = data.results.map(function(distrist) {
                    return `<option id="${distrist.district_id}" value="${distrist.district_name}">${distrist.district_name}</option>`;
                });
                $('#distrist_vn').html(htmls);
            },
            error: function (err) {
                console.log(`Call ajax api district error: ${err}`);
            }
        });
    });

    //change district
    $('#distrist_vn').on('change', function() {
        let districtId = $(this).find('option:selected').attr('id');
        //ajax call api ward
        $.ajax({
            type: 'GET',
            url: `https://vapi.vnappmob.com/api/province/ward/${districtId}`,
            success: function (data) {
                data.results[0] = {
                    ward_id: 0,
                    ward_name: '--- Chọn xã/phường ---'
                };
                let htmls = data.results.map(function(ward) {
                    return `<option id="${ward.ward_id}" value="${ward.ward_name}">${ward.ward_name}</option>`;
                });
                $('#ward_vn').html(htmls);
            },
            error: function (err) {
                console.log(`Call ajax api ward error: ${err}`);
            }
        });
    });
    
})(jQuery);

