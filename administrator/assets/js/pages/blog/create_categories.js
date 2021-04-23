$( document ).ready(function ()
{
    $('form[name="create_category"]').ajaxSubmit({
        url: 'index.php?c=blog&m=create_category',
        callback: function( response )
        {
            swal({
                title: 'Se agregó la categoría.',
                type: 'success',
                showLoaderOnConfirm: true,
                allowOutsideClick: false,
                preConfirm: function ()
                {
                    return new Promise(function (resolve)
                    {
                        window.location.href = response.redirect;

                        setTimeout(function ()
                        {
                            resolve();
                        }, 5000);
                    });
                }
            });
        }
    });
});
