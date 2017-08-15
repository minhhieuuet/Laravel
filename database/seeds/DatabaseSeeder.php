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
        // $this->call(UsersTableSeeder::class);
       $this->call(userSeeder::class);
    }
}

class userSeeder extends Seeder
{
	public function run()
	{
		DB::table('users')->insert([
			['name'=>'Hieu','email'=>'gigo@gmail.com','password'=>bcrypt('hii')],
			['name'=>str_random(4),'email'=>'gigo@gmail.com','password'=>bcrypt('hii')],
			['name'=>str_random(4),'email'=>'gigo@gmail.com','password'=>bcrypt('hii')]
			]);
	}
}