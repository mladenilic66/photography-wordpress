$('a[href="#"').on('click', function(e) {
    e.preventDefault();
});

/* ---------------------------------------------------------------------------------- */

// toggle attribute value plugin
$.fn.toggleAttr = function(attr, attr1, attr2) {
    return this.each(function() {
        var self = $(this);

        if (self.attr(attr) == attr1)
            self.attr(attr, attr2);
        else
            self.attr(attr, attr1);
    });
};

// add carot to to li tag on click
$(document).ready(function() {
    $('.categories ul li').on('click', function() {
        $(this).parent().find('li').removeClass('active');
        $(this).addClass('active');
    });
});

/* ---------------------------------------------------------------------------------- */

// sticky category nav
$(window).scroll(function() {
    if ($(this).scrollTop() > 363){  
       $('.categories').addClass('fix');
    } else {
       $('.categories').removeClass('fix');
    }
});

/* ---------------------------------------------------------------------------------- */

// show 'read more' button on hover
$(function() {
    $('.post-image').on('mouseenter',function() {
        $('.post-read-more').fadeIn();
    });

    $('.post-image').on('mouseleave',function() {
        $('.post-read-more').fadeOut();
    });
});

/* ---------------------------------------------------------------------------------- */

// headline and paragraph z-index fix
z_fix = $("h1, h2, h3, p");

$(window).resize(function() {
    z_fix.css("z-index", 1);
});

/* ---------------------------------------------------------------------------------- */

// show or hide menu pages / hidden attribute fix
$(document).ready(function() {
    
    var respmenu  = $('.menu-bars');
    var menu      = $('.menu-cat');
    var main_nav  = $('.nav-slide');

    $(respmenu).on('click', function(e) {
        e.preventDefault();
        menu.slideToggle('slow');
        main_nav.slideToggle('slow');
        $('.header-wrap h2').fadeToggle();
    });
  
    $(window).resize(function(){

       var window_width = $(window).width();

       if(window_width > 768 && menu.is(':hidden') && main_nav.is(':hidden')) {
            menu.removeAttr('style');
            main_nav.removeAttr('style');
        } 
    });
});