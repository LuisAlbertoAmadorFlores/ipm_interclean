$(document).ready(function () {

    $('#menu_items_bar').hide();
    let flatMenu = 0;
    let menu = document.getElementById('home-container');
    let container_logo = document.getElementsByClassName('container-logo');
    let logo = document.getElementById('logo');
    let dashboard = document.getElementById('dashboard');

    $('#showContainer').click(function () {

        if (flatMenu == 0) {
            menu.style.width = "65px";
            container_logo[0].style.height = "5vh";
            dashboard.style.width = "calc(100% - 65px)";
            logo.setAttribute("src", 'img/icono.png');
            $('#menu_items_bar').show();
            $('#menu_items').hide();
            $('#showContainer').removeClass('fa-arrow-left');
            $('#showContainer').addClass('fa-arrow-right');
            $('#container-arrow').removeClass('justify-content-end');
            $('#container-arrow').removeClass('me-2');
            $('#container-arrow').addClass('justify-content-center');
            $('#logo').addClass('logo-mini');
            flatMenu = 1;
        } else {
            menu.style.width = "270px";
            container_logo[0].style.height = "15vh";
            dashboard.style.width = "calc(100% - 250px)";
            $('#showContainer').addClass('fa-arrow-left');
            $('#showContainer').removeClass('fa-arrow-right');
            $('#container-arrow').removeClass('justify-content-center');
            $('#container-arrow').addClass('justify-content-end');
            $('#container-arrow').addClass('me-2');
            $('#logo').removeClass('logo-mini');
            logo.setAttribute("src", 'img/logo.png');
            $('#menu_items_bar').hide();
            $('#menu_items').show();
            flatMenu = 0;
        }

    });

    $('.openmenu').click(function () {
        if (flatMenu == 0) {
            menu.style.width = "65px";
            container_logo[0].style.height = "5vh";
            dashboard.style.width = "calc(100% - 65px)";
            logo.setAttribute("src", 'img/icono.png');
            $('#menu_items_bar').show();
            $('#menu_items').hide();
            $('#showContainer').removeClass('fa-arrow-left');
            $('#showContainer').addClass('fa-arrow-right');
            $('#container-arrow').removeClass('justify-content-end');
            $('#container-arrow').removeClass('me-2');
            $('#container-arrow').addClass('justify-content-center');
            $('#logo').addClass('logo-mini');
            flatMenu = 1;
        } else {
            menu.style.width = "270px";
            container_logo[0].style.height = "15vh";
            dashboard.style.width = "calc(100% - 250px)";
            $('#showContainer').addClass('fa-arrow-left');
            $('#showContainer').removeClass('fa-arrow-right');
            $('#container-arrow').removeClass('justify-content-center');
            $('#container-arrow').addClass('justify-content-end');
            $('#container-arrow').addClass('me-2');
            $('#logo').removeClass('logo-mini');
            logo.setAttribute("src", 'img/logo.png');
            $('#menu_items_bar').hide();
            $('#menu_items').show();
            flatMenu = 0;
        }
    })


});