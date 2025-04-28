<?php
namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::all();
        $users = User::all();

        // Sample image data
        $images = [
            ['name' => 'profile', 'extension' => 'jpg', 'path' => 'images/profiles/'],
            ['name' => 'header', 'extension' => 'png', 'path' => 'images/headers/'],
            ['name' => 'featured', 'extension' => 'jpeg', 'path' => 'images/featured/'],
            ['name' => 'gallery', 'extension' => 'jpg', 'path' => 'images/gallery/'],
            ['name' => 'thumbnail', 'extension' => 'webp', 'path' => 'images/thumbnails/'],
        ];

        // Create images for posts
        foreach ($posts as $post) {
            $image = $images[array_rand($images)];
            DB::table('images')->insert([
                'name'           => $image['name'] . '-' . $post->id,
                'extension'      => $image['extension'],
                'path'           => $image['path'],
                'imageable_id'   => $post->id,
                'imageable_type' => 'App\Models\Post',
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);
        }

        // Create profile images for users
        foreach ($users as $user) {
            $image = $images[array_rand($images)];
            DB::table('images')->insert([
                'name'           => 'avatar-' . $user->id,
                'extension'      => $image['extension'],
                'path'           => 'images/avatars/',
                'imageable_id'   => $user->id,
                'imageable_type' => 'App\Models\User',
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);
        }
    }
}
