<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['first_name'=>'Eric', 'last_name'=>'Penner', 'email'=>'epenner@unomaha.edu', 'nu_id'=>'epenner', 'password'=>'$2y$10$Wo7YT1cH38ZM6jDXlFEgM.znRVi4OOSXkG/kI/0WRjHq6qHeSCWQ.', 'account_type'=>'2']);
    }
}
