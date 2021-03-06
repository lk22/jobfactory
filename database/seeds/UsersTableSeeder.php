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
        /**
         * create admin
         */
        $user = new JobDesk\User;

        $user->createUserWith([
        	'firstname' => 'Leo',
            'middlename' => '',
        	'lastname' => 'Knudsen',
            'name' => 'Leo Knudsen',
            'slug' => 'leo-knudsen',
        	'email' => 'lkdevelop@jobdesk.com',
        	'password' => bcrypt('1'),
        	'remember_token' => str_random(10),
         	'is_admin' => 1,
        	'has_active_email' => 1,
        	'avatar' => 'http://www.zocom.se/en/assets/frontpanel/images/img.png',
            'dream_job_title' => 'Full Stack Developer',
       	    'job_position' => 'Platform Engineer',
            'company' => 'JobDesk ApS',
            'description' => 'Web Entuitiast, Specialized Laravel engineer, and allways wearing a big smile :)'
        ]);

       	factory(JobDesk\User::class, rand(1,5))->create();
    }
}
