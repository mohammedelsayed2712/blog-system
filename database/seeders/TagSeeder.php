<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'Laravel',
            'PHP',
            'JavaScript',
            'Vue.js',
            'React',
            'MySQL',
            'Database',
            'API',
            'Backend',
            'Frontend',
            'Web Development',
            'Mobile',
            'UI/UX',
            'Design',
            'Testing',
            'Security',
            'DevOps',
            'Cloud',
            'AWS',
            'Docker',
        ];

        foreach ($tags as $tag) {
            DB::table('tags')->insert([
                'name'       => $tag,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
