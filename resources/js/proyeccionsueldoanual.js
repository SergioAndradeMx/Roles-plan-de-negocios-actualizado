document.addEventListener("DOMContentLoaded", function () {
    let bodys = document.querySelector("table tbody");
    let filas = bodys.querySelectorAll("tr");
    var arraydatos = [];
    filas.forEach(function (fila) {
        // Obtiene el id a cual pertenece el dato.
        let id_pertenece = fila.querySelector('td[id_pertenece]').getAttribute('id_pertenece');
        // Obtenemos todas las columnas.
        let columnas = fila.querySelectorAll('td');
        // Creamos
        arraydatos[id_pertenece] = [];
        // console.log(JSON.stringify(diccionario));
        for (let index = 1; index < columnas.length; index++) {
            // Obtenemos el input de la columna.
            let input = columnas[index].querySelector('input');
            // Creación de evento para el input
            agregarEventInputs(input);
            // Obtenemos el id al cual pertenece
            let id_actual = columnas[index].getAttribute('id_actual');
            // Se lo asignamos al diccionario
            arraydatos[id_pertenece].push([id_actual, parseFloat(input.value)]);
        } // FIN DEL FOR
    });
    var filaResultado = document.getElementById("totales");
    var columnaResultado = filaResultado.children;
    asignaciónResultadoFila(columnaResultado,arraydatos);
    //  console.log(arraydatos);

    function agregarEventInputs(input) {
        input.addEventListener("blur", function () {
            let columnaTd = input.closest('td');
            // Obtener la fila de la tabla
            let filaTr = columnaTd.closest('tr');
            // Obtener la posición del input que se dejo de escribir.
            let columnaPosición = columnaTd.cellIndex;
            // Obtener a cual pertenece
            let id_pertenece = filaTr.querySelector('td[id_pertenece]').getAttribute('id_pertenece');
            console.log(arraydatos);
            if (input.value.trim()) {
                if (input.value != arraydatos[id_pertenece][columnaPosición - 1][1]) {
                    arraydatos[id_pertenece][columnaPosición - 1][1] = parseFloat(input.value);
                    asignaciónResultadoFila(columnaResultado,arraydatos);
                }
            } else {
                input.value = 0;
                arraydatos[id_pertenece][columnaPosición - 1][1] = 0;
                alert("No se permite Vacio")
            }
        });
    }

    function asignaciónResultadoFila(columnasFila, estructuraBody) {
        // Obtengo las llaves del diccionario
        let filaResultado = document.getElementsByTagName("tfoot");
        let claves = Object.keys(estructuraBody);
        // Recorro 5 veces por los cinco años que son.
        for (let indexColumna = 0; indexColumna < columnasFila.length - 1; indexColumna++) {
            // Creo una variable el cual obtendrá la suma total del resultado
            let sumaResultado = 0;
            // For que recorre por filas
            for (let index = 0; index < claves.length; index++) {
                // Hace la sumatoria de la columna correspondiente
                sumaResultado += estructuraBody[claves[index]][indexColumna][1];
            }   // Fin del for filas.
            // Escribe el valor de la columna correspondiente
            columnasFila[indexColumna + 1].innerHTML = '$' + sumaResultado.toFixed(2);
        } // Fin del for de columnas.
    } // Fin de la función asignar valores en la fila resultado
});
