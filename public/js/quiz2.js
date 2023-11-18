function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
}

function cargarPreguntas(dificultad) {
    $.ajax({
        url: '/obtener_preguntas/' + 2, // Ruta que devuelve preguntas y respuestas desde el servidor
        method: 'GET',
        success: function (data) {
            var preguntas = [];
            data.forEach(function (item) {
                // Crear un arreglo con todas las opciones de respuesta
                var opcionesRespuesta = [item.respuesta_correcta, item.respuesta_2, item.respuesta_3, item.respuesta_4];
                // Mezclar las opciones de respuesta
                shuffleArray(opcionesRespuesta);
                // Encontrar el índice de la respuesta correcta en el arreglo mezclado
                var correctIndex = opcionesRespuesta.indexOf(item.respuesta_correcta);

                var pregunta = {
                    'q': item.pregunta, // Pregunta
                    'options': opcionesRespuesta, // Opciones mezcladas
                    'correctIndex': correctIndex, // Índice de la respuesta correcta
                    'correctResponse': item.retroalimentacion_positiva, // Retroalimentación positiva
                    'incorrectResponse': item.retroalimentacion_negativa // Retroalimentación negativa
                };
                preguntas.push(pregunta);
            });

            // Inicializa el plugin 'quiz' con las preguntas cargadas
            $('#quiz').quiz({
                counterFormat: 'Pregunta %current de %total',
                questions: preguntas
                // Otras opciones del plugin 'quiz'...
            });
            $('#quiz-restart-btn').on('click', function () {
                // Restablecer la variable para permitir una nueva selección en la próxima pregunta
                primeraSeleccion = true;

                // Restablecer el índice para mostrar la primera pregunta en el reinicio
                index = -1;

                location.reload();

            });
            $('#quiz-finish-btn').on('click', function () {
                primeraSeleccion = true;
                index = -1;

            });
            var index = -1;
            var primeraSeleccion = true;

            $('.answers a').on('click', function () {
                if (primeraSeleccion) {
                    // Realiza la acción solo en la primera selección
                    if (index >= 9 || index < -1) {
                        index = -1;
                    }

                    // Encuentra el índice del elemento en el conjunto de respuestas
                    index++;

                    // Obtén la pregunta correspondiente desde el array 'data'
                    var pregunta = data[index];
                    var preguntaId = pregunta.id_preguntas;

                    //console.log(data[index].id_preguntas);

                    var respuestaMarcada = $(this).text(); // Obtén el texto de la respuesta marcada

                    // Compara la respuesta marcada con las opciones de respuesta en 'data'
                    if (respuestaMarcada === pregunta.respuesta_correcta) {
                        // Respuesta marcada es la respuesta correcta, asigna 1
                        manejarRespuesta(preguntaId, 1);
                    } else if (respuestaMarcada === pregunta.respuesta_2) {
                        // Respuesta marcada es la segunda opción, asigna 2
                        manejarRespuesta(preguntaId, 2);
                    } else if (respuestaMarcada === pregunta.respuesta_3) {
                        // Respuesta marcada es la tercera opción, asigna 3
                        manejarRespuesta(preguntaId, 3);
                    } else if (respuestaMarcada === pregunta.respuesta_4) {
                        // Respuesta marcada es la cuarta opción, asigna 4
                        manejarRespuesta(preguntaId, 4);
                    } else {
                        // Respuesta no coincide con ninguna opción, puedes manejarlo como desees
                    }

                    // Desactiva futuras selecciones
                    primeraSeleccion = false;
                }
            });

            $('#quiz-next-btn').on('click', function () {
                primeraSeleccion = true;
            });


        },
        error: function (error) {
            console.error('Error al cargar las preguntas: ' + error);
        }
    });
}

// Llama a la función para cargar preguntas cuando la página se carga
$(document).ready(function () {
    cargarPreguntas();
});

function manejarRespuesta(preguntaId, respuesta) {
    var datos = {
        preguntaId: preguntaId,
        respuesta: respuesta
    };

    $.ajax({
        url: '/registrar_respuesta',
        method: 'get',
        data: datos,
        success: function (respuesta) {
            if (datos['respuesta'] !== 1) {
                // Lógica para reducir vidas
                reducirVida();
            }
        },
        error: function (error) {
            console.error('Error al guardar la respuesta: ' + error);
        }
    });
}

function reducirVida() {
    // Realizar una solicitud AJAX al servidor para reducir el número de vidas
    $.ajax({
        url: '/restarVida',
        method: 'get',
        success: function (respuesta) {
            // Lógica adicional después de reducir vidas (si es necesario)
        },
        error: function (error) {
            console.error('Error al reducir las vidas: ' + error);
        }
    });
}


