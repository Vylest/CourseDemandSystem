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
        Student::create(['first_name' => 'Eric', 'last_name' => 'Penner', 'net_id' => 'epenner', 'nu_id' => '33679944']);
        Student::create(['first_name' => 'Goyim', 'last_name' => 'Shekel', 'net_id' => 'gshekel', 'nu_id' => '23531155']);
        Student::create(['first_name' => 'ayy', 'last_name' => 'lmao', 'net_id' => 'ayylmao', 'nu_id' => '88888888']);
    }
}
