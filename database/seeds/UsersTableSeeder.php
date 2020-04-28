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
    	$user = App\User::create([
            'name'     => 'Snigdho Majumder',
    		'email'    => 'snigdho2011@gmail.com',
    		'password' => bcrypt('password'),
            'admin'    => 1
    	]); 

        
        App\Profile::create([
            'user_id'  => $user->id,
            'avatar'   => 'uploads/avatar/1.jpg',
            'about'    => 'The first song from Sweater comes with an unlikely but heartwarming disclaimer- you can not fall in love. But truly, the way the song has been been knitted, we assure that you can not help falling in love. Presenting Preme Pora Baron, in the mesmerising voice of Lagnajita Chakraborty, penned and composed by Ranajoy Bhattacherjee.',
            'facebook' => 'facebook.com',
            'youtube'  => 'youtube.com'
        ]);   
    }
}
