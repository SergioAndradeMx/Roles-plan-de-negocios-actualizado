var matrizMultidimensional = [];
document.addEventListener("DOMContentLoaded", function () {
    function agregarFila() {
        // Selecciona la tabla
        let tabla = document.getElementById("miTabla");
        /// Obtengo el body de la tabla.
        let tbody = tabla.getElementsByTagName("tbody")[0];
        // Inserto en la tabla.
        let fila = tbody.insertRow();
        // Creo una nueva fila a la matriz
        let nuevaFila = new Array(4).fill("");
        // La agrego la nueva fila a la matriz.
        matrizMultidimensional.push(nuevaFila);
        // For que creara la fila en el HTML ( VISUAL )
        for (let i = 0; i < 4; i++) {
            let celda = fila.insertCell();
            let input = document.createElement("input");
            if (i === 0) {
                input.type = "text";
                input.addEventListener("blur", () => {
                    logicaInputs(input);
                });
            } else if (i === 3) {
                input.readOnly = true;
                input.value = "";
                input.disabled = true;
            } else {
                input.type = "text";
                input.addEventListener("blur", () => {
                    let regex = /^[-+]?\d*\.?\d+$/;
                    let row = input.parentNode.parentNode.rowIndex;
                    let column = input.parentNode.cellIndex;
                    let fila = tabla.rows[row];
                    let ultimoInput = "";
                    // Validar que solo permita numeros.
                    if (regex.test(input.value)) {
                        logicaInputs(input);
                        // Obtengo el ultimo codigo
                        /** Si la columna que fue selecciona es igual a dos entonces agarra el valor antes
                         si no entonces agarra el valor despues a ti.
                         **/
                        let valorSegundo =
                            matrizMultidimensional[row - 1][
                                column === 2 ? column - 1 : column + 1
                            ];
                        if (valorSegundo !== "") {
                            // Asignale el resultado al ultimo input.
                            calcularTotal(ultimoInput, row, column, fila);
                        } else {
                            if (row === matrizMultidimensional.length) {
                                // IF QUE VALIDA QUE SEA EL ULTIMO
                                ultimoInput =
                                    fila.cells[
                                        fila.cells.length - 1
                                    ].querySelector("input");
                            } else {
                                ultimoInput =
                                    fila.cells[
                                        fila.cells.length - 2
                                    ].querySelector("input");
                            }
                            ultimoInput.value = "0";
                        }
                    } else if (input.value.length === 0) {
                        logicaInputs(input);
                        // Obtengo el ultimo codigo
                        /** Si la columna que fue selecciona es igual a dos entonces agarra el valor antes
                         si no entonces agarra el valor despues a ti.
                         **/
                        let valorSegundo =
                            matrizMultidimensional[row - 1][
                                column === 2 ? column - 1 : column + 1
                            ];
                        if (valorSegundo !== "") {
                            // Asignale el resultado al ultimo input.
                            calcularTotal(ultimoInput, row, column, fila);
                        } else {
                            if (row === matrizMultidimensional.length) {
                                // IF QUE VALIDA QUE SEA EL ULTIMO
                                ultimoInput =
                                    fila.cells[
                                        fila.cells.length - 1
                                    ].querySelector("input");
                            } else {
                                ultimoInput =
                                    fila.cells[
                                        fila.cells.length - 2
                                    ].querySelector("input");
                            }
                            ultimoInput.value = "0";
                        }
                    } else {
                        alert("Solo se permiten numeros en ese campo");
                        matrizMultidimensional[row - 1][column] = 0;
                        input.value = "0";
                        calcularTotal(ultimoInput, row, column, fila);
                    }
                });
            }
            celda.appendChild(input);
        }
        // Te vas a crear cuando la tabla tenga mas de dos valores.
        // y se lo vas asignar al nodo anterior.
        if (tbody.rows.length > 1) {
            let celda = fila.previousElementSibling.insertCell();
            // Agrego el boton.
            let boton = document.createElement("button");
            // Agregar texto al botón
            boton.innerHTML = "Eliminar";
            // Agregar estilo y evento.
            boton.style.color = "white";
            boton.style.backgroundColor = "red";
            boton.addEventListener("click", () => {
                let tabla = document.getElementById("miTabla");
                let row = boton.parentNode.parentNode.rowIndex;
                matrizMultidimensional.splice(row - 1, 1);
                // Eliminar en el HTML
                tabla.deleteRow(row);
                /**
                 * Calculo otra vez el total costos fijos.
                 */
                let resultadoCostosFijos = 0;
                console.log(matrizMultidimensional);
                matrizMultidimensional.forEach((item) => {
                    if (item[3] !== "") {
                        resultadoCostosFijos += parseFloat(item[3]);
                    }
                });
                document.getElementById("costosFijos").textContent =
                    "Total costos fijos: $" + resultadoCostosFijos.toString();
            });
            // Crear evento para borrar la fila.
            celda.appendChild(boton);
        }
    }

    function calcularTotal(ultimoInput, row, column, fila) {
        if (row === matrizMultidimensional.length) {
            // IF QUE VALIDA QUE SEA EL ULTIMO
            ultimoInput =
                fila.cells[fila.cells.length - 1].querySelector("input");
        } else {
            ultimoInput =
                fila.cells[fila.cells.length - 2].querySelector("input");
        }
        let resultadoCostosFijos = 0;
        /**
         * Recorre las ultimas columnas de cada fila y agregalo al Parrafo.
         * **/
        ultimoInput.value =
            matrizMultidimensional[row - 1][1] *
            matrizMultidimensional[row - 1][2];
        matrizMultidimensional[row - 1][3] = ultimoInput.value;
        matrizMultidimensional.forEach((item) => {
            if (item[3] !== "") {
                resultadoCostosFijos += parseFloat(item[3]);
            }
        });
        document.getElementById("costosFijos").textContent =
            "Total costos fijos: $" + resultadoCostosFijos.toString();
    }

    function logicaInputs(input) {
        let row = input.parentNode.parentNode.rowIndex;
        let column = input.parentNode.cellIndex;
        input.value = input.value.trim();
        matrizMultidimensional[row - 1][column] = input.value;
        //---------ESTRUCTURA QUE VALIDA QUE HACER---------
        // Valida que todas las filas no sean cadenas vacias.
        // Si no son vacias entonces agrega una fila.
        if (
            matrizMultidimensional[row - 1][0] !== "" &&
            matrizMultidimensional[row - 1][1] !== "" &&
            matrizMultidimensional[row - 1][2] !== ""
        ) {
            // If para solo validar si es el ultima fila
            if (row === matrizMultidimensional.length) {
                // Agrega la fila
                agregarFila();
            }
        }
    }
    agregarFila();

    // * Crea un evento onclick para un boton.
    const miBoton = document.getElementById("miBoton");
    // * Agregar el evento onclick al botón
    miBoton.onclick = function () {
        // ! Recorrer el arreglo y meterlo en una matriz para luego
        // ! poder hacer lo demas.
        // * Quitar la ultima fila.
        let copiaMatriz = matrizMultidimensional.slice();
        if (validarMatriz(copiaMatriz)) {
            console.log(copiaMatriz);
            fetch(
                "/plan_de_negocio/" +
                    document.getElementById("miTabla").getAttribute("dato") +
                    "/costo_fijo",
                {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"), // Incluye el token CSRF en el encabezado
                    },
                    body: JSON.stringify(copiaMatriz),
                }
            )
                .then((response) => response.json())
                .then((data) => {
                    // Manejar la respuesta
                    // alert(data);
                    console.log(data);
                })
                .catch((error) => {
                    // Manejar errores
                    console.error("Error:", error);
                });
        } else {
            alert("Tienes datos vacios en una fila.");
        }
    };

    function validarMatriz(copiaMatriz) {
        if (matrizMultidimensional.length > 1) {
            copiaMatriz.pop();
            // TODO: Aqui si las filas son mas de una.
            for (let i = 0; i < copiaMatriz.length; i++) {
                if (
                    (copiaMatriz[i][0] !== "" &&
                        copiaMatriz[i][1] !== "" &&
                        copiaMatriz[i][2] === "") ||
                    (copiaMatriz[i][0] !== "" &&
                        copiaMatriz[i][1] === "" &&
                        copiaMatriz[i][2] !== "") ||
                    (copiaMatriz[i][0] === "" &&
                        copiaMatriz[i][1] !== "" &&
                        copiaMatriz[i][2] !== "")
                ) {
                    return false; // Si encuentra una lista con datos en una posición pero no en las otras, retorna false
                } else if (
                    copiaMatriz[i][0] === "" &&
                    copiaMatriz[i][1] === "" &&
                    copiaMatriz[i][2] === ""
                ) {
                    console.log("Vacia fila.");
                    copiaMatriz.splice(i, 1); // Elimina la fila vacía
                }
            }
        } else {
            // TODO: En caso de que solo sea una fila.
            /**
             *  si todos estan vacios entonces no hay problema pero si no estan todos vacios entonces manda error.
             */
            for (let i = 0; i < copiaMatriz.length; i++) {
                if (
                    (copiaMatriz[i][0] !== "" &&
                        copiaMatriz[i][1] !== "" &&
                        copiaMatriz[i][2] === "") ||
                    (copiaMatriz[i][0] !== "" &&
                        copiaMatriz[i][1] === "" &&
                        copiaMatriz[i][2] !== "") ||
                    (copiaMatriz[i][0] === "" &&
                        copiaMatriz[i][1] !== "" &&
                        copiaMatriz[i][2] !== "")
                ) {
                    return false; // Si encuentra una lista con datos en una posición pero no en las otras, retorna false
                }
            }
        }
        return true;
    }
});
