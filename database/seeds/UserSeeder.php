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
        User::create(['first_name'=>'Eric', 'last_name'=>'Penner', 'email'=>'epenner@unomaha.edu', 'nu_id'=>'epenner', 'password'=>'$2y$10$Wo7YT1cH38ZM6jDXlFEgM.znRVi4OOSXkG/kI/0WRjHq6qHeSCWQ.', 'account_type'=>'admin']);
        User::create(['first_name'=>'Read', 'last_name'=>'Only', 'email'=>'readonly@unomaha.edu', 'nu_id'=>'ronly', 'password'=>'$2y$10$AFoxKyzudnJJhPodMX/8RO3E4nNf5zYp8HnZeFwJ7cPe/dnH9oH2a', 'account_type'=>'read-only']);
        User::create(['first_name'=>'Normal', 'last_name'=>'User', 'email'=>'user@unomaha.edu', 'nu_id'=>'user', 'password'=>'$2y$10$0P4obZjUDS1A/0IJWH11KOd7W.dU8DEPCwwJgOrlL7laISY4aXoke', 'account_type'=>'user']);
    }
}
