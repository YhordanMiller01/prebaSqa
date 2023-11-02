<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name      = "jhordan";
        $user->email     = "jhojamil92@gmail.com";
        $user->password  = bcrypt('12345');
        $user->save();


        $user2 = new User();
        $user2->name      = "admin";
        $user2->email     = "admin@gmail.com";
        $user2->password  = bcrypt('12345');
        $user2->save();

    }
}
