@extends('dashboard_master')

@section('title', 'SNB: ' . $aspecto->aspecto)

@section('particular_styles')
    <link href="{!! asset('css/select2.min.css') !!}" rel="stylesheet">
@endsection

@section('sidebar_options')
    @include('snb.sidebar_items', ['url'=>'../evaluacion_snb',
    'texto' => 'Volver a aspectos del SNB'])
@endsection

@section('box_title', $aspecto->aspecto)

@section('box_body')
    <div class="row no-horizontal-scroll">
        <div class="col-md-12">
            <div class="table-responsive no-padding">
                <table class="table table-aspecto-snb">
                    <thead>
                    <tr class="table-header">
                        <th colspan="4">
                            {{$aspecto->descripcion}}
                        </th>
                        <th colspan="3">
                            Criterios de Evaluación
                        </th>
                    </tr>
                    <tr>
                        <th>No.</th>
                        <th>Aspectos Sujetos a Evaluación</th>
                        <th colspan="2">Evidencias</th>
                        <th>Criterios de Existencia</th>
                        <th>Criterios de Pertinencia</th>
                        <th>Criterios de Suficiencia</th>
                    </tr>
                    </thead>
                    <tbody>
                    <script>var evaluaciones = {};</script>
                    {{--*/ $contador_subaspecto = 1 /*--}}
                    @foreach($aspecto['subaspectos_evaluacion'] as $subaspecto)
                        {{--*/ $rowspan = count($subaspecto['evidencias']) /*--}}
                        <tr>
                            <td rowspan="{{$rowspan + 1}}">
                                {{$aspecto_index}}.{{$contador_subaspecto++}}
                            </td>
                            <td rowspan="{{$rowspan + 1}}">
                                {{$subaspecto->subaspecto}}
                            </td>
                        </tr>
                        {{--*/ $contador_evidencia = 1 /*--}}
                        @foreach($subaspecto['evidencias'] as $evidencia)
                            <tr>
                                <td colspan="2">
                                    {{--{{$contador_evidencia++ . '. '--}}
                                    {{--. $evidencia->evidencia}}--}}
                                    {{$evidencia->evidencia}}
                                </td>
                                <td class="select-snb sel-exis">
                                    @include('snb.dropdown_default',
                                            ['aplica' => $evidencia
                                            ->aplica_existencia,
                                            'criterios' =>
                                            $criterios_existencia,
                                            'evidencia_id' => $evidencia->id,
                                            'tipo_criterio' => 'exis'])
                                </td>
                                <td class="select-snb">
                                    @include('snb.dropdown_default',
                                            ['aplica' => $evidencia
                                            ->aplica_pertinencia,
                                            'criterios' =>
                                            $criterios_pertinencia,
                                            'evidencia_id' => $evidencia->id,
                                            'tipo_criterio' => 'pert'])
                                </td>
                                <td class="select-snb">
                                    @include('snb.dropdown_default',
                                            ['aplica' => $evidencia
                                            ->aplica_suficiencia,
                                            'criterios' =>
                                            $criterios_suficiencia,
                                            'evidencia_id' => $evidencia->id,
                                            'tipo_criterio' => 'sufi'])
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <a id="btnCancelarAspectoSNB" class="btn btn-lg btn-block
            btn-danger" data-toggle="modal" data-target="#confirmCancelSnb">
                <i class="fa fa-times"></i>
                <span>Cancelar</span>
            </a>
        </div>
        <div class="col-md-6">
            <a id="btnGuardarAspectoSNB" class="btn btn-lg btn-block
            btn-primary">
                <i class="fa fa-check"></i>
                <span>Guardar</span>
            </a>
        </div>
    </div>
    @include('snb.confirmDialog', ['id' => 'confirmCancelSnb',
    'titulo' => 'Cancelar Evaluación', 'textoOk' => 'Aceptar',
    'textoCancel' => 'Cancelar'])
@endsection

@section('particular_scripts')
    <script>
        // Esta función se llama cuando se hace click en algún dropdown de un
        // aspecto de evaluación del SNB, y cambia del color y texto del
        // elemento dependiendo de la opción seleccionada
        $('.drop_snb_item').click(function () {
            var drop_button = $(this).parent().parent().parent().children()
                .first();
            var optionText = $(this)[0].innerHTML.trim();
            if (optionText == "Selecciona") {
                drop_button.removeClass('btn-success');
                drop_button.addClass('btn-default');
            } else {
                drop_button.removeClass('btn-default');
                drop_button.addClass('btn-success');
            }
            drop_button.children().first()[0].innerHTML = optionText;
        });
    </script>
    <script>
        console.log(evaluaciones);

        $('.drop_snb_item').click(function () {
            var parent = $(this).parent().parent()[0];
            var selected = $(this)[0];
            var evidenciaId = parent.id.substring(5);
            var tipoCriterio = parent.id.substring(0, 4);
            evaluaciones[evidenciaId][tipoCriterio] = selected.id;
        });

        $('#btnGuardarAspectoSNB').click(function () {
            var evaluacionCompleta = true;

            // Con estos foreach se evalúa que no se hayan dejado aspectos
            // sin evaluar
            $.each(evaluaciones, function (key, value) {
                $.each(value, function (key2, value2) {
                    if (value2 == '-1') {
                        return evaluacionCompleta = false;
                    }
                })
            });

            if (!evaluacionCompleta) {
                console.log('tranquilo papu, llena los campos');
            } else {
                console.log('Puedes guardar papu');
            }
        });
    </script>
    <script>
        var confirmCancelSnb = $('#confirmCancelSnb');

        confirmCancelSnb.find('.modal-body').text('¿Deseas salir sin ' +
            'guardar los cambios en la evaluación?');

        $('#btnConfirmar').click(function () {
            console.log('decidió salir sin guardar');
            window.location = '../evaluacion_snb';
        });

        $('#btnCancelar').click(function () {
            console.log('quiere volder a pensar');
        });
    </script>
@endsection