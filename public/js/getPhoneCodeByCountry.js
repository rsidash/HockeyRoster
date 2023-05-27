let getPhoneCodeByCountryUrl = $('#getPhoneCodeByCountry').attr('url');
//let token = $('#getPhoneCodeByCountry').attr('token');

$(document).ready(function () {
    $('#country').on('change', function () {
        let country_id = this.value;
        $.ajax({
            url: getPhoneCodeByCountryUrl,
            type: "POST",
            data: {
                country_id: country_id,
                _token: token
            },
            dataType: 'json',
            success: function (result) {
                $.each(result, function (key, value) {
                    $('#phoneCode option[value="' + value.country_code + ' ' + value.phone_code +'"]').prop('selected', true)
                });
            }
        });
    });
});
