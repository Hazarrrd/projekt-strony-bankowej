$(document).ready(function () {
    
    $("#haslo").change(function () {
        if($('#haslo').val() !=$('#hasloPowtorz').val()) {
            $('input[type="submit"]').prop('disabled', true);
        }
        else {
            $('input[type="submit"]').prop('disabled', false);
        }
    })

    $("#hasloPowtorz").change(function () {
        if($('#haslo').val() != $('#hasloPowtorz').val()) {
            $('input[type="submit"]').prop('disabled', true);
        }
        else {
            $('input[type="submit"]').prop('disabled', false);
        }
    })
    
})

