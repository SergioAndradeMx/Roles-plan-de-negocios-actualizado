// TODO: Se ejecutara después de que cargue el html
document.addEventListener("DOMContentLoaded", function () {

    // * Creación de diccionarios
    let diccionarioFijo = {};
    let diccionarioVariable = {};
    let diccionarioIngreso = {};

    // * Obtengo los bodys de mi tabla
    let bodys = document.querySelectorAll("#miTabla tbody");

    // TODO: Obtengo los valores de la tabla
    // Obtener los costos Fijos.
    obtenerLosDatos(bodys[0], diccionarioFijo);
    // Obtener los costos Variables
    obtenerLosDatos(bodys[1], diccionarioVariable);
    // Obtengo los Ingresos.
    obtenerLosDatos(bodys[2], diccionarioIngreso);


    // Obtengo la fila de resultados de costos fijos
    let filaResultado = document.getElementById("costosFijos");
    // Obtengo las columnas de la fila de resultados.
    let columnaResultado = filaResultado.children;
    /**
     *  TODO: LLamo a la función que agregara en la columna correspondiente la suma de la fila correspondiente.
     *  * Envió las columnas de la fila " resultado " correspondiente
     */
    asignaciónResultadoFila(columnaResultado, diccionarioFijo);

    // * Obtenemos la fila de resultados de costos variables
    filaResultado = document.getElementById("costosVariable");
    // Obtenemos las columnas de la fila de resultados
    columnaResultado = filaResultado.children;
    // Llamamos la función para que escriba en la columna de resultado correspondiente
    asignaciónResultadoFila(columnaResultado, diccionarioVariable);

    // * Obtengo la fila de resultados de ingresos
    filaResultado = document.getElementById("ingresos");
    columnaResultado = filaResultado.children;
    asignaciónResultadoFila(columnaResultado, diccionarioIngreso);

    // * Llamamos función que calculara las utilidades y asignarlo en la columna correspondiente
    resultadoFinal();

    // TODO: Función para calcular el resultado de las utilidades y asignarlo en la columna correspondiente
    function resultadoFinal() {
        // Obtenemos la filas de fijos, variables, ingresos y utilidades
        let f_resultado_fijo = document.getElementById("costosFijos");
        let f_resultado_variable = document.getElementById("costosVariable");
        let f_resultado_ingreso = document.getElementById("ingresos");
        let f_utilidades = document.getElementById("utilidades");

        // Obtenemos las columnas de sus filas correspondientes
        let columnasFijo = f_resultado_fijo.children;
        let columnasVariable = f_resultado_variable.children;
        let columnasIngreso = f_resultado_ingreso.children;
        let columnasUtilidades = f_utilidades.children;

        // For que calculara el resultado de utilidades y lo asignara en la columna de utilidades correspondiente.
        for (let index = 1; index < 6; index++) {
            // Obtenemos el valor de la columna correspondiente.
            let vFijo = columnasFijo[index].textContent.substring(1);
            let vVariable = columnasVariable[index].textContent.substring(1);
            let vIngreso = columnasIngreso[index].textContent.substring(1);

            // Asignación de la columna correspondiente
            columnasUtilidades[index].innerHTML = "$" + ( parseFloat(vIngreso) - (parseFloat(vFijo) +  parseFloat(vVariable)))
        } // FIN DEL FOR
    } // Fin de la función

    /**
     * TODO: Función que obtendrá los valores de cada input, id_actuales y id_pertenece
     * @param {*} tbody
     * @param {*} diccionario
     */
    function obtenerLosDatos(tbody, diccionario) {
        // Obtenemos las filas del body correspondiente
        let filas = tbody.querySelectorAll('tr');
        filas.forEach(function (fila) {
            // Obtiene el id a cual pertenece el dato.
            let id_pertenece = fila.querySelector('td[id_pertenece]').getAttribute('id_pertenece');
            // Obtenemos todas las columnas.
            let columnas = fila.querySelectorAll('td');
            // Creamos
            diccionario[id_pertenece] = [];
            // console.log(JSON.stringify(diccionario));
            for (let index = 1; index < columnas.length; index++) {
                // Obtenemos el input de la columna.
                let input = columnas[index].querySelector('input');
                // ! Agregar el evento de los inputs.
                // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                // Obtenemos el id al cual pertenece
                let id_actual = columnas[index].getAttribute('id_actual');
                // Se lo asignamos al diccionario
                diccionario[id_pertenece].push([id_actual, parseFloat(input.value)]);
            } // FIN DEL FOR
        });
    } // FIN DE LA FUNCIÓN


    /**
     * TODO: Función que asignara los valores en cada columna de la fila de resultado
     * @param {*} filaResultado
     * @param {*} estructuraBody
     */
    function asignaciónResultadoFila(filaResultado, estructuraBody) {
        // Obtengo las llaves del diccionario
        let claves = Object.keys(estructuraBody);
        // Recorro 5 veces por los cinco años que son.
        for (let index = 0; index < 5; index++) {
            // Creo una variable el cual obtendrá la suma total del resultado
            let sumaResultado = 0;
            // For que recorre por filas
            for (let index = 0; index < claves.length; index++) {
                // Hace la sumatoria de la columna correspondiente
                sumaResultado += estructuraBody[claves[index]][index][1];
            }   // Fin del for filas.
            // Escribe el valor de la columna correspondiente
            filaResultado[index + 1].innerHTML = '$' + sumaResultado.toFixed(2);
        } // Fin del for de columnas.
    } // Fin de la función asignar valores en la fila resultado
});
