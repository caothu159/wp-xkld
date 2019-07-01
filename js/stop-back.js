(function () {
    function stopBack(event) {
        console.log(event.srcElement.location.href);
        history.pushState(null, null, document.URL);
        console.log(event);
        event.preventDefault();
        return false;
    }

    /**
     * Run our priority+ function as soon as pop to state
     */
    window.addEventListener('popstate', function (event) {
        return stopBack(event);
    });

    /**
     * Run our priority+ function as soon as onpopstate
     */
    window.onpopstate = function (event) {
        return stopBack(event);
    };

    /**
     * Run our priority+ function
     */
    // stopBack();
})();
