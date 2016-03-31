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
        Program::create(['name'=>'Management Information Systems', 'type'=>'Degree', 'career'=>'Graduate', 'credits_required'=>36]);
        Program::create(['name'=>'Electronic Commerce', 'type'=>'Concentration', 'career'=>'Graduate', 'credits_required'=>12]);
        Program::create(['name'=>'Health Informatics', 'type'=>'Concentration', 'career'=>'Graduate', 'credits_required'=>12]);
        Program::create(['name'=>'IT Audit / Control', 'type'=>'Concentration', 'career'=>'Graduate', 'credits_required'=>15]);
        Program::create(['name'=>'Information Assurance', 'type'=>'Concentration', 'career'=>'Graduate', 'credits_required'=>12]);
        Program::create(['name'=>'Project Management', 'type'=>'Concentration', 'career'=>'Graduate', 'credits_required'=>12]);
        Program::create(['name'=>'Telecommunications', 'type'=>'Concentration', 'career'=>'Graduate', 'credits_required'=>12]);
        Program::create(['name'=>'Data Analytics', 'type'=>'Concentration', 'career'=>'Graduate', 'credits_required'=>12]);
        Program::create(['name'=>'Data Management', 'type'=>'Concentration', 'career'=>'Graduate', 'credits_required'=>12]);
        Program::create(['name'=>'Geographic Information Systems', 'type'=>'Concentration', 'career'=>'Graduate', 'credits_required'=>12]);
        Program::create(['name'=>'Project Management', 'type'=>'Certificate', 'career'=>'Graduate', 'credits_required'=>12]);
        Program::create(['name'=>'System Analysis and Design', 'type'=>'Certificate', 'career'=>'Graduate', 'credits_required'=>12]);
        Program::create(['name'=>'Information Assurance', 'type'=>'Certificate', 'career'=>'Graduate', 'credits_required'=>12]);
        Program::create(['name'=>'Data Analytics', 'type'=>'Certificate', 'career'=>'Graduate', 'credits_required'=>15]);
        Program::create(['name'=>'Data Analytics', 'type'=>'Certificate', 'career'=>'Graduate', 'credits_required'=>15]);

    }
}
