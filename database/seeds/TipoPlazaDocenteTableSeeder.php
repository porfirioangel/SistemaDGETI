<?php

use Illuminate\Database\Seeder;

class TipoPlazaDocenteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TIPO_PLAZA_DOCENTE')->insert([
            'id'=>'1',
            'docente_id'=>'1',
            'plaza'=>'E4829000000345688765',
            'tipo_plaza_horas'=>'40',
            'tipo_nombramiento_id'=>'1'
        ]);

        DB::table('TIPO_PLAZA_DOCENTE')->insert([
            'id'=>'2',
            'docente_id'=>'2',
            'plaza'=>'E8910462804113288765',
            'tipo_plaza_horas'=>'30',
            'tipo_nombramiento_id'=>'2'
        ]);

        DB::table('TIPO_PLAZA_DOCENTE')->insert([
            'id'=>'3',
            'docente_id'=>'2',
            'plaza'=>'E6520001324535288765',
            'tipo_plaza_horas'=>'20',
            'tipo_nombramiento_id'=>'1'
        ]);

        DB::table('TIPO_PLAZA_DOCENTE')->insert([
            'id'=>'4',
            'docente_id'=>'3',
            'plaza'=>'F6520001324234456134',
            'tipo_plaza_horas'=>'40',
            'tipo_nombramiento_id'=>'2'
        ]);

        DB::table('TIPO_PLAZA_DOCENTE')->insert([
            'id'=>'5',
            'docente_id'=>'4',
            'plaza'=>'E6520001329483788765',
            'tipo_plaza_horas'=>'40',
            'tipo_nombramiento_id'=>'1'
        ]);

        DB::table('TIPO_PLAZA_DOCENTE')->insert([
            'id'=>'6',
            'docente_id'=>'5',
            'plaza'=>'E6123001324535288765',
            'tipo_plaza_horas'=>'40',
            'tipo_nombramiento_id'=>'2'
        ]);
    }
}