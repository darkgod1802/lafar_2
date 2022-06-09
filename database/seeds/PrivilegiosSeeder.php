<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrivilegiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('privilegios')->insert(array(
            ['ruta' => 'ProovedorControlador@crear'],
            ['ruta' => 'ProovedorControlador@eliminar'],
            ['ruta' => 'ProovedorControlador@modificar'],
            ['ruta' => 'ProovedorControlador@leer'],
            ['ruta' => 'ProovedorControlador@listar'],
        ));
        $this->command->info('Tabla rellenada correctamente');
    }
}
