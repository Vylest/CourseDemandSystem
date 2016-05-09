<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Model::unguard();

        $this->call(UserSeeder::class);
        $this->call(StudentsSeeder::class);
        $this->call(SemesterSeeder::class);
        $this->call(ProgramSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(RequirementSeeder::class);
        $this->call(PlanSeeder::class);

        Model::reguard();
    }
}
