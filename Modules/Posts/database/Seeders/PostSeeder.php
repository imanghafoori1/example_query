<?php

namespace Modules\Posts\database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Posts\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Post::factory()->count(300)->create();
    }
}
