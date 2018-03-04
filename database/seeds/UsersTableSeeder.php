<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as FactoryFaker;

class UsersTableSeeder extends Seeder 
{

    /**
    * @var \Faker\Generator
    */
    private $faker;
    
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        // Apaga toda a tabela de usuários
        DB::table('users')->truncate();

        $this->faker = FactoryFaker::create();

        $this->createUsers();
        
    }

    private function createUsers()
    {
        //Cria 300 usuarios
        for ($i=0; $i <= 300 ; $i++) {   
            
            User::create([
                'email' => $this->faker->email, 
                'name'  => $this->faker->name,
                'password' => bcrypt(str_random(6))
            ]);
        }
    }
}