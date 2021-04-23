"use strict";

$( document ).ready(function ()
{
    var owlSlideshowProjects = $('.slideshow-projects').owlCarousel({
        items:1,
        margin:0,
        nav:false,
        dots:true,
        autoplay:true,
        autoplayTimeout:1500,
        rewind:true
    });

    $('#slideshow-projects-buttons .prev').on('click', function ()
    {
        owlSlideshowProjects.trigger('prev.owl.carousel');
    });

    $('#slideshow-projects-buttons .next').on('click', function ()
    {
        owlSlideshowProjects.trigger('next.owl.carousel');
    });
});

function map()
{
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 17,
        center: {
            lat: 21.0630474,
            lng: -89.6703634
        }
    });

    var circle = new google.maps.Circle({
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

    var marker = new google.maps.Marker({
        position: {
            lat: 21.0630474,
            lng: -89.6703634
        },
        map: map
    });

    var title = new google.maps.InfoWindow({
        content: 'Serena'
    });

    title.open(map, marker);
}
