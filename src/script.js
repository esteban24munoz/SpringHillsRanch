window.onload = function() {
    const menu_btn = document.querySelector('.hamburger');
    const mobile_menu = document.querySelector('.mobile-nav');
    const body_scroll = document.querySelector('body');


    menu_btn.addEventListener('click', function() {
        menu_btn.classList.toggle('is-active');
        mobile_menu.classList.toggle('is-active');
        body_scroll.classList.toggle('is-active');
    });

    // mobile_menu.addEventListener('onchange', function() {
    //     mobile_menu.classList.remove('is-active');
    // });
}