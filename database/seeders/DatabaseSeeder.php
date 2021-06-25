<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Category::truncate();
        Post::truncate();

        $user = User::factory()->create();

        $personal = Category::create([
            "name" => "Personal",
            "slug" => "personal",
        ]);

        $family = Category::create([
            "name" => "Family",
            "slug" => "family",
        ]);

        $work = Category::create([
            "name" => "Work",
            "slug" => "work",
        ]);

        Post::create([
            "user_id" => $user->id,
            "category_id" => $family->id,
            "title" => "My family Post",
            "slug" => "my-first-post",
            "excerpt" =>
                "<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit accusamus explicabo adipisci pariatur provident! In atque magni consectetur, perferendis consequatur et id aliquam, sit, quos delectus libero minus repellendus alias! </p>",
            "body" => "<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium dicta quo atque, ipsum soluta pariatur culpa repellat nostrum quaerat iusto nisi similique odio numquam maiores tempora quas officia sit provident.
            Necessitatibus error cumque vel tenetur molestiae commodi, voluptas cum mollitia! Totam illo nesciunt laboriosam, cumque libero quibusdam provident voluptas maxime nisi blanditiis magni voluptate et ipsa officiis explicabo deserunt reiciendis! </p>",
        ]);

        Post::create([
            "user_id" => $user->id,
            "category_id" => $work->id,
            "title" => "My work Post",
            "slug" => "my-second-post",
            "excerpt" =>
                "<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit accusamus explicabo adipisci pariatur provident! In atque magni consectetur, perferendis consequatur et id aliquam, sit, quos delectus libero minus repellendus alias! </p>",
            "body" => "<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium dicta quo atque, ipsum soluta pariatur culpa repellat nostrum quaerat iusto nisi similique odio numquam maiores tempora quas officia sit provident.
            Necessitatibus error cumque vel tenetur molestiae commodi, voluptas cum mollitia! Totam illo nesciunt laboriosam, cumque libero quibusdam provident voluptas maxime nisi blanditiis magni voluptate et ipsa officiis explicabo deserunt reiciendis! </p>",
        ]);

        Post::create([
            "user_id" => $user->id,
            "category_id" => $personal->id,
            "title" => "My Pesonal Post",
            "slug" => "my-third-post",
            "excerpt" =>
                "<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit accusamus explicabo adipisci pariatur provident! In atque magni consectetur, perferendis consequatur et id aliquam, sit, quos delectus libero minus repellendus alias! </p>",
            "body" => "<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium dicta quo atque, ipsum soluta pariatur culpa repellat nostrum quaerat iusto nisi similique odio numquam maiores tempora quas officia sit provident.
            Necessitatibus error cumque vel tenetur molestiae commodi, voluptas cum mollitia! Totam illo nesciunt laboriosam, cumque libero quibusdam provident voluptas maxime nisi blanditiis magni voluptate et ipsa officiis explicabo deserunt reiciendis! </p>",
        ]);
    }
}
