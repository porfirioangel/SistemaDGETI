<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('COMPONENTE_FORMACION', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id')->comment('');
            $table->string('formacion', 45)->comment('');

            $table->timestamps();

        });

        Schema::create('CAMPO_DISCIPLINA', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id')->comment('');
            $table->string('disciplina', 45)->comment('');

            $table->timestamps();

        });

        Schema::create('DISCIPLINA', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id')->comment('');
            $table->string('disciplina', 45)->comment('');

            $table->timestamps();

        });

        Schema::create('TIPO_PLAZA', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id')->comment('');
            $table->string('plaza', 45)->comment('');

            $table->timestamps();

        });

        Schema::create('TIPO_NOMBRAMIENTO', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id')->comment('');
            $table->string('nombramiento', 10)->comment('');

            $table->timestamps();

        });

        Schema::create('RESULTADO', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id')->comment('');
            $table->string('resultado', 45)->comment('');

            $table->timestamps();

        });

        Schema::create('DOCENTE', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id')->comment('');
            $table->string('cct', 11)->nullable()->comment('');
            $table->string('curp', 18)->nullable()->comment('');
            $table->string('rfc', 13)->nullable()->comment('');
            $table->string('nombre', 45)->nullable()->comment('');
            $table->string('primer_apellido', 45)->nullable()->comment('');
            $table->string('segundo_apellido', 45)->nullable()->comment('');
            $table->string('perfil_profesional', 41)->nullable()->comment('');
            $table->integer('horas')->nullable()->comment('');
            $table->integer('horas_frente_grupo')->nullable()->comment('');
            $table->integer('descarga_academica')->nullable()->comment('');
            $table->integer('horas_administrativas')->nullable()->comment('');
            $table->string('correo', 45)->nullable()->comment('');
            $table->string('telefono_celuar', 20)->nullable()->comment('');
            $table->string('telefono_domicilio', 20)->nullable()->comment('');
            $table->string('domicilio', 50)->nullable()->comment('');
            $table->date('fecha')->nullable()->comment('');
            $table->date('vigencia')->nullable()->comment('');
            $table->integer('id_componente_formacion')->unsigned()->comment('');
            $table->integer('id_campo_disciplina')->unsigned()->comment('');
            $table->integer('id_disciplina')->unsigned()->comment('');
            $table->integer('id_tipo_plaza')->unsigned()->comment('');
            $table->integer('id_tipo_nombramiento')->unsigned()->comment('');
            $table->integer('id_resultados')->unsigned()->comment('');

            $table->unique('curp','curp_UNIQUE');
            $table->unique('rfc','rfc_UNIQUE');

            $table->index('id_componente_formacion','fk_DOCENTE_COMPONENTE_FORMACION1_idx');
            $table->index('id_campo_disciplina','fk_DOCENTE_CAMPO_DISCIPLINA1_idx');
            $table->index('id_disciplina','fk_DOCENTE_DISCIPLINA1_idx');
            $table->index('id_tipo_plaza','fk_DOCENTE_TIPO_PLAZA1_idx');
            $table->index('id_tipo_nombramiento','fk_DOCENTE_TIPO_NOMBRAMIENTO1_idx');
            $table->index('id_resultados','fk_DOCENTE_RESULTADOS1_idx');

            $table->foreign('id_componente_formacion')
                ->references('id')->on('COMPONENTE_FORMACION');

            $table->foreign('id_campo_disciplina')
                ->references('id')->on('CAMPO_DISCIPLINA');

            $table->foreign('id_disciplina')
                ->references('id')->on('DISCIPLINA');

            $table->foreign('id_tipo_plaza')
                ->references('id')->on('TIPO_PLAZA');

            $table->foreign('id_tipo_nombramiento')
                ->references('id')->on('TIPO_NOMBRAMIENTO');

            $table->foreign('id_resultados')
                ->references('id')->on('RESULTADO');

            $table->timestamps();

        });

        Schema::create('ACTIVIDAD_ADMINISTRATIVA', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id')->comment('');
            $table->string('actividad', 45)->comment('');

            $table->timestamps();

        });

        Schema::create('DOCENTE_DEFINITIVO', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id')->comment('');
            $table->integer('id_docente')->unsigned()->comment('');
            $table->integer('id_actividad_administrativa')->unsigned()->comment('');

            $table->index('id_docente','fk_DOCENTES_DEFINITIVO_DOCENTE_idx');
            $table->index('id_actividad_administrativa','fk_DOCENTES_DEFINITIVO_ACTIVIDADES_ADMINISTRATIVAS1_idx');

            $table->foreign('id_docente')
                ->references('id')->on('DOCENTE');

            $table->foreign('id_actividad_administrativa')
                ->references('id')->on('ACTIVIDAD_ADMINISTRATIVA');

            $table->timestamps();

        });

        Schema::create('CONCURSO', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id')->comment('');
            $table->integer('concurso')->comment('');

            $table->timestamps();

        });

        Schema::create('FUNCION', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id')->comment('');
            $table->string('funcion', 45)->nullable()->comment('');

            $table->timestamps();

        });

        Schema::create('DOCENTE_TUTOR', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id')->comment('');
            $table->date('inicio_tutoria')->nullable()->comment('');
            $table->date('conclusion_tutoria')->nullable()->comment('');
            $table->integer('total_hora')->nullable()->comment('');
            $table->string('observacion', 250)->nullable()->comment('');
            $table->integer('id_funcion')->unsigned()->comment('');
            $table->integer('id_docente_definitivo')->unsigned()->comment('');

            $table->index('id_funcion','fk_DOCENTES_TUTORES_FUNCION1_idx');
            $table->index('id_docente_definitivo','fk_DOCENTES_TUTORES_DOCENTES_DEFINITIVO1_idx');

            $table->foreign('id_funcion')
                ->references('id')->on('FUNCION');

            $table->foreign('id_docente_definitivo')
                ->references('id')->on('DOCENTE_DEFINITIVO');

            $table->timestamps();

        });

        Schema::create('DOCENTE_IDONEO', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id')->comment('');
            $table->integer('id_docente')->unsigned()->comment('');
            $table->integer('folio_federal')->nullable()->comment('');
            $table->string('curp_tutor', 18)->nullable()->comment('');
            $table->string('observacion', 80)->nullable()->comment('');
            $table->integer('id_concurso')->unsigned()->comment('');
            $table->integer('id_docente_tutor')->unsigned()->comment('');

            $table->unique('folio_federal','folio_general_UNIQUE');
            $table->unique('curp_tutor','curp_tutor_UNIQUE');

            $table->index('id_docente','fk_DOCENTES_IDONEOS_DOCENTE1_idx');
            $table->index('id_concurso','fk_DOCENTES_IDONEOS_CONCURSO1_idx');
            $table->index('id_docente_tutor','fk_DOCENTE_IDONEO_DOCENTE_TUTOR1_idx');

            $table->foreign('id_docente')
                ->references('id')->on('DOCENTE');

            $table->foreign('id_concurso')
                ->references('id')->on('CONCURSO');

            $table->foreign('id_docente_tutor')
                ->references('id')->on('DOCENTE_TUTOR');

            $table->timestamps();

        });

        Schema::create('DOCENTE_ATP', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id')->comment('');
            $table->integer('id_docente_definitivo')->unsigned()->comment('');
            $table->integer('id_concurso')->unsigned()->comment('');
            $table->string('diagnostico', 1)->nullable()->comment('');
            $table->string('plan_trabajo', 1)->nullable()->comment('');
            $table->string('capacitacion', 1)->nullable()->comment('');
            $table->string('evaluacion', 1)->nullable()->comment('');

            $table->index('id_docente_definitivo','fk_DOCENTES_ATP_DOCENTES_DEFINITIVO1_idx');
            $table->index('id_concurso','fk_DOCENTES_ATP_CONCURSO1_idx');

            $table->foreign('id_docente_definitivo')
                ->references('id')->on('DOCENTE_DEFINITIVO');

            $table->foreign('id_concurso')
                ->references('id')->on('CONCURSO');

            $table->timestamps();

        });

        Schema::create('DOCENTE_EVALUADOR', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id')->comment('');
            $table->integer('id_docente_definitivo')->unsigned()->comment('');
            $table->string('funcion', 45)->nullable()->comment('');
            $table->string('status', 1)->nullable()->comment('');
            $table->date('vigencia')->nullable()->comment('');

            $table->index('id_docente_definitivo','fk_DOCENTES_EVALUADORES_DOCENTES_DEFINITIVO1_idx');

            $table->foreign('id_docente_definitivo')
                ->references('id')->on('DOCENTE_DEFINITIVO');

            $table->timestamps();

        });

        Schema::create('PLAZA', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id')->comment('');
            $table->string('plaza', 45)->comment('');

            $table->timestamps();

        });

        Schema::create('TIPO_EVALUACION', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id')->comment('');
            $table->string('evaluacion', 15)->comment('');

            $table->timestamps();

        });

        Schema::create('HISTORIAL_EVALUACION', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id')->comment('');
            $table->date('fecha')->comment('');
            $table->integer('id_tipo_evaluacion')->unsigned()->comment('');
            $table->integer('id_docente')->unsigned()->comment('');

            $table->index('id_tipo_evaluacion','fk_Historial_Evaluacion_TIPO_EVALUACION1_idx');
            $table->index('id_docente','fk_Historial_Evaluacion_DOCENTE1_idx');

            $table->foreign('id_tipo_evaluacion')
                ->references('id')->on('TIPO_EVALUACION');

            $table->foreign('id_docente')
                ->references('id')->on('DOCENTE');

            $table->timestamps();

        });

        Schema::create('PLAZA_DOCENTE', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->integer('id_plaza')->unsigned()->comment('');
            $table->integer('id_docente')->unsigned()->comment('');

            $table->primary('id_plaza', ' id_docente');

            $table->index('id_docente','fk_PLAZA_has_DOCENTE_DOCENTE1_idx');
            $table->index('id_plaza','fk_PLAZA_has_DOCENTE_PLAZA1_idx');

            $table->foreign('id_plaza')
                ->references('id')->on('PLAZA');

            $table->foreign('id_docente')
                ->references('id')->on('DOCENTE');

            $table->timestamps();

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('COMPONENTE_FORMACION');
        Schema::drop('CAMPO_DISCIPLINA');
        Schema::drop('DISCIPLINA');
        Schema::drop('TIPO_PLAZA');
        Schema::drop('TIPO_NOMBRAMIENTO');
        Schema::drop('RESULTADO');
        Schema::drop('DOCENTE');
        Schema::drop('ACTIVIDAD_ADMINISTRATIVA');
        Schema::drop('DOCENTE_DEFINITIVO');
        Schema::drop('CONCURSO');
        Schema::drop('FUNCION');
        Schema::drop('DOCENTE_TUTOR');
        Schema::drop('DOCENTE_IDONEO');
        Schema::drop('DOCENTE_ATP');
        Schema::drop('DOCENTE_EVALUADOR');
        Schema::drop('PLAZA');
        Schema::drop('TIPO_EVALUACION');
        Schema::drop('HISTORIAL_EVALUACION');
        Schema::drop('PLAZA_DOCENTE');

    }
}