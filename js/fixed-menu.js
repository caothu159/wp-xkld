(function () {

    function hasFixed() {
        let scrollTop = window.pageYOffset || (document.documentElement || document.body.parentNode || document.body).scrollTop;
        let navContainer = document.querySelector('.main-navigation');

        navContainer.classList.toggle("has-fixed", scrollTop > 0);
    }

    /**
     * Run our priority+ function as soon as the document is `ready`
     */
    document.addEventListener('DOMContentLoaded', function () {
        hasFixed();
    });

    /**
     * Run our priority+ function on load
     */
    window.addEventListener('load', function () {
        hasFixed();
    });

    /**
     * Run our priority+ function every time the window resizes
     */
    window.addEventListener('resize', function () {
        hasFixed()
    }, false);

    /**
     * Run our priority+ function every time scroll
     */
    window.addEventListener("scroll", function () {
        hasFixed();
    }, false)

    /**
     * Run our priority+ function
     */
    hasFixed();
})();
