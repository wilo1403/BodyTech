<?php

use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'department_name'=>'Bolívar',
            'department_code'=>'13',
            'municipality_name'=>'Cartagena',
            'municipality_code'=>'13001'
        ]);
        DB::table('cities')->insert([
            'department_name'=>'Atlántico',
            'department_code'=>'8',
            'municipality_name'=>'Barranquilla',
            'municipality_code'=>'8001'
        ]);
    }
}
