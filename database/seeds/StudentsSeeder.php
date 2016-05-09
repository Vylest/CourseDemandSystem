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
        $faker = Faker\Factory::create();
        $status = ['Incoming', 'Active', 'Probation'];

        Student::create(['first_name' => 'Eric', 'last_name' => 'Penner', 'netid' => 'epenner', 'nuid' => '33679944', 'status'=>'Active', 'foundation_outstanding'=>0]);
        Student::create(['first_name' => 'Goyim', 'last_name' => 'Shekel', 'netid' => 'gshekel', 'nuid' => '23531155', 'status'=>'Incoming', 'foundation_outstanding'=>0]);
        Student::create(['first_name' => 'ayy', 'last_name' => 'eyyyy', 'netid' => 'alien', 'nuid' => '88888888',  'status'=>'Probation', 'foundation_outstanding'=>1]);

        foreach (range(1,200) as $index) {
            Student::create(['first_name'=>$faker->firstName, 'last_name' => $faker->lastName, 'netid' => $faker->userName, 'nuid' => $faker->numberBetween(11111111,99999999),
                             'status'=>$status[rand(0,2)], 'foundation_outstanding' => rand(0,1)]);
        }


    }
}
