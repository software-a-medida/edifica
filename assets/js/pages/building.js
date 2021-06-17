"use strict";

$( document ).ready(function ()
{
    var owlSlideshowProjects = $('.slideshow-projects').owlCarousel({
        items:1,
        margin:0,
        nav:false,
        dots:true,
        autoplay:true,
        autoplayTimeout:4000,
        rewind:true,
        autoHeight:true
    });

    $('[slideshow-projects-buttons] .prev').on('click', function ()
    {
        owlSlideshowProjects.trigger('prev.owl.carousel');
    });

    $('[slideshow-projects-buttons] .next').on('click', function ()
    {
        owlSlideshowProjects.trigger('next.owl.carousel');
    });
});
