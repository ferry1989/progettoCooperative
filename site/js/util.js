
function highlightRequiredFields(forms,labels) {
    var cont = 0;

    for(var form of forms) {
        if( $(labels[cont])[0].innerHTML.indexOf('*') > -1 && ( form.value == "" || form.value == "-1" ) ){
            $(form).addClass('required');
            $(form).parent().append('<label class="textrequired">CAMPO OBBLIGATORIO</label>');
        }
        cont++;
    }
}

function checkMandatoryFields(forms,labels) {
    var cont = 0;

    for(var form of forms) {
        if( $(labels[cont])[0].innerHTML.indexOf('*') > -1 && ( form.value == "" || form.value == "-1" ) ){
            highlightRequiredFields(forms,labels);
            return false;
        }
        cont++;
    }
    return true;
}

function generatePassword() {
    var randomPassword = Math.random().toString(36).slice(-10)+Math.random().toString(36).slice(-5);
    $('input[name="password"]').val(randomPassword);
}

function sendMail() {
    $.ajax({
        type: 'POST',
        url: 'https://mandrillapp.com/api/1.0/messages/send.json',
        data: {
            'key': 'YOUR API KEY HERE',
            'message': {
                'from_email': 'YOUR@EMAIL.HERE',
                'to': [{
                    'email': 'RECIPIENT@EMAIL.HERE',
                    'name': 'RECIPIENT NAME (OPTIONAL)',
                    'type': 'to'
                }],
                'autotext': 'true',
                'subject': 'YOUR SUBJECT HERE!',
                'html': 'YOUR EMAIL CONTENT HERE! YOU CAN USE HTML!'
            }
        }
    }).done(function(response) {
    });
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

    $('.form-control').on('input',function(){
        var check = $(this);
        if( check.value == "" ){
            check.addClass('required');
            check.parent().children('label.textrequired').remove();
        }else{
            check.removeClass('required');
            check.parent().children('label.textrequired').remove();
        }
    });

    $(document).on('click','.genpassword',generatePassword);

});