<?php

namespace App\Console\Commands;

use Exception;
use App\Models\User;
use Illuminate\Console\Command;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create admin user for the application.';

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
        $name = $this->ask('What is your name?');
        $email = $this->ask('Your email?');
        $password = $this->secret('Your password? (minimum 8 characters)');

        try {
            User::factory()->create([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($password),
            ]);

            $this->info('Admin user created successfully!');
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
