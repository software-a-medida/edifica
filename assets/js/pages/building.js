"use strict";

$( document ).ready(function ()
{
    let settingSlide = {
        items:1,
        margin:0,
        nav:false,
        dots:true,
        autoplay:true,
        autoplayTimeout:4000,
        rewind:true,
        autoHeight:true
    };

    var gallery_portfolio = $('.slideshow-projects.gallery_portfolio').owlCarousel(settingSlide);
    var gallery_deliveries = $('.slideshow-projects.gallery_deliveries').owlCarousel(settingSlide);
    var gallery_ready_constructions = $('.slideshow-projects.gallery_ready_constructions').owlCarousel(settingSlide);

    $('[slideshow-projects-buttons].gallery_portfolio .prev').on('click', function ()
    {
        gallery_portfolio.trigger('prev.owl.carousel');
    });

    $('[slideshow-projects-buttons].gallery_portfolio .next').on('click', function ()
    {
        gallery_portfolio.trigger('next.owl.carousel');
    });

    $('[slideshow-projects-buttons].gallery_deliveries .prev').on('click', function ()
    {
        gallery_deliveries.trigger('prev.owl.carousel');
    });

    $('[slideshow-projects-buttons].gallery_deliveries .next').on('click', function ()
    {
        gallery_deliveries.trigger('next.owl.carousel');
    });

    $('[slideshow-projects-buttons].gallery_ready_constructions .prev').on('click', function ()
    {
        gallery_ready_constructions.trigger('prev.owl.carousel');
    });

    $('[slideshow-projects-buttons].gallery_ready_constructions .next').on('click', function ()
    {
        gallery_ready_constructions.trigger('next.owl.carousel');
    });
});
