$(document).ready(function() {

    var state = $('select[name="stato"]');

    $('input[name="codiceiban"]').prop('disabled',true);
    
    state.on('change',function(){
        $('input[name="codiceiban"]').prop('disabled', !(state.val() == 'Attivo'));
    });

});