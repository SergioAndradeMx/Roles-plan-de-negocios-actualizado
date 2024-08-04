document.addEventListener("DOMContentLoaded", function () {
    let a = document.querySelectorAll("ol a");
    // Asignarle el evento
    a.forEach((ae) => {
        // Se agregan los eventos.
        ae.onmouseover = function () {
            ae.querySelector('span').classList.replace('bg-gray-700', 'bg-green-500');
            ae.querySelector('h3').classList.add('text-green-500');
            ae.querySelector('svg').classList.replace('dark:text-gray-400', 'dark:text-white');

        };

        ae.onmouseout = function () {
            ae.querySelector('span').classList.replace('bg-green-500', 'bg-gray-700');
            ae.querySelector('h3').classList.replace('text-green-500', 'text-gray-400');
            ae.querySelector('svg').classList.replace('dark:text-white', 'dark:text-gray-400');
        };
    });
});
