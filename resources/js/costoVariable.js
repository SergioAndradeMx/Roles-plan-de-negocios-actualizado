var matrizMultidimensional = [];
document.addEventListener("DOMContentLoaded", function () {
    // ############################### DIV PARA MOSTRAR TODO CORRECTO #######################3
    // Crear el elemento principal div con sus atributos
    const toastDiv = document.createElement('div');
    toastDiv.classList.add('relative', 'z-10');
    toastDiv.setAttribute('aria-labelledby', 'modal-title');
    toastDiv.setAttribute('role', 'dialog');
    toastDiv.setAttribute('aria-modal', 'true');

    // Crear y agregar el div con clase bg-gray-500 bg-opacity-75
    const bgDiv = document.createElement('div');
    bgDiv.classList.add('fixed', 'inset-0', 'bg-gray-500', 'bg-opacity-75', 'transition-opacity');
    toastDiv.appendChild(bgDiv);

    // Crear y agregar el div con clase fixed inset-0 z-10 w-screen overflow-y-auto
    const contentDiv = document.createElement('div');
    contentDiv.classList.add('fixed', 'inset-0', 'z-10', 'w-screen', 'overflow-y-auto');
    toastDiv.appendChild(contentDiv);

    // Crear el div con clase flex y demás clases internas
    const flexDiv = document.createElement('div');
    flexDiv.classList.add('flex', 'min-h-full', 'items-end', 'justify-center', 'p-4', 'text-center', 'sm:items-center', 'sm:p-0');
    contentDiv.appendChild(flexDiv);

    // Crear el div con clases internas para el contenido
    const relativeDiv = document.createElement('div');
    relativeDiv.classList.add('relative', 'transform', 'overflow-hidden', 'rounded-lg', 'bg-white', 'text-left', 'shadow-xl', 'transition-all', 'sm:my-8', 'sm:w-full', 'sm:max-w-lg');
    flexDiv.appendChild(relativeDiv);

    // Crear el div para el contenido principal
    const mainContentDiv = document.createElement('div');
    mainContentDiv.classList.add('bg-white', 'px-4', 'pb-4', 'pt-5', 'sm:p-6', 'sm:pb-4');
    relativeDiv.appendChild(mainContentDiv);

    // Crear el div con clases internas para el contenido del ícono y texto
    const iconTextDiv = document.createElement('div');
    iconTextDiv.classList.add('sm:flex', 'sm:items-start');
    mainContentDiv.appendChild(iconTextDiv);

    // Crear el div para el ícono
    const iconDiv = document.createElement('div');
    iconDiv.classList.add('mx-auto', 'flex', 'h-12', 'w-12', 'flex-shrink-0', 'items-center', 'justify-center', 'rounded-full', 'bg-green-100', 'sm:mx-0', 'sm:h-10', 'sm:w-10');
    iconTextDiv.appendChild(iconDiv);

    // Crear el SVG para el ícono
    const newSVG = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
    newSVG.setAttribute('xmlns', 'http://www.w3.org/2000/svg');
    newSVG.setAttribute('fill', 'none');
    newSVG.setAttribute('viewBox', '0 0 24 24');
    newSVG.setAttribute('stroke-width', '1.5');
    newSVG.setAttribute('stroke', 'currentColor');
    newSVG.classList.add('w-6', 'h-6', 'text-green-600');
    iconDiv.appendChild(newSVG);

    // Crear el path para el ícono y agregarlo al nuevo SVG
    const newPath = document.createElementNS('http://www.w3.org/2000/svg', 'path');
    newPath.setAttribute('stroke-linecap', 'round');
    newPath.setAttribute('stroke-linejoin', 'round');
    newPath.setAttribute('d', 'M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z');
    newSVG.appendChild(newPath);


    // Crear el div para el contenido de texto
    const textContentDiv = document.createElement('div');
    textContentDiv.classList.add('mt-3', 'text-center', 'sm:ml-4', 'sm:mt-0', 'sm:text-left');
    iconTextDiv.appendChild(textContentDiv);

    // Crear el título h3
    const titleH3 = document.createElement('h3');
    titleH3.classList.add('text-base', 'font-semibold', 'leading-6', 'text-gray-900');
    titleH3.id = 'modal-title';
    titleH3.textContent = 'Operacion Exitosa';
    textContentDiv.appendChild(titleH3);

    // Crear el párrafo con el mensaje
    const messageP = document.createElement('p');
    messageP.classList.add('text-sm', 'text-gray-500');
    messageP.textContent = 'Se ha almacenado correctamente.'; // Aquí puedes agregar el mensaje dinámico si lo necesitas
    textContentDiv.appendChild(messageP);

    // Crear el div para el botón de cerrar
    const buttonDiv = document.createElement('div');
    buttonDiv.classList.add('bg-gray-50', 'px-4', 'py-3', 'sm:flex', 'sm:flex-row-reverse', 'sm:px-6');
    relativeDiv.appendChild(buttonDiv);

    // Crear el botón
    const closeButton = document.createElement('button');
    closeButton.type = 'button';
    closeButton.id = 'toast-correcto';
    closeButton.classList.add('mt-3', 'inline-flex', 'w-full', 'justify-center', 'rounded-md', 'bg-white', 'px-3', 'py-2', 'text-sm', 'font-semibold', 'text-gray-900', 'shadow-sm', 'ring-1', 'ring-inset', 'ring-gray-300', 'hover:bg-gray-50', 'sm:mt-0', 'sm:w-auto');
    closeButton.textContent = 'Cerrar';
    buttonDiv.appendChild(closeButton);

    // Agregar el toastDiv al documento
    document.body.appendChild(toastDiv);

    // Ocultar el toastDiv inicialmente
    toastDiv.style.display = 'none';
    // ####################################################################################
    // TODO: Evento para eliminar la alerta de todo correcto
    // Agregar el evento click al botón después de crearlo y agregarlo al DOM
    const botonCorrecto = document.getElementById('toast-correcto');
    botonCorrecto.addEventListener('click', function () {
        toastDiv.style.display = 'none';
        window.location.reload();
    });
    // ################################ Mensaje de campos vacios ####################
    // Crear el elemento principal div con sus atributos
    const newToastDiv = document.createElement('div');
    newToastDiv.classList.add('relative', 'z-10');
    newToastDiv.setAttribute('aria-labelledby', 'modal-title');
    newToastDiv.setAttribute('role', 'dialog');
    newToastDiv.setAttribute('aria-modal', 'true');

    // Crear y agregar el div con clase bg-gray-500 bg-opacity-75
    const newBgDiv = document.createElement('div');
    newBgDiv.classList.add('fixed', 'inset-0', 'bg-gray-500', 'bg-opacity-75', 'transition-opacity');
    newToastDiv.appendChild(newBgDiv);

    // Crear y agregar el div con clase fixed inset-0 z-10 w-screen overflow-y-auto
    const newContentDiv = document.createElement('div');
    newContentDiv.classList.add('fixed', 'inset-0', 'z-10', 'w-screen', 'overflow-y-auto');
    newToastDiv.appendChild(newContentDiv);

    // Crear el div con clase flex y demás clases internas
    const newFlexDiv = document.createElement('div');
    newFlexDiv.classList.add('flex', 'min-h-full', 'items-end', 'justify-center', 'p-4', 'text-center', 'sm:items-center', 'sm:p-0');
    newContentDiv.appendChild(newFlexDiv);

    // Crear el div con clases internas para el contenido
    const newRelativeDiv = document.createElement('div');
    newRelativeDiv.classList.add('relative', 'transform', 'overflow-hidden', 'rounded-lg', 'bg-white', 'text-left', 'shadow-xl', 'transition-all', 'sm:my-8', 'sm:w-full', 'sm:max-w-lg');
    newFlexDiv.appendChild(newRelativeDiv);

    // Crear el div para el contenido principal
    const newMainContentDiv = document.createElement('div');
    newMainContentDiv.classList.add('bg-white', 'px-4', 'pb-4', 'pt-5', 'sm:p-6', 'sm:pb-4');
    newRelativeDiv.appendChild(newMainContentDiv);

    // Crear el div con clases internas para el contenido del ícono y texto
    const newIconTextDiv = document.createElement('div');
    newIconTextDiv.classList.add('sm:flex', 'sm:items-start');
    newMainContentDiv.appendChild(newIconTextDiv);

    // Crear el div para el ícono
    const newIconDiv = document.createElement('div');
    newIconDiv.classList.add('mx-auto', 'flex', 'h-12', 'w-12', 'flex-shrink-0', 'items-center', 'justify-center', 'rounded-full', 'bg-green-100', 'sm:mx-0', 'sm:h-10', 'sm:w-10');
    newIconTextDiv.appendChild(newIconDiv);

    // Crear el SVG para el ícono
    const newIconSVG = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
    newIconSVG.setAttribute('xmlns', 'http://www.w3.org/2000/svg');
    newIconSVG.setAttribute('fill', 'none');
    newIconSVG.setAttribute('viewBox', '0 0 24 24');
    newIconSVG.setAttribute('stroke-width', '1.5');
    newIconSVG.setAttribute('stroke', 'currentColor');
    newIconSVG.classList.add('w-6', 'h-6', 'text-red-500'); // Agregar clase de color naranja

    // Crear el path para el ícono y agregarlo al nuevo SVG
    const newIconPath = document.createElementNS('http://www.w3.org/2000/svg', 'path');
    newIconPath.setAttribute('stroke-linecap', 'round');
    newIconPath.setAttribute('stroke-linejoin', 'round');
    newIconPath.setAttribute('d', 'M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z');
    newIconSVG.appendChild(newIconPath);

    // Agregar el nuevo SVG al div del ícono
    newIconDiv.appendChild(newIconSVG);

    // Crear el div para el contenido de texto
    const newTextContentDiv = document.createElement('div');
    newTextContentDiv.classList.add('mt-3', 'text-center', 'sm:ml-4', 'sm:mt-0', 'sm:text-left');
    newIconTextDiv.appendChild(newTextContentDiv);

    // Crear el título h3
    const newTitleH3 = document.createElement('h3');
    newTitleH3.classList.add('text-base', 'font-semibold', 'leading-6', 'text-gray-900');
    newTitleH3.id = 'modal-title';
    newTitleH3.textContent = 'Advertencia';
    newTextContentDiv.appendChild(newTitleH3);

    // Crear el párrafo con el mensaje
    const newMessageP = document.createElement('p');
    newMessageP.classList.add('text-sm', 'text-gray-500');
    newMessageP.textContent = ''; // Puedes agregar un mensaje dinámico aquí si es necesario
    newTextContentDiv.appendChild(newMessageP);

    // Crear el div para el botón de cerrar
    const newButtonDiv = document.createElement('div');
    newButtonDiv.classList.add('bg-gray-50', 'px-4', 'py-3', 'sm:flex', 'sm:flex-row-reverse', 'sm:px-6');
    newRelativeDiv.appendChild(newButtonDiv);

    // Crear el botón
    const newCloseButton = document.createElement('button');
    newCloseButton.type = 'button';
    newCloseButton.id = 'toast-año';
    newCloseButton.classList.add('mt-3', 'inline-flex', 'w-full', 'justify-center', 'rounded-md', 'bg-white', 'px-3', 'py-2', 'text-sm', 'font-semibold', 'text-gray-900', 'shadow-sm', 'ring-1', 'ring-inset', 'ring-gray-300', 'hover:bg-gray-50', 'sm:mt-0', 'sm:w-auto');
    newCloseButton.textContent = 'Cerrar';
    newButtonDiv.appendChild(newCloseButton);

    // Agregar el nuevo div al documento
    document.body.appendChild(newToastDiv);

    // Ocultar el nuevo div inicialmente
    newToastDiv.style.display = 'none';

    // Evento para cerrar el toast y recargar la página
    const newButtonCorrecto = document.getElementById('toast-año');
    newButtonCorrecto.addEventListener('click', function () {
        newToastDiv.style.display = 'none';

    });
    // ###############################################################################################3
    // TODO: Evento para eliminar la alerta.
    // * Obtengo el boton para cerrar el mensaje.
    const botonCerrar = document.getElementById('cerrarMensaje');
    const divMensaje = document.getElementById('toast-warning');
    if (botonCerrar) {
        botonCerrar.addEventListener('click', function () {
            divMensaje.style.display = 'none';
        })
    }

    // Primero recorre la tabla para saber si hay elementos que envia la base de datos
    let filas = document.querySelectorAll("#miTabla tbody tr");
    filas.forEach(function (fila) {
        // Obtiene los inputs.
        let inputs = fila.querySelectorAll('input[type="text"]');
        // Crea un arreglo el cual obtendra los valores de cada input y agregarlo a la matriz.
        let filaValores = [];
        // Foreach para sacar los valor de cada input
        inputs.forEach(function (input) {
            // Se los asigno a la matriz cada valor
            filaValores.push(input.value);
            eventoInputs(input);
        });
        // Agrego la fila en la mtriz.
        matrizMultidimensional.push(filaValores);
    });
    calcularTotalFijos();
    // Validar el calculo de las filas con los datos de la base de datos.
    calcularFila(4, "Total optimista: $", "optimista");
    calcularFila(5, "Total pesimista: $", "pesimista");

    // Agrego a los botones los eventos.
    let botones = document.querySelectorAll("#miTabla tbody tr button");
    // Recorro los botones para asignarle el evento.
    botones.forEach((boton) => {
        // Se agregan los eventos.
        eventoButton(boton);
    });
    function eventoInputs(input) {
        // Asigno el evento a los inputs.
        input.addEventListener("blur", function () {
            // Obtener el padre
            const tdPadre = input.parentElement;
            // Saber la posicion de la fila del input actual
            let fila = tdPadre.parentNode.rowIndex;
            // Saber la posicion de la columna del input actual
            let columna = tdPadre.cellIndex;
            // Expresion regular la cual valida que sea un numero entero o decimal.
            let regex = /^[-+]?\d*\.?\d+$/;
            // * Verifica cual columna fue seleccionada
            switch (tdPadre.cellIndex) {
                case 0:
                    // Le quito todos los espacios.
                    input.value = input.value.trim();
                    // Le asigno los valor a la posicion correspondiente en la matriz.
                    matrizMultidimensional[fila - 1][columna] = input.value;
                    // Valida para crear una fila.
                    crearFila(fila, tdPadre);
                    // Sale del switch.
                    break;
                // Si es la columna uno entonces hara lo siguiente
                case 1:
                    // Validar que no este vacia y elimina los espacios
                    if (input.value.trim()) {
                        // Valida con la expresion regular que solo se permitan numeros enteros y decimales.
                        if (regex.test(input.value)) {
                            // Despues el mismo valor lo agrega al input
                            input.value = input.value.trim();
                            // Despues lo agrego a la matriz.
                            matrizMultidimensional[fila - 1][columna] = input.value;
                            // Comprueba si el nodo siguiente tiene un valor entonces calcular el total de costo fijo
                            // y revisara que si toda la fila esta completa para crear una nueva fila.
                            columnaSiguiente(tdPadre, fila, columna, input)
                            // En caso de que no sea un numero o un dato valido entonces se hara lo siguiente
                        } else {
                            // Se cambiara el valor en el input actual.
                            input.value = "0";
                            // Se le asignara en la matriz el dato correspondiente
                            matrizMultidimensional[fila - 1][columna] = "0";
                            // Comprueba si el nodo siguiente tiene un valor entonces calcular el total de costo fijo
                            // y revisara que si toda la fila esta completa para crear una nueva fila.
                            columnaSiguiente(tdPadre, fila, columna, input);
                            // Se mostrar en pantalla que solo se permiten numeros
                            newMessageP.textContent = "Solo se permiten números en este campo.";
                            newToastDiv.style.display = 'block';
                        }
                        // * Si esta vacio el valor hara lo siguiente
                    } else {
                        input.value = "";
                        // Asigno el vacio a la matriz en la posicion correspondiente.
                        matrizMultidimensional[fila - 1][columna + 2] = "";
                        // Cambio el valor en la matriz.
                        matrizMultidimensional[fila - 1][columna] = "";
                        // Obtengo el nodo padre que es el td
                        const tdSiguiente = tdPadre.nextElementSibling;
                        // Obtengo el nodo siguiente o sea otro td
                        const totalNodo = tdSiguiente.nextElementSibling;
                        // Le asigno el valor 0
                        totalNodo.querySelector("input").value = "0";
                        // Calculo de nuevo el total costo fijo.
                        calcularTotalFijos();
                    }
                    // Se sale del switch.
                    break;

                // En caso de que sea la columna 2 entonces hara lo siguiente.
                case 2:
                    // Validar que no este vacia y elimina los espacios
                    if (input.value.trim()) {
                        // Valida con la expresion regular que solo se permitan numeros enteros y decimales.
                        if (regex.test(input.value)) {
                            // Despues el mismo valor lo agrega al input
                            input.value = input.value.trim();
                            // Despues lo agrego a la matriz.
                            matrizMultidimensional[fila - 1][columna] = input.value;
                            // Valida el nodo anterior
                            columnaAnterior(tdPadre, input, columna, fila);
                        } else {
                            // Le asigna el valor de cero al input actual
                            input.value = "0";
                            matrizMultidimensional[fila - 1][columna] = "0";
                            // Valido el nodo anterior si tiene un valor.
                            columnaAnterior(tdPadre, input, columna, fila);
                            // Muestra un alert de que esta mal ingresar otra cosa que no sean numeros.
                            newMessageP.textContent = "Solo se permiten números en este campo.";
                            newToastDiv.style.display = 'block';
                        }
                        // * Si esta vacio entonces hara lo siguiente
                    } else {
                        // Le asigno vacio al input actual.
                        input.value = "";
                        // Asigno el vacio a la matriz en la posicion correspondiente.
                        matrizMultidimensional[fila - 1][columna + 1] = "";
                        // cambiO el valor en la matriz.
                        matrizMultidimensional[fila - 1][columna] = "";
                        // Obtengo el nodo padre que es el td
                        const tdSiguiente = tdPadre.nextElementSibling;
                        // Le asigno el valor 0
                        tdSiguiente.querySelector("input").value = "0";
                        // Calculo de nuevo el total costo fijo.
                        calcularTotalFijos();
                    }
                    break;
                case 4:
                    eventoOptimistaConservadorPesimista(input, fila, columna, regex, "Total optimista: $", "optimista", tdPadre);
                    break;
                case 5:
                    eventoOptimistaConservadorPesimista(input, fila, columna, regex, "Total pesimista: $", "pesimista", tdPadre);
                    break;
            }
        });
    }
    /**
     * @description Metodo que hara que calcule el total dependiendo que sea si es optimista,conservador o pesimista
     *  y validara que solo se permitan numeros entero o flotantes.
     * @param {*} input
     * @param {*} fila
     * @param {*} columna
     * @param {*} regex
     * @param {*} texto
     * @param {*} idParrafo
     */
    function eventoOptimistaConservadorPesimista(input, fila, columna, regex, texto, idParrafo, tdPadre) {
        // Validar que no este vacia y elimina los espacios
        if (input.value.trim()) {
            // Valida con la expresion regular que solo se permitan numeros enteros y decimales.
            if (regex.test(input.value)) {
                // Despues el mismo valor lo agrega al input
                input.value = input.value.trim();
                // Despues lo agrego a la matriz.
                matrizMultidimensional[fila - 1][columna] = input.value;
                // Calcula el total de optimista
                calcularFila(columna, texto, idParrafo);
                // Valida si ya estan llena la fila para crear otra.
                crearFila(fila, tdPadre);
            } else {
                // Le asigna el valor de cero al input actual
                input.value = "0";
                matrizMultidimensional[fila - 1][columna] = "0";
                // Calcula el total de optimista
                calcularFila(columna, texto, idParrafo);
                // Valida si ya estan llena la fila para crear otra.
                crearFila(fila, tdPadre);
                // Muestra un alert de que esta mal ingresar otra cosa que no sean numeros.
                newMessageP.textContent = "Solo se permiten números en este campo.";
                newToastDiv.style.display = 'block';
            }
            // * Si esta vacio entonces hara lo siguiente
        } else {
            // Le asigno vacio al input actual.
            input.value = "";
            // cambio el valor en la matriz.
            matrizMultidimensional[fila - 1][columna] = "";
            // Calcula el total de optimista
            calcularFila(columna, texto, idParrafo);
        }
    }

    function calcularFila(columna, texto, idParrafo) {
        let totalFila = 0;
        for (let i = 0; i < matrizMultidimensional.length; i++) {
            // Solo sumara las filas las cuales tengan un valor
            if (matrizMultidimensional[i][columna] !== "") {
                // Aqui sumara el valor y lo asignara en el apartado correspondiente donde dice total costo fijo.
                totalFila += parseFloat(matrizMultidimensional[i][columna]);
            }
        }
        document.getElementById(idParrafo).textContent = texto + totalFila.toFixed(2).toString();
    }

    /**
* @description Metodo que calcula el total de los costos fijos.
*/
    function calcularTotalFijos() {
        let totalCostoVariable = 0;
        // Recorro la matriz pero solo la ultima posicion ya que es la que tiene el total de cada fila.
        for (let i = 0; i < matrizMultidimensional.length; i++) {
            // Solo sumara las filas las cuales tengan un valor
            if (matrizMultidimensional[i][3] !== "") {
                // Aqui sumara el valor y lo asignara en el apartado correspondiente donde dice total costo fijo.
                totalCostoVariable += parseFloat(matrizMultidimensional[i][3]);
            }
        }
        // Le asigno el total de todas las fila.
        document.getElementById("costosFijos").textContent = "Total costos variables: $" + totalCostoVariable.toFixed(2).toString();
    }

    function columnaSiguiente(tdPadre, fila, columna, input) {
        const tdSiguiente = tdPadre.nextElementSibling;
        // Obtengo la columna total la cual almacena el total de esa fila.
        const totalNodo = tdSiguiente.nextElementSibling;
        // En caso de que tenga un valor hara lo siguiente
        if (tdSiguiente.querySelector("input").value) {
            // Calculo el input actual es la posicion 1 con el nodo siguiente para sacar el total de esa fila.
            let calcularTotal = parseFloat(input.value) * parseFloat(tdSiguiente.querySelector("input").value);
            // Se lo asigno a la posicon de la matriz correspondiente.
            matrizMultidimensional[fila - 1][columna + 2] = calcularTotal.toString();
            // Le asigno el valor a la columna total.
            totalNodo.querySelector("input").value = calcularTotal.toString();
            // Creo una variable la cual me hara sacar el total de todo el costo fijo.
            calcularTotalFijos();
            // Envio a comprobar si es la ultima fila para crear un nueva fila.
            crearFila(fila, tdPadre);
        } else {
            // Agarro el nodo columna Total y lo pongo en cero y luego hago sacar el total de costo fijo otra vez.
            // Le asigno 0 al total de la fila
            totalNodo.querySelector("input").value = "0";
            // Le asigno cero a la matriz en la posicion correspondiente.
            matrizMultidimensional[fila - 1][columna + 2] = 0;
            // Calcula el total costo fijo.
            calcularTotalFijos();
        }
    }
    /**
     * @description Metodo que valida que la columna anterior tenga dato para calcular
     * @param {*} tdPadre
     * @param {*} input
     */
    function columnaAnterior(tdPadre, input, columna, fila) {
        // Obtengo el nodo anterior.
        const tdAnterior = tdPadre.previousElementSibling;
        // Obtengo el nodo del total de la fila.
        const totalNodo = tdPadre.nextElementSibling;
        // Compruebo que el nodo anterios tenga un valor.
        if (tdAnterior.querySelector("input").value) {
            // Calculo el total de la fila.
            let calcularTotal = parseFloat(input.value) * parseFloat(tdAnterior.querySelector("input").value);
            // Asigno el resultado en el nodo Total de la fila.
            totalNodo.querySelector("input").value = calcularTotal.toString();
            // Se le asigno el resultado a la matriz en la posicion correspondiente.
            matrizMultidimensional[fila - 1][columna + 1] = calcularTotal.toString();
            // El metodo para calcular el total de costo fijo.
            calcularTotalFijos();
            // Valida si es necesario crear una nueva fila.
            crearFila(fila, tdPadre);
        } else {
            // Agarro el nodo columna Total y lo pongo en cero y luego hago sacar el total de costo fijo otra vez.
            // Le asigno 0 al total de la fila
            totalNodo.querySelector("input").value = "0";
            // Le asigno cero a la matriz en la posicion correspondiente.
            matrizMultidimensional[fila - 1][columna + 1] = 0;
            // Calcula el total costo fijo.
            calcularTotalFijos();
        }
    }



    /**
 * @description Metodo que valida cuando crear una fila.
 * @param {*} row
 * @param {*} tdPadre
 */
    function crearFila(row, tdPadre) {
        //---------ESTRUCTURA QUE VALIDA QUE HACER---------
        // Valida que todas las filas no sean cadenas vacias.
        // Si no son vacias entonces agrega una fila.
        if (
            matrizMultidimensional[row - 1][0].trim() &&
            matrizMultidimensional[row - 1][1].trim() &&
            matrizMultidimensional[row - 1][2].trim() &&
            matrizMultidimensional[row - 1][3].trim() &&
            matrizMultidimensional[row - 1][4].trim() &&
            matrizMultidimensional[row - 1][5].trim()
        ) {

            // If para solo validar si es el ultima fila
            if (row === matrizMultidimensional.length) {
                let nuevaFila = new Array(6).fill("");
                // La agrego la nueva fila a la matriz.
                matrizMultidimensional.push(nuevaFila);
                // Creo un boton el cual es para eliminar
                const botonEliminar = document.createElement("button");
                // Le agrego el texto correspondiente
                botonEliminar.textContent = "Eliminar";
                // Agrego las clases las cuales se le van asignar.
                botonEliminar.classList.add(
                    "bg-red-500",
                    "hover:bg-red-700",
                    "text-white",
                    "font-bold",
                    "py-2",
                    "px-4",
                    "rounded",
                );
                // * CREAR EL EVENTO PARA EL BOTON.
                eventoButton(botonEliminar);
                // Se agregará al final de la fila
                const ultimaCelda = tdPadre.parentElement.insertCell(-1);
                // Se agrega en esa misma fila el boton.
                ultimaCelda.appendChild(botonEliminar);
                // Obtengo la etiqueta tbody la cual me va a servir para luego insertarlo a lo ultimo
                let tbody = tdPadre.parentElement.parentElement;
                // Creo la una fila la cual me va a servir para luego ingresarle
                // los inputs correspondientes
                let fila = tbody.insertRow();
                // Recorro 5 veces porque son las columnas totales.
                for (let i = 0; i < 6; i++) {
                    // Creo la columna la cual va a ir lo que corresponda.
                    let celda = fila.insertCell();
                    // Agrego la clase a la celda
                    celda.classList.add(
                        "border",
                        "px-4",
                        "py-2"
                    );
                    // Cuando se la columna 3 entonces agregara lo siguiente.
                    if (i === 3) {
                        // Se crea un input.
                        let input = document.createElement("input");
                        // El cual se le asigna el evento.
                        eventoInputs(input);
                        // Se le dice que sera tipo texto

                        input.setAttribute("type", "text");
                        // Se le asigna que no se podra escribir en el
                        input.setAttribute("disabled", "true");
                        input.classList.add(
                            "w-full",
                            "border",
                            "rounded-sm",
                            "px-2",
                            "py-1",
                            "text-right"
                        );
                        // Y se agrega en la columna.
                        celda.appendChild(input);
                        // De lo contrario se va a crear un input con las expecificaciones correspondientes
                    } else {
                        // Se crea un input
                        let input = document.createElement("input");
                        // Se le asigna un evento.
                        eventoInputs(input);
                        // Se le dice que sera tipo texto
                        input.setAttribute("type", "text");
                        if (i > 0) {
                            input.classList.add(
                                "w-full",
                                "border",
                                "rounded-sm",
                                "px-2",
                                "py-1",
                                "text-right"
                            );
                        }
                        input.classList.add(
                            "w-full",
                            "border",
                            "rounded-sm",
                            "px-2",
                            "py-1"
                        );
                        // Y se agrega en la columna.
                        celda.appendChild(input);
                    }
                }
            }
        }
    }

    /**
 *  Metodo para crearle a los botones.
 * @param {*} button
 */
    function eventoButton(button) {
        // Se crea el evento
        button.addEventListener('click', function () {
            // Obtengo la posicion de la fila.
            const row = button.parentNode.parentNode.rowIndex;
            // Obtengo la tabla
            const tabla = document.getElementById("miTabla");
            // Lo elimina en la matriz.
            matrizMultidimensional.splice(row - 1, 1);
            console.log(matrizMultidimensional);
            // Eliminar en el HTML
            tabla.deleteRow(row);
            // Recalcula el total de costo Fijo.
            calcularTotalFijos();
            // Validar el calculo de las filas con los datos de la base de datos.
            calcularFila(4, "Total optimista: $", "optimista");
            calcularFila(5, "Total pesimista: $", "pesimista");
        });
    }

    // * Crea un evento onclick para un boton.
    const miBoton = document.getElementById("miBoton");
    // * Agregar el evento onclick al botón
    miBoton.onclick = async function () {
        // Obtengo si es verdadero el costo variable.
        let elemnt = document.getElementById('miBoton');
        let hayDatosAnuales = elemnt.getAttribute('informacion');
        // Hago una copia de la matriz.
        let copiaMatriz = matrizMultidimensional.slice();
        if (hayDatosAnuales !== '') {
            // ! Aqui poner el modal async
            const result = await customConfirm('Tienes información en las tablas anuales. Si aceptas, se borrarán los datos anuales.');
            if (result) {
                if (validarMatriz(copiaMatriz)) {
                    fetch(
                        "/plan_de_negocio/" +
                        document.getElementById("miTabla").getAttribute("dato") +
                        "/costo_variable",
                        {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": document
                                    .querySelector('meta[name="csrf-token"]')
                                    .getAttribute("content"),
                            },
                            body: JSON.stringify(copiaMatriz),
                        }
                    ).then(response => {
                        if (response.ok) {
                            toastDiv.style.display = 'block';
                        } else {
                            throw new Error("Error en la solicitud");
                        }
                    }).catch(error => {
                        // Manejar errores
                        console.error("Error:", error);
                    });
                } else {
                    newMessageP.textContent = "Tienes datos vacíos en una fila.";
                    newToastDiv.style.display = 'block';
                }
            }
        } else {
            if (validarMatriz(copiaMatriz)) {
                fetch(
                    "/plan_de_negocio/" +
                    document.getElementById("miTabla").getAttribute("dato") +
                    "/costo_variable",
                    {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document
                                .querySelector('meta[name="csrf-token"]')
                                .getAttribute("content"),
                        },
                        body: JSON.stringify(copiaMatriz),
                    }
                ).then(response => {
                    if (response.ok) {
                        toastDiv.style.display = 'block';
                    } else {
                        throw new Error("Error en la solicitud");
                    }
                }).catch(error => {
                    // Manejar errores
                    console.error("Error:", error);
                });
            } else {
                newMessageP.textContent = "Tienes datos vacíos en una fila.";
                newToastDiv.style.display = 'block';
            }
        }
    };

    async function customConfirm(message) {
        return new Promise(resolve => {
            const confirmDialog = document.createElement('div');
            confirmDialog.innerHTML = `
            <div class="fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
                <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Datos anuales
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm leading-5 text-gray-500">
                                    ${message}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 sm:mt-4 sm:flex justify-center sm:flex-row-reverse gap-2">
                        <span class="flex w-full mt-3 rounded-md shadow-sm sm:w-auto">
                            <button id="confirmBtn" type="button"
                                class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Aceptar
                            </button>
                        </span>
                        <span class="flex w-full mt-3 rounded-md shadow-sm sm:w-auto">
                            <button id="cancelBtn" type="button"
                                class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Cancelar
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    `;
            document.body.appendChild(confirmDialog);

            document.getElementById('confirmBtn').addEventListener('click', () => {
                document.body.removeChild(confirmDialog);
                resolve(true);
            });

            document.getElementById('cancelBtn').addEventListener('click', () => {
                document.body.removeChild(confirmDialog);
                resolve(false);
            });
        });
    }

    function validarMatriz(copiaMatriz) {
        if (copiaMatriz.length > 1) {
            copiaMatriz.pop();
            for (let fila = copiaMatriz.length - 1; fila >= 0; fila--) {
                if (copiaMatriz[fila].every(elemento => elemento === "")) {
                    copiaMatriz.splice(fila, 1); // Elimina la fila vacía
                    console.log("Elimina una fila.");
                }
            }
            // Recorremos cada fila de la matriz
            for (let fila of copiaMatriz) {
                let contadorDatos = 0;

                // Contamos cuántas celdas tienen datos en cada fila
                for (let celda of fila) {
                    if (celda !== '') {
                        contadorDatos++;
                    }
                }

                // Valida que la fila tenga todos los valores.
                if (contadorDatos < copiaMatriz[0].length) {
                    return false;
                }
            }
            // Si llegamos aquí, significa que todas las filas pasaron la validación
            return true;
        } else {
            // Recorremos cada fila de la matriz
            for (let fila of copiaMatriz) {
                let contadorDatos = 0;
                // Contamos cuántas celdas tienen datos en cada fila
                for (let celda of fila) {
                    if (celda !== '') {
                        contadorDatos++;
                    }
                }
                // Valida que la fila tenga todos los valores.
                if (contadorDatos > 0) {
                    return false;
                }
            }
            // Si llegamos aquí, significa que todas las filas pasaron la validación
            return true;
        }

    }
});
