document.addEventListener("DOMContentLoaded", function () {
    let bodys = document.querySelector("table tbody");
    let filas = bodys.querySelectorAll("tr");
    var arraydatos = [];
    filas.forEach(function (fila) {
        let valueid = fila.querySelector('td[valorid]').getAttribute('valorid');
        let columnas = fila.querySelectorAll('td');
        
        let array = [];
        array.push(valueid);
        columnas.forEach(element => {
            let input = element.querySelector('input');
            if (input) {
                array.push(parseFloat(input.value).toFixed(2))
                agregareventoinput(input);
            } else {
                array.push(parseFloat(element.innerText))
            }

        });
        array.push(fila.getAttribute('idactual'));
        arraydatos.push(array);

    });
    function agregareventoinput(input) {
        input.addEventListener("blur", function () {
            // * Obtener el padre
            const tdPadre = input.parentElement;
            // * Obtengo la posicion de la fila
            let posicionFila = tdPadre.parentNode.rowIndex;
            // * Obtengo la posicion de la columna.
            let posicionColumna = tdPadre.cellIndex;
            const tdSiguiente = tdPadre.nextElementSibling;
            
            
            if (input.value.trim()) {
                if (input.value != arraydatos[posicionFila - 1][posicionColumna + 1]) {
                    arraydatos[posicionFila - 1][posicionColumna + 1] = parseFloat(input.value).toFixed(2);
                    tdSiguiente.innerHTML = parseFloat(arraydatos[posicionFila - 1][posicionColumna] * arraydatos[posicionFila - 1][posicionColumna + 1]).toFixed(2);
                    arraydatos[posicionFila - 1][posicionColumna + 2] = tdSiguiente.innerHTML;
                    caculartotaldesueldo();
                }
            } else {
                input.value = "0";
                arraydatos[posicionFila - 1][posicionColumna + 1] = input.value;
                tdSiguiente.innerHTML = parseFloat(arraydatos[posicionFila - 1][posicionColumna] * arraydatos[posicionFila - 1][posicionColumna + 1]).toFixed(2);
                arraydatos[posicionFila - 1][posicionColumna + 2] = tdSiguiente.innerHTML;
                caculartotaldesueldo();
                alert("No se permite Vacio")
            }
        });

    }
    function caculartotaldesueldo() {
        let totaldesueldos = document.getElementById("totaldesueldos");
        let total = 0;
        for (let index = 0; index < arraydatos.length; index++) {
            // Accede al índice correcto de cada elemento
            total += parseFloat(arraydatos[index][4]); // Suma el valor numérico del sueldo
        }
        // Muestra el total formateado con 2 decimales
        totaldesueldos.innerText = "Total de Sueldos: " + total.toFixed(2);
    }
    
    // let boton = document.getElementById("botonguardar");
    // boton.addEventListener("click", function () {
    //     let ruta = this.getAttribute("ruta");
    //     fetch(ruta, {
    //         method: "POST",
    //         headers: {
    //             "Content-Type": "application/json",
    //             "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
    //         },
    //         body: JSON.stringify(arraydatos),
    //     }).then(Response => {
    //         if (Response.ok) {
    //             alert("Datos guardados exitosamente");
    //             location.reload(); // Refresca la página después de guardar
    //         } else {
    //             alert("Hubo un error al guardar los datos.");
    //         }
    //         console.log("Hubo error");
    //     });
    // });


    let boton = document.getElementById("botonguardar");
    boton.addEventListener("click", function () {
        let ruta = this.getAttribute("ruta");
        fetch(ruta, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            },
            body: JSON.stringify(arraydatos),
        }).then(Response => {
            if (Response.ok) {
                mostrarMensajeExito("Datos guardados exitosamente", true); // Refresca la página después del mensaje
            } else {
                mostrarMensajeError("Hubo un error al guardar los datos.");
            }
        }).catch(error => {
            console.error("Error:", error);
            mostrarMensajeError("Ocurrió un error inesperado.");
        });
    });

    // Función para mostrar mensaje de éxito
    function mostrarMensajeExito(message, refresh = false) {
        const messageDialog = document.createElement('div');
        messageDialog.innerHTML = `
            <div class="fixed z-10 inset-0 overflow-y-auto">
                <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
                    <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Éxito</h3>
                                <div class="mt-2">
                                    <p class="text-sm leading-5 text-gray-500">${message}</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 sm:mt-4 sm:flex justify-center sm:flex-row-reverse gap-2">
                            <span class="flex w-full mt-3 rounded-md shadow-sm sm:w-auto">
                                <button id="closeSuccessBtn" type="button"
                                    class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                    Cerrar
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        `;

        document.body.appendChild(messageDialog);

        document.getElementById('closeSuccessBtn').addEventListener('click', () => {
            document.body.removeChild(messageDialog);
            if (refresh) {
                location.reload(); // Refresca la página
            }
        });

        // Refresca automáticamente después de 3 segundos
        if (refresh) {
            setTimeout(() => {
                location.reload();
            }, 3000);
        }
    }

    // Función para mostrar mensaje de error
    function mostrarMensajeError(message) {
        const messageDialog = document.createElement('div');
        messageDialog.innerHTML = `
            <div class="fixed z-10 inset-0 overflow-y-auto">
                <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
                    <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Error</h3>
                                <div class="mt-2">
                                    <p class="text-sm leading-5 text-gray-500">${message}</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 sm:mt-4 sm:flex justify-center sm:flex-row-reverse gap-2">
                            <span class="flex w-full mt-3 rounded-md shadow-sm sm:w-auto">
                                <button id="closeErrorBtn" type="button"
                                    class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                    Cerrar
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        `;

        document.body.appendChild(messageDialog);

        document.getElementById('closeErrorBtn').addEventListener('click', () => {
            document.body.removeChild(messageDialog);
        });
    }


});