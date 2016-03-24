<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ProgramSeeder::class);
        $this->call(SemesterSeeder::class);
        $this->call(StudentsSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(RequirementSeeder::class);
    }
}
