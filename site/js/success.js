
function generalInsert(msg) {
    msg.error ? alert(msg.error) : alert(msg.success);
}

function regioni (regioni) {
    for (i in regioni){
      $('.utente').find('select[name*="regione"]').append('<option value=' + regioni[i].id_regione + '>' + regioni[i].ragioneSociale + '</option>');
    }                       
}