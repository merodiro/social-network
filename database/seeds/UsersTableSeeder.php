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
        factory(App\User::class, 40)->create()->each(
            function ($user) {
                $user->profile()->save(
                        factory(App\Profile::class)->make()
                    );
                $user->posts()->saveMany(
                        factory(App\Post::class, rand(1, 15))->make()
                    );
            });

        $users = App\User::all();

        $users->each(
            function ($user) {
                for ($i = 0; $i < rand(1, 30); $i++) {
                    $user->addFriend(rand(1, $user->count()));
                    $user->acceptFriend(rand(1, $user->count()));
                }
            }
        );
    }
}
