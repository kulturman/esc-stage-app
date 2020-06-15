$(document).on('click' , '.delete-btn' , function (e) {
    e.preventDefault();
    var that = $(this);
    var url = that.attr('href');
    question('Cette opération est irréversible', function () {
        showLoader();
        $.ajax({
            method: 'DELETE',
            url: url
        }).done(function (data) {
            closeLoader();
            if (data.success) {
                success(data.message);
                LaravelDataTables["dataTableBuilder"].draw();
            }
        }).fail(function () {
            closeLoader();
        })
    })
})