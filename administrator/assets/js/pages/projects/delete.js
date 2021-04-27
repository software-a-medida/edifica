$( document ).ready(function ()
{
    $(document).on('click', '[data-ajax-delete]', function ()
    {
        let self = $(this);
        let message = '';
        let xhr_status = '';

        swal({
            title: 'Confirmar',
            input: 'text',
            text: 'Por favor, escriba "ELIMINAR" para confirmar.',
            confirmButtonColor: '#ff5560',
            confirmButtonText: 'Eliminar',
            showCancelButton: true,
            cancelButtonColor: '#d8d8d8',
            cancelButtonText: 'Cancelar',
            showLoaderOnConfirm: true,
            allowOutsideClick: false,
            preConfirm: function ( var_secure )
            {
                return new Promise(function (resolve)
                {
                    if ( var_secure === 'ELIMINAR' )
                    {
                        swal({
                            title: 'El proyecto se eliminara por completo.',
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#54cc96',
                            cancelButtonColor: '#ff5560',
                            confirmButtonText: 'Eliminar',
                            cancelButtonText: 'Cancelar',
                            showLoaderOnConfirm: true,
                            allowOutsideClick: false,
                            preConfirm: function ()
                            {
                                return new Promise(function (resolve)
                                {
                                    $.post('index.php?c=projects&m=delete', { id: self.data('ajax-delete') }, function(data, status, jqXHR)
                                    {
                                        if ( data.status == 'OK' )
                                        {
                                            xhr_status = 'OK';
                                        }
                                        else
                                        {
                                            xhr_status = 'error';
                                            message = ( !data.message ) ? 'Error' : data.message;
                                        }

                                        setTimeout(function ()
                                        {
                                            resolve();
                                        }, 500);
                                    });
                                });
                            }
                        }).then(function ()
                        {
                            if ( xhr_status == 'OK' )
                            {
                                swal({
                                    type: 'success',
                                    title: 'Eliminado',
                                    html: 'El proyecto se eliminó.',
                                    preConfirm: function ()
                                    {
                                        return new Promise(function (resolve)
                                        {
                                            location.reload();

                                            setTimeout(function ()
                                            {
                                                resolve();
                                            }, 5000);
                                        });
                                    }
                                });
                            }
                            else
                            {
                                swal({
                                    type: 'error',
                                    title: 'Error',
                                    html: message
                                });
                            }
                        });
                    }
                    else
                    {
                        swal({
                            type: 'error',
                            html: 'No se pudo eliminar el proyecto.'
                        });
                    }
                });
            }
        });
    });
});
