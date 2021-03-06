/**
 * Created by porfirio on 3/11/17.
 */

$(document).ready(function () {
    // var componentesFormacion = obtenerComponentesFormacion();
    var selComponentes = $('#selComponentes');
    var selCampos = $('#selCampos');
    var selDisciplinas = $('#selDisciplinas');

    $(".select2").select2({});

    selComponentes.on('select2:select', function (evt) {
        console.log("select");
    });

    // llenarSelects();
    //
    // function llenarSelects() {
    //     console.log(componentesFormacion);
    //     if(componentesFormacion != undefined) {
    //         for (var i = 0; i < componentesFormacion.length; i++) {
    //             var componente = componentesFormacion[i];
    //             selComponentes
    //                 .append(createOption(componente.componente_formacion));
    //             if(componente.campos_disciplinares != undefined) {
    //                 for (var j = 0; j < componente.campos_disciplinares.length; j++) {
    //                     var campo = componente.campos_disciplinares[j];
    //                     selCampos.append(createOption(campo.campo_disciplinar));
    //                     if(campo.disciplinas != undefined) {
    //                         for (var k = 0; k < campo.disciplinas.length; k++) {
    //                             var disciplina = campo.disciplinas[k];
    //                             selDisciplinas.append(createOption(disciplina.disciplina));
    //                         }
    //                     }
    //                 }
    //             }
    //         }
    //     }
    // }

    function createOption(text) {
        return '<option>' + text + '</option>';
    }

    function obtenerComponentesFormacion() {
        var componentes_formacion = [
            {
                id: 1,
                componente_formacion: 'Componente de formación básico',
                campos_disciplinares: [
                    {
                        id: 1,
                        campo_disciplinar: 'Ciencias experimentales',
                        disciplinas: [
                            {
                                id: 1,
                                disciplina: 'Biología'
                            }, {
                                id: 2,
                                disciplina: 'Física'
                            }, {
                                id: 3,
                                disciplina: 'Química'
                            }, {
                                id: 4,
                                disciplina: 'Ecología'
                            }
                        ]
                    },
                    {
                        id: 2,
                        campo_disciplinar: 'Comunicación',
                        disciplinas: [
                            {
                                id: 1,
                                disciplina: 'Inglés'
                            }, {
                                id: 1,
                                disciplina: 'Tecnologías de la información y la' +
                                ' comunicación'
                            }, {
                                id: 1,
                                disciplina: 'Lectura, expresión oral y escrita'
                            }
                        ]
                    }, {
                        id: 3,
                        campo_disciplinar: 'Humanidades',
                        disciplinas: [
                            {
                                id: 1,
                                disciplina: 'Lógica'
                            }, {
                                id: 1,
                                disciplina: 'Ética'
                            }, {
                                id: 1,
                                disciplina: 'Filosofía'
                            }
                        ]
                    }, {
                        id: 4,
                        campo_disciplinar: 'Ciencias sociales',
                        disciplinas: [
                            {
                                id: 1,
                                disciplina: 'CTSyV'
                            }
                        ]
                    }, {
                        id: 5,
                        campo_disciplinar: 'Matemáticas',
                        disciplinas: [
                            {
                                id: 1,
                                disciplina: 'Matemáticas'
                            }
                        ]
                    }
                ]
            },
            {
                id: 2,
                componente_formacion: 'Componente de formación propedéutico',
                campos_disciplinares: [
                    {
                        id: 2,
                        campo_disciplinar: 'Común. Todas las especialidades',
                        disciplinas: [
                            {
                                id: 1,
                                disciplina: 'Cálculo integral'
                            }, {
                                id: 1,
                                disciplina: 'Inglés V'
                            }, {
                                id: 1,
                                disciplina: 'Probabilidad y estadística'
                            }, {
                                id: 1,
                                disciplina: 'Temas de física'
                            }
                        ]
                    }, {
                        id: 2,
                        campo_disciplinar: 'Físico-Matemático',
                        disciplinas: [
                            {
                                id: 1,
                                disciplina: 'Temas de física'
                            }, {
                                id: 1,
                                disciplina: 'Dibujo técnico'
                            }, {
                                id: 1,
                                disciplina: 'Matemáticas aplicadas'
                            }
                        ]
                    }, {
                        id: 2,
                        campo_disciplinar: 'Económico-Administrativo',
                        disciplinas: [
                            {
                                id: 1,
                                disciplina: 'Temas de administración'
                            }, {
                                id: 1,
                                disciplina: 'Introducción a la economía'
                            }, {
                                id: 1,
                                disciplina: 'Introducción al derecho'
                            }
                        ]
                    }, {
                        id: 2,
                        campo_disciplinar: 'Humanidades y ciencias sociales',
                        disciplinas: [
                            {
                                id: 1,
                                disciplina: 'Temas de ciencias sociales'
                            }, {
                                id: 1,
                                disciplina: 'Literatura'
                            }, {
                                id: 1,
                                disciplina: 'Historia'
                            }
                        ]
                    }, {
                        id: 2,
                        campo_disciplinar: 'Químico-Biológico',
                        disciplinas: [
                            {
                                id: 1,
                                disciplina: 'Introducción a la bioquímica'
                            }, {
                                id: 1,
                                disciplina: 'Temas de biología contemporánea'
                            }, {
                                id: 1,
                                disciplina: 'Temas de ciencias de la salud'
                            }
                        ]
                    }
                ]
            },
            {
                id: 3,
                componente_formacion: 'Componente de formación profesional',
                campos_disciplinares: [
                    {
                        id: 2,
                        campo_disciplinar: '',
                        disciplinas: [
                            {
                                id: 1,
                                disciplina: 'Disciplina profesional 1'
                            }, {
                                id: 1,
                                disciplina: 'Disciplina profesional 2'
                            }
                        ]
                    }
                ]
            }
        ];
        return componentes_formacion;
    }
});