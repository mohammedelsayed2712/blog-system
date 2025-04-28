<?php
namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all user and category IDs to associate with posts
        $userIds     = User::pluck('id')->toArray();
        $categoryIds = Category::pluck('id')->toArray();

        $posts = [
            [
                'title'   => 'Getting Started with Laravel',
                'excerpt' => 'Learn the basics of Laravel framework',
                'body'    => 'Laravel is a web application framework with expressive, elegant syntax...',
            ],
            [
                'title'   => 'Advanced PHP Techniques',
                'excerpt' => 'Explore advanced PHP programming concepts',
                'body'    => 'PHP continues to evolve with new features and improvements...',
            ],
            [
                'title'   => 'Building RESTful APIs',
                'excerpt' => 'A guide to creating RESTful APIs in Laravel',
                'body'    => 'RESTful APIs are essential for modern web applications...',
            ],
            [
                'title'   => 'Frontend Development with Vue.js',
                'excerpt' => 'Integrating Vue.js with Laravel',
                'body'    => 'Vue.js is a progressive JavaScript framework that works well with Laravel...',
            ],
            [
                'title'   => 'Database Optimization Tips',
                'excerpt' => 'Improve your database performance',
                'body'    => 'Database optimization is crucial for application performance...',
            ],
        ];

        foreach ($posts as $post) {
            DB::table('posts')->insert([
                'title'       => $post['title'],
                'slug'        => Str::slug($post['title']),
                'excerpt'     => $post['excerpt'],
                'body'        => $post['body'],
                'user_id'     => $userIds[array_rand($userIds)],
                'category_id' => $categoryIds[array_rand($categoryIds)],
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
