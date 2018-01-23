<?php

use App\User;
use Illuminate\Database\Seeder;

class FriendshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        $users->each(
            function ($user) {
                for ($i = 0; $i < rand(1, 30); $i++) {
                    $user1 = User::inRandomOrder()->first();
                    $user2 = User::inRandomOrder()->first();

                    $user->addFriend($user1);
                    $user->acceptFriend($user2);
                }
            }
        );
    }
}
