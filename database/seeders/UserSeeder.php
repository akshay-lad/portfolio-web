<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       
        User::create([
            'name'=> 'Akshay Lad',
            'email'=> 'superadmin@gmail.com',
            'password'=> bcrypt('12345678'),
            'date_of_birth'=> '1991-01-01',
            'contact_no'=> '9537214296',
            'contact_no2'=> '9537214296',
            'address'=> '63, Gopnath Soc., Near dada bhagvan jain temple, Kamrej, Surat. Gujarat (India).',
            'profile_image'=> '',
            'whatsapp_number'=> '9537214296',
            'facebook_url'=> 'https://www.facebook.com/akshaylad',
            'twitter_url'=> 'https://www.twitter.com/akshaylad',
            'linkedin_url'=> 'https://www.linkedin.com/akshaylad',
            'instagram_url'=> 'https://www.instagram.com/akshaylad',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);

    }
}
