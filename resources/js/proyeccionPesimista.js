// TODO: Variables importantes para resolver la operacion.
var matrizCostoFijo = [];
var matrizCostoVariable = [];
var matrizIngresos = [];
var matrizTotal = [];
var resultados = [];
var objeto = {
    costos_Fijos: matrizCostoFijo,
    costos_variables: matrizCostoVariable,
    ingresos: matrizIngresos
};


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
    titleH3.textContent = 'Operación exitosa.';
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
    // ###########################################################

    // TODO: Obtengo los datos de la base de datos dependiendo, en cual body esta.
    let bodys = document.querySelectorAll("#miTabla tbody");
    // Obtener los costos Fijos.
    obtenerLosDatos(bodys[0], matrizCostoFijo);
    // Obtener los costos Variables
    obtenerLosDatos(bodys[1], matrizCostoVariable);
    // Obtengo los Ingresos.
    obtenerLosDatos(bodys[2], matrizIngresos);

    // TODO: Asignar los valores de cada mes en la posicion correspondiente.
    // * Costos Fijos.
    let elemento = document.getElementById("costosFjo");
    let tdElementos = elemento.children;
    asignacionValoresMes(tdElementos, matrizCostoFijo);
    // * Costos Variables.
    elemento = document.getElementById("costosVariable");
    tdElementos = elemento.children;
    asignacionValoresMes(tdElementos, matrizCostoVariable);
    // * Ingresos.
    elemento = document.getElementById("ingresos");
    tdElementos = elemento.children;
    asignacionValoresMes(tdElementos, matrizIngresos);
    // TODO: Calcular las ganancias por mes.
    elemento = document.getElementById("utilidades");
    tdElementos = elemento.children;
    for (let columna = 0; columna < matrizTotal[0].length; columna++) {
        let operacion = matrizTotal[2][columna] - (matrizTotal[0][columna] + matrizTotal[1][columna]);
        // Ponerselo a utilidades
        tdElementos[columna + 1].textContent = "$" + operacion.toFixed(2);
    }
    // TODO: Evento INPUTS
    const inputs = document.querySelectorAll("tbody input");
    // Agrega el evento blur a cada input
    inputs.forEach((input) => {
        // Se agregan los eventos.
        eventoInputs(input);
    });

    function eventoInputs(input) {
        // Creacion del evento.
        input.addEventListener("blur", function () {
            // Primero obtener el body
            let parentTbody = input.closest('tbody');
            // Saber cual body es
            let tbodyId = parentTbody.getAttribute('id');
            // Creacion de expresion regular.
            let regex = /^[-+]?\d*\.?\d+$/;
            // Obtener el tr padre del input
            let parentTr = input.closest('tr');
            // Obtener todas las filas tr dentro del tbody
            let allRows = parentTr.parentNode.querySelectorAll('tr');
            // Encontrar el índice de la fila actual dentro de todas las filas tr del tbody
            let rowIndex = Array.from(allRows).indexOf(parentTr);
            // Obtener todos los td
            let cellsInRow = parentTr.querySelectorAll('td');
            // Encontrar el índice de la celda actual dentro de todas las celdas td de la fila
            let cellIndex = Array.from(cellsInRow).indexOf(input.parentElement);
            // Entra dependiendo en cual body esta.
            // TODO: Costos Fijos
            if (tbodyId === "tdbodyFijos") {
                // Si no esta vacio entonces entra.
                if (input.value.trim()) {
                    // Valida con la expresion regular que solo se permitan numeros enteros y decimales.
                    if (regex.test(input.value)) {
                        // Quitarle los espacios.
                        input.value = input.value.trim();
                        // Calcular toda la fila.
                        calcularFila(input, cellIndex, rowIndex, "costosFjo", matrizCostoFijo, 0);
                    } else {
                        // Si no cumple la expresion regular entonces se pone cero por default
                        newMessageP.textContent = "Solo se permiten números enteros o decimales.";
                        newToastDiv.style.display = 'block';
                        input.value = 0;
                        // Calcular toda la fila.
                        calcularFila(input, cellIndex, rowIndex, "costosFjo", matrizCostoFijo, 0);
                    }
                } else {
                    newMessageP.textContent = "Solo se permiten números enteros o decimales.";
                    newToastDiv.style.display = 'block';
                    // Si no cumple la expresion regular entonces se pone cero por default
                    input.value = 0;
                    // Calcular toda la fila.
                    calcularFila(input, cellIndex, rowIndex, "costosFjo", matrizCostoFijo, 0);
                }
                // TODO: Costos Variables
            } else if (tbodyId === "tdbodyVariables") {
                // Si no esta vacio entonces entra.
                if (input.value.trim()) {
                    // Valida con la expresion regular que solo se permitan numeros enteros y decimales.
                    if (regex.test(input.value)) {
                        // Quitarle los espacios.
                        input.value = input.value.trim();
                        // Calcular toda la fila.
                        calcularFila(input, cellIndex, rowIndex, "costosVariable", matrizCostoVariable, 1);
                    } else {
                        // Si no cumple la expresion regular entonces se pone cero por default
                        newMessageP.textContent = "Solo se permiten números enteros o decimales.";
                        newToastDiv.style.display = 'block';
                        input.value = 0;
                        // Calcular toda la fila.
                        calcularFila(input, cellIndex, rowIndex, "costosVariable", matrizCostoVariable, 1);
                    }
                } else {
                    newMessageP.textContent = "Solo se permiten números enteros o decimales.";
                    newToastDiv.style.display = 'block';
                    // Si no cumple la expresion regular entonces se pone cero por default
                    input.value = 0;
                    // Calcular toda la fila.
                    calcularFila(input, cellIndex, rowIndex, "costosVariable", matrizCostoVariable, 1);
                }
                // TODO: Ingresos.
            } else {
                // Si no esta vacio entonces entra.
                if (input.value.trim()) {
                    // Valida con la expresion regular que solo se permitan numeros enteros y decimales.
                    if (regex.test(input.value)) {
                        // Quitarle los espacios.
                        input.value = input.value.trim();
                        // Calcular toda la fila.
                        calcularFila(input, cellIndex, rowIndex, "ingresos", matrizIngresos, 2);
                    } else {
                        // Si no cumple la expresion regular entonces se pone cero por default
                        newMessageP.textContent = "Solo se permiten números enteros o decimales.";
                        newToastDiv.style.display = 'block';
                        input.value = 0;
                        // Calcular toda la fila.
                        calcularFila(input, cellIndex, rowIndex, "ingresos", matrizIngresos, 2);
                    }
                } else {
                    newMessageP.textContent = "Solo se permiten números enteros o decimales.";
                    newToastDiv.style.display = 'block';
                    // Si no cumple la expresion regular entonces se pone cero por default
                    input.value = 0;
                    // Calcular toda la fila.
                    calcularFila(input, cellIndex, rowIndex, "ingresos", matrizIngresos, 2);
                }
            }
        });
    }

    function calcularFila(input, cellIndex, rowIndex, vista, matriz, posicion) {
        matriz[rowIndex][cellIndex] = input.value;
        let sumaDeFila = 0;
        // Recalcular la fila.
        for (let i = 0; i < matriz.length; i++) {
            sumaDeFila += parseFloat(matriz[i][cellIndex]);
        }
        matrizTotal[posicion][cellIndex - 1] = sumaDeFila;
        // Mostrarlo a la vista
        let elemento = document.getElementById(vista);
        let tdElementos = elemento.children;
        tdElementos[cellIndex].textContent = "$" + sumaDeFila.toFixed(2);
        // Sumar la fila de la matriz
        elemento = document.getElementById("utilidades");
        tdElementos = elemento.children;
        let operacion = matrizTotal[2][cellIndex - 1] - (matrizTotal[0][cellIndex - 1] + matrizTotal[1][cellIndex - 1]);
        tdElementos[cellIndex].textContent = "$" + operacion.toFixed(2);
    }

    /**
     *  @description Metodo que me ayudara asignarle la suma por fila de un mes.
     *  @param {*} tdElementos
     *  @param {*} matriz
     */
    function asignacionValoresMes(tdElementos, matriz) {
        for (let columna = 0; columna < matriz[0].length - 1; columna++) {
            let totalFilaCostoFijo = 0;
            for (let fila = 0; fila < matriz.length; fila++) {
                totalFilaCostoFijo += parseFloat(matriz[fila][columna + 1]);
            }
            resultados.push(totalFilaCostoFijo);
            tdElementos[columna + 1].textContent = "$" + totalFilaCostoFijo.toFixed(2);
        }
        matrizTotal.push(resultados);
        // Limpiar la matriz.
        resultados = [];
    }

    /**
     *  @description Metodo que obtiene los valores de la base de datos y se lo asigna a la matriz correspondiente.
     *  @param {*} tbody
     *  @param {*} matrizInsert
     */
    function obtenerLosDatos(tbody, matrizInsert) {
        let filas = tbody.querySelectorAll('tr');
        // ForEach para obtener cada dato que traiga la base de datos.
        filas.forEach(function (fila) {
            // Obtener el valor de data-id del primer td en la fila
            let id = fila.querySelector('td[data-id]').getAttribute('data-id');
            // Obtener los inputs.
            let inputs = fila.querySelectorAll('input[type="text"]');
            // Crear un arreglo el cual obtendrá los valores de cada input y agregarlo a la matriz.
            let filaValores = [];
            // Agregar el valor de data-id al principio de la filaValores
            filaValores.push(id);
            // Foreach para sacar los valor de cada input
            inputs.forEach(function (input) {
                // Agregar el valor de cada input al arreglo filaValores
                filaValores.push(input.value);
            });
            // Agrego la fila en la matrizCostoFijo.
            matrizInsert.push(filaValores);
        });
    }




    // * Crea un evento onclick para un boton.
    const miBoton = document.getElementById("miBoton");
    // * Agregar el evento onclick al botón
    miBoton.onclick = function () {
        fetch(
            "/plan_de_negocio/" +
            document.getElementById("miTabla").getAttribute("dato") +
            "/proyeccionPesimista",
            {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"), // Incluye el token CSRF en el encabezado
                },
                body: JSON.stringify(objeto),
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
    };
});
