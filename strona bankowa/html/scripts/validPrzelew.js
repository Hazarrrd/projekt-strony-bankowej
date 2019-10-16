$(document).ready(function () {
    
    $('#amount').change(function () {
        let value = $(this).val();
        value = parseFloat(value);
        value = parseFloat(value.toFixed(2));
        $(this).val(value);
    })
    
})