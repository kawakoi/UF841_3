$(document).ready(function(){
    $('.menu li:has(ul)').click(function(e){/*seleccionamos los elementos "li" de nuestro menú, SOLO los que tienen "ul" (solo 2)*/
        e.preventDefault();

        if ($(this).hasClass('activado')){/*Si el elemento que fue clickado tiene la clase "activado"*/
            $(this).removeClass('activado');/*removemos la clase "activado"*/
            $(this).children('ul').slideUp();/*accedemos al submenú "hijo" de la lista y lo ocultamos con "slideUp"*/
        } else {
            $('.menu li ul').slideUp();/*Ocultamos todos los elementos del menu "ul"*/
            $('.menu li').removeClass('activado');/*Les quitamos a TODOS (las dos listas) los elementos la clase "activado"*/
            $(this).addClass('activado');/*Le ponemos la clase "activado" SOLO al elemento que fue clickado*/
            $(this).children('ul').slideDown();/*mostraremos con "slideDown" todos los elementos de la lista*/
        }
    });

    $('.btn-menu').click(function(){
        $('.contenedor-menu .menu').slideToggle();
    });

    $(window).resize(function(){
        if ($(document).width() > 450){
            $('.contenedor-menu .menu').css({'display' : 'block'});
        }

        if ($(document).width() > 450){
            $('.contenedor-menu .menu').css({'display' : 'none'});
            $('.menu li ul').slideUp();
            $('.menu li').removeClass('activado');
        }
    });

    $('.menu li ul li a').click(function(){
        window.location.href= $(this).attr("href");
    });
});