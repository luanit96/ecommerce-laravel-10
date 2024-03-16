$(() => {
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
});