(function () {
    function ready(fn) {
        if (document.attachEvent ? document.readyState === "complete" : document.readyState !== "loading") {
            fn();
        } else {
            document.addEventListener('DOMContentLoaded', fn);
        }
    }

    ready(() => {
        let title = document.querySelector('h1');
        let neptune = document.querySelector('.planet');
        setTimeout(() => {
            neptune.classList.add('animate');
            title.classList.add('animate');
        }, 500);
    });
})();