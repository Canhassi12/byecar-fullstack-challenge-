<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class IntegrationControllerTest extends TestCase
{
    public function test_user_should_not_retrieve_data_without_token()
    {
        $response = $this->get(route('integrations.find', ['company' => 'localiza']));

        $response->assertStatus(Response::HTTP_UNAUTHORIZED)
            ->assertJson([
                'message' => 'you need a token to access'
            ]);
    }

    public function test_user_should_not_retrieve_data_invalid_token()
    {
        $response = $this->get(
            route('integrations.find', ['company' => 'localiza']),
            ['token' => 'InvalidToken']
        );

        $response->assertStatus(Response::HTTP_UNAUTHORIZED)
            ->assertJson([
                'message' => 'that token are invalid'
            ]);
    }

    public function test_user_can_retrieve_data_with_a_valid_token() {
        $response = $this->get(
            route('integrations.find', ['company' => 'localiza']),
            ['token' => env('INTEGRATIONS_TOKEN')]
        );

        $response->assertStatus(Response::HTTP_OK)
            ->assertJson([
                'name' => 'Joaozinho',
                'email' => 'joaozinho@gmail.com',
                'phone' => '+551140028922'
            ]);
    }

    
}
