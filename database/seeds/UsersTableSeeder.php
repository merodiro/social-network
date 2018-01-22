<?php

use App\Post;
use App\Profile;
use App\User;
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
                $user->profile()->update(
                        factory(Profile::class)->make()->toArray()
                    );
                $user->posts()->saveMany(
                        factory(Post::class, rand(1, 15))->make()
                    );
            }
        );
    }
}
