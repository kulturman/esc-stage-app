
function showLoader() {
    HoldOn.open({
        theme: "sk-circle",
        message: "<h4>Veuillez patienter</h4>"
    });
}

function closeLoader() {
    HoldOn.close();
}

function success(message) {
    swal(
            'L\'opération est un succès!',
            message,
            'success'
            );
}

function error(message) {
    swal(
            'Echec!',
            message,
            'error'
            );
}

function question(message, yesCallback, noCallback) {

    swal({
        title: 'Etes vous sûr?',
        text: message,
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Oui',
        cancelButtonText: 'Annuler'
    }).then((result) => {
        if (result.value) {
            yesCallback();

        } else if (result.dismiss === swal.DismissReason.cancel) {
            if (noCallback)
                noCallback();
        }
    })
}

function yesOrNoQuestion(title, message, yesCallback, noCallback) {

    swal({
        title: title,
        text: message,
        type: 'info',
        showCancelButton: true,
        confirmButtonText: 'Oui',
        cancelButtonText: 'Non'
    }).then((result) => {
        if (result.value) {
            yesCallback();

        } else if (result.dismiss === swal.DismissReason.cancel) {
            if (noCallback)
                noCallback();
        }
    })
}
$.ajaxSetup(
        {
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            }
        }
);
$('.main-form,.newEntityModal,.ajaxForm').submit(function (e)
{
    e.preventDefault();
    var id = "#" + $(this).attr('id');
    var form = $(id);
    showLoader();
    var data = $(form).serializeArray();
    $('.form-variable').each(function(index , el) {
        data.push({ name: $(el).attr('name') , value: $(el).val() });
    });
    $('input+strong,select+strong,textarea+strong').text('');
    $('#message-block').remove();
    $.ajax({
        url: $(form).attr('action'),
        method: $('input[name="_method"]').val() || $(form).attr('method') || 'POST',
        data: data,
        dataType: 'json'
    })
            .done(function (data) {
                closeLoader();
                if (data.success) {
                    if(data.dialog)
                        success(data.message);
                    else {
                        var message = '<div id="message-block" class="alert alert-block alert-success">' +
                			data.message + '</div>';
                        $('.card')
                            .before(message);
                    }
                    if(data.reset)
                        $(form).trigger('reset');
                    if (ajaxFormHandlerSuccessCallback){
                        ajaxFormHandlerSuccessCallback(data);
                    }
                }
                else {
                    error(data.message);
                }
                if (data.url) {
                    window.location.href = data.url;
                }
            })
            .fail(function (data) {
                closeLoader();
                $.each(data.responseJSON.errors, function (key, value) {
                    var input = id + ' [name=' + key + ']';
                    var arrayInput = id + ' [name="' + key + '[]"]';
                    $(input + '+strong').text(value);
                    $(arrayInput + '+strong').text(value);
                });
            });
            
});
