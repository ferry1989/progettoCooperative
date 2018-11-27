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