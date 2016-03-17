<?php

use Illuminate\Database\Seeder;

use App\Program;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    /// type is Degree, concentration or certificate; career is graduate or undergrad
    public function run()
    {
        Program::create(['name'=>'Management Information Systems', 'type'=>'Degree', 'career'=>'Undergraduate', 'credits_required'=>120]);
        Program::create(['name'=>'MIS - Project Management', 'type'=>'Certificate', 'career'=>'Graduate', 'credits_required'=>12]);
        Program::create(['name'=>'MIS - System Analysis and Design', 'type'=>'Certificate', 'career'=>'Graduate', 'credits_required'=>12]);
        Program::create(['name'=>'MIS - Information Assurance', 'type'=>'Certificate', 'career'=>'Graduate', 'credits_required'=>12]);
        Program::create(['name'=>'MIS - Data Analytics', 'type'=>'Certificate', 'career'=>'Graduate', 'credits_required'=>15]);

    }
}
