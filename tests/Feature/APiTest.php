<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApiTest extends TestCase
{
    /**
     * A basic functional test example.
     */
    public function test_making_an_api_request(): void
    {
        $response = $this->postJson('/api/game/new', []);

        $response->assertStatus(405);
    }

    public function test_login_api(): void
    {
        $response = $this->postJson('/api/login', ['username' => 'admin', 'password' => 'admin']);

        $response->assertStatus(200)
            ->assertJsonStructure(
                [
                    'status',
                    'message',
                    'token'
                ]
            );
    }
}
