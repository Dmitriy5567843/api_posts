<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class PostsSeeder.
 *
 * @package Database\Seeders
 * @author DaKoshin.
 */
class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::transaction(function () {
            Post::factory()->count(100)->create();
        });
    }
}
