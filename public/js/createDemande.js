var selector = '#create-Demande-form';
var form = $(selector)[0];
$.ajaxSetup(
        {
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            }
        }
);

$(selector).submit(function (e)
{
    var formData = new FormData($(selector)[0]);
    //var file = $('#image')[0].files[0];
    e.preventDefault();
    showLoader();
    $('input+strong').text('');
    $('input').parent().removeClass('has-error');
    $.ajax({
        url: $(form).attr('action'),
        method: 'POST',
        data: formData,
        dataType: 'json',
        processData: false,
        contentType: false,
    })
            .done(function (data) {

                closeLoader();

                if (data.success)
                {
                    success(data.message);
                    $(form).trigger('reset');
                } else
                {
                    if (data.url)
                    {
                        window.location.href = data.url;
                    }
                }
            })
            .fail(function (data) {
                closeLoader();
                $.each(data.responseJSON.errors, function (key, value) {
                    if (key.startsWith('documents')) {
                        error('Les documents doivent être des images ou des fichiers PDF');
                    } else {
                        var input = selector + ' input[name=' + key + ']';
                        $(input + '+strong').text(value);
                        $('input').parent().addClass('has-error');
                    }

                });
            });
});

