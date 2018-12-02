
function highlightRequiredFields(forms,labels) {
    var cont = 0;

    for(var form of forms) {
        if( $(labels[cont])[0].innerHTML.indexOf('*') > -1 && ( form.value == "" || form.value == "-1") ){
            $(form).addClass('required');
        }
        cont++;
    }
}

function checkMandatoryFields(forms,labels) {
    var cont = 0;

    for(var form of forms) {
        if( $(labels[cont])[0].innerHTML.indexOf('*') > -1 && form.value == "" ){
            highlightRequiredFields(forms,labels);
            return false;
        }
        cont++;
    }
    return true;
}

$(document).ready(function() {

    var state = $('select[name="stato"]');

    $('input[name="codiceiban"]').prop('disabled',true);
    $('select[name="id_sedeprogetto"]').prop('disabled',true);
    $('input[name="nomeolp"]').prop('disabled',true);
    $('input[name="cognomeolp"]').prop('disabled',true);
    
    state.on('change',function(){
        $('input[name="codiceiban"]').prop('disabled', !(state.val() == 'Attivo'));
        $('select[name="id_sedeprogetto"]').prop('disabled', !(state.val() == 'Attivo'));
        $('input[name="nomeolp"]').prop('disabled', !(state.val() == 'Attivo'));
        $('input[name="cognomeolp"]').prop('disabled', !(state.val() == 'Attivo'));
    });

});