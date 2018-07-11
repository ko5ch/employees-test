<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'name' => 'Employee Tree',
            'position' => 'universe',
            'start_day' => '2017-01-01',
            'parent_id' => '0',
            'lb' => '1',
            'rb' => '10',
            'salary' => '600',
            'depth' => '0',
            'photo' => 'default.jpg'
        ]);
        DB::table('employees')->insert([
            'name' => 'John Winchester',
            'position' => 'alpha',
            'start_day' => '2017-01-01',
            'parent_id' => '1',
            'lb' => '2',
            'rb' => '9',
            'salary' => '600',
            'depth' => '1',
            'photo' => 'default.jpg'
        ]);
        DB::table('employees')->insert([
            'name' => 'Sam Winchester',
            'position' => 'beta',
            'start_day' => '2017-01-01',
            'parent_id' => '2',
            'lb' => '3',
            'rb' => '6',
            'salary' => '300',
            'depth' => '2',
            'photo' => 'default.jpg'
        ]);
        DB::table('employees')->insert([
            'name' => 'Dean Winchester',
            'position' => 'beta',
            'start_day' => '2015-01-01',
            'parent_id' => '2',
            'lb' => '7',
            'rb' => '8',
            'salary' => '300',
            'depth' => '2',
            'photo' => 'default.jpg'
        ]);
        DB::table('employees')->insert([
            'name' => 'Castiel Angel',
            'position' => 'alpha',
            'start_day' => '2015-01-01',
            'parent_id' => '3',
            'lb' => '4',
            'rb' => '5',
            'salary' => '333',
            'depth' => '3',
            'photo' => 'default.jpg'
        ]);
    }
}
