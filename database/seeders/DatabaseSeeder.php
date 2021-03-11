<?php

namespace Database\Seeders;

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
        // Generate 10 users with 5 posts each.
        User::factory(10)
            ->hasPosts(5)
            ->create();
    }
}
