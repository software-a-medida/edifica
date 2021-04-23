"use strict";

$('form[name="contact"]').on('submit', function(e)
{
    e.preventDefault();

    var form = $(this);

    $.ajax({
        type: 'POST',
        data: form.serialize(),
        processData: false,
        cache: false,
        dataType: 'json',
        success: function(response)
        {
            if (response.status == 'success')
            {
                alert('Gracias por ponerte en contacto');
                location.reload();
            }
            else if (response.status == 'error')
            {
                var errors = '';

                for (var i = 0; i < response.errors.length; i++)
                    errors = errors + response.errors[i] + ' - ';

                alert(errors);
            }
        }
    });
});

function map()
{
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 13,
        center: {
            lat: 21.0274296,
            lng: -89.6016836
        }
    });

    var circle_forestes = new google.maps.Circle({
        strokeColor: '#fa7268',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: '#fa7268',
        fillOpacity: 0.2,
        map: map,
        center: {
            lat: 21.0274296,
            lng: -89.6016836
        },
        radius: 100
    });

    var marker_forestes = new google.maps.Marker({
        position: {
            lat: 21.0274296,
            lng: -89.6016836
        },
        map: map
    });

    var title_forestes = new google.maps.InfoWindow({
        content: 'Forestes'
    });

    title_forestes.open(map, marker_forestes);

    var circle_serena = new google.maps.Circle({
        strokeColor: '#fa7268',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: '#fa7268',
        fillOpacity: 0.2,
        map: map,
        center: {
            lat: 21.0630474,
            lng: -89.6703634
        },
        radius: 100
    });

    var marker_serena = new google.maps.Marker({
        position: {
            lat: 21.0630474,
            lng: -89.6703634
        },
        map: map
    });

    var title_serena = new google.maps.InfoWindow({
        content: 'Serena'
    });

    title_serena.open(map, marker_serena);
}
