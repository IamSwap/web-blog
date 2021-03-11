<?php

namespace App\Console\Commands;

use Exception;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ImportPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import posts from API';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $admin = User::first();

        if (! $admin) {
            return $this->error('No admin user is available! Please create one first!');
        }

        try {
            $response = Http::get('https://sq1-api-test.herokuapp.com/posts');
            $posts = $response->json()['data'];

            foreach ($posts as $post) {
                $admin->posts()->create([
                    'title' => $post['title'],
                    'description' => $post['description'],
                    'publication_date' => $post['publication_date'],
                ]);
            }

            Cache::tags('posts')->flush();

            $this->info('Posts imported successfully!');
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
