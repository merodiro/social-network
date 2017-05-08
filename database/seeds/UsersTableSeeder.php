<?php

use App\User;
use App\Profile;
use App\Post;
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
        factory(User::class, 40)->create()->each(
            function ($user) {
                $user->profile()->save(
                        factory(Profile::class)->make()
                    );
                $user->posts()->saveMany(
                        factory(Post::class, rand(1, 15))->make()
                    );
            });

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
