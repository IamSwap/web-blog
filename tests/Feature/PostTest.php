<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_see_posts_on_the_homepage()
    {
        $post = Post::factory()->create();

        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertSee($post->title);
    }

    public function test_user_can_visit_posts_url_and_see_post_details()
    {
        $post = Post::factory()->create();

        $response = $this->get('/posts/' . $post->id);

        $response->assertStatus(200)
            ->assertSee($post->title);
    }

    public function test_only_authenticated_user_can_create_a_post()
    {
        $user = User::factory()->create();

        $data = [
            'title' => 'This is a post title.',
            'description' => 'This is a post description.',
        ];

        $response = $this->actingAs($user)
                        ->post('/dashboard/posts', $data);

        $response->assertStatus(302);

        $response = $this->actingAs($user)
                        ->get('/dashboard');

        $response->assertSee($data['title']);
    }

    public function test_guest_user_can_not_create_a_post()
    {
        $data = [
            'title' => 'This is a post title.',
            'description' => 'This is a post description.',
        ];

        $response = $this->post('/dashboard/posts', $data);

        $response->assertRedirect('/login');
    }
}
