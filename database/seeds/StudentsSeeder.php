<?php

use Illuminate\Database\Seeder;
use App\Student;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create(['first_name' => 'Eric', 'last_name' => 'Penner', 'netid' => 'epenner', 'nuid' => '33679944']);
        Student::create(['first_name' => 'Goyim', 'last_name' => 'Shekel', 'netid' => 'gshekel', 'nuid' => '23531155']);
        Student::create(['first_name' => 'ayy', 'last_name' => 'eyyyy', 'netid' => 'alien', 'nuid' => '88888888']);
    }
}
