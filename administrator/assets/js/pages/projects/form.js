$( document ).ready(function ()
{
    $.app.editorTinymce();
    $.app.uploadImagePreview();

    $("input[name='price']").mask("#,###,###.00", {reverse: true});

    $( document ).on('click', '[data-add-gallery]', function ()
    {
        let self = $(this);
        let content = self.parents('[target-preview-gallery]');
        let random = Math.random().toString(36).substring(7);

        content.append('<div id="'+ random +'" class="col-lg-3 m-b-20" elm-generated> <div class="label"> <label class="upload_image_preview m-0"> <figure class="m-0"></figure> <button type="button" class="btn btn-block btn-danger d-none" delete-elm>Eliminar</button> <input type="file" name="gallery[]" accept="image/*" /> </label> </div> </div>');

        $('#'+ random).find('input').trigger( "click" );
    });

    $( document ).on('imageIsValid', 'input[type="file"]', function ( event )
    {
        let self = event.detail.self;
        let content = self.parents('.label').parent();

        content.attr('data-image-box-item', true);
        content.find('label > figure').prepend('<img class="img-fluid" src="'+ event.detail.image +'">');
        content.find('button.d-none').removeClass('d-none');
    });

    $( document ).on('imageIsInvalid', 'input[type="file"]', function ( event )
    {
        let self = event.detail.self;
        let content = self.parents('[elm-generated]');

        content.remove();
    });

    $( document ).on('click', '.upload_image_preview > .btn[data-delete-image]', function ()
    {
        let button = $(this);
        let container = button.parents('[data-image-box-item]');
        let id = button.data('delete-image');

        swal({
            text: '¿Deseas eliminar la imágen de la galería?',
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
                    $('form[name="project"]').append('<input type="hidden" name="image_delete[]" value="'+ id +'" />');
                    container.remove();

                    setTimeout(function ()
                    {
                        resolve();
                    }, 200);
                });
            }
        });
    });

    $('form[name="project"]').ajaxSubmit({
        callback: function( response )
        {
            if ( response.status == 'fatal_error' )
                alertify.error(response.message);

            if ( response.status == 'OK' )
            {
                swal({
                    title: 'Proyecto guardado.',
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
        }
    });
});
