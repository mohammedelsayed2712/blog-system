<?php
namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all post and user IDs to associate with comments
        $postIds = Post::pluck('id')->toArray();
        $userIds = User::pluck('id')->toArray();

        $comments = [
            'Great post! Thanks for sharing.',
            'I found this really helpful.',
            'Could you elaborate more on this topic?',
            'This solved my problem, thank you!',
            'Interesting perspective!',
            'I disagree with some points but overall good content.',
            'Looking forward to more articles like this.',
            'Well written and easy to understand.',
            'This needs more examples to be clearer.',
            'Perfect timing! I was just researching this.',
            'The explanation was very thorough.',
            'I have a question about the implementation.',
            'This is exactly what I was looking for!',
            'Would love to see a follow-up post.',
            'Not sure I understand the last section.',
            'This changed my approach completely.',
            'The examples really helped me understand.',
            'Can you recommend any additional resources?',
            'I implemented this and it works great!',
            'This deserves more attention.',
        ];

        // Create 5-10 comments for each post
        foreach ($postIds as $postId) {
            $commentCount = rand(5, 10);

            for ($i = 0; $i < $commentCount; $i++) {
                DB::table('comments')->insert([
                    'body'       => $comments[array_rand($comments)],
                    'post_id'    => $postId,
                    'user_id'    => $userIds[array_rand($userIds)],
                    'created_at' => now()->subDays(rand(0, 30)),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
