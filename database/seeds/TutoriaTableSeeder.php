<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TutoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TUTORIA')->truncate();

        DB::table('TUTORIA')->insert([
            'id'=>'1',
            'docente_idoneo_id'=>'1',
            'docente_tutor_id'=>'1',
            'fecha_inicio_semestre'=>Carbon::parse('2016-08-03'),
            'fecha_final_semestre'=>Carbon::parse('2017-03-03'),
            'observacion'=>e('Las tutorías fueron excelente,
                un docente idoneo para tener una mejor plaza, creo va por muy buen camino.
                Es constante con sus trabajo, y ha tratado muy bien a los muchachos.'),
            'total_horas_semana'=>'10'
        ]);

        DB::table('TUTORIA')->insert([
            'id'=>'2',
            'docente_idoneo_id'=>'2',
            'docente_tutor_id'=>'1',
            'fecha_inicio_semestre'=>Carbon::parse('2015-06-03'),
            'fecha_final_semestre'=>Carbon::parse('2016-01-03'),
            'observacion'=>e('Un muchachito muy responsable, siempre fue puntual.
                Solo le falta un poco de modales, nunca se despidió de mi, pero creo
                que es inteligente y si le sabe a la materias que imparte'),
            'total_horas_semana'=>'5'
        ]);
    }
}
