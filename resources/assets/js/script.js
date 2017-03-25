(function (){
    'user strict';

    var bar = document.getElementsByClassName('header-mobile-menu')[0];
    var menu = document.getElementsByClassName('header-pc-menu')[0];

    bar.addEventListener('click', function(){
        if (menu.style.display != 'block') {
            menu.style.display = 'block'
        } else {
            menu.style.display = '';
        }
    });


})();