<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$i = 1;
    	for(;;)
    	{
    		if($i > 1000)
    		{
    			break;
    		}
    		DB::table('users')->insert([
    			'name' => str_random(10),
    			'email' => str_random(10).'@gmail.com',
    			'password' => bcrypt('Root1234'),
    			]);
    		$i += 1;
    	}
    }
}
