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
    public function run()
    {
        Program::create(['name'=>'Management Information Systems', 'type'=>'undergraduate', 'career'=>'w', 'credits_required'=>120]);
        Program::create(['name'=>'Computer Science', 'type'=>'undergraduate', 'career'=>'w', 'credits_required'=>120]);
    }
}
