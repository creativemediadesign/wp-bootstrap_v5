window.addEventListener('DOMContentLoaded', event => {
    var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('.header');
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('fixed-top')
        } else {
            navbarCollapsible.classList.add('fixed-top')
        }

    };

    navbarShrink();

    document.addEventListener('scroll', navbarShrink);

});