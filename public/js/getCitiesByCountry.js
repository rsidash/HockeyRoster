let getCitiesByCountryUrl = $('#getCitiesByCountry').attr('url');
let token = $('#getCitiesByCountry').attr('token');

$(document).ready(function () {
    $('#country').on('change', function () {
        let country_id = this.value;
        $("#city").html('');
        $.ajax({
            url: getCitiesByCountryUrl,
            type: "POST",
            data: {
                country_id: country_id,
                _token: token
            },
            dataType: 'json',
            success: function (result) {
                $('#city').html('<option value="">Выберите город...</option>');
                $.each(result, function (key, value) {
                    $("#city").append('<option value="' + value.id + '">' + value.name + '</option>');
                });
            }
        });
    });
});
