<?php

namespace Tests\Feature;

use App\Exceptions\InvalidClientException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class IntegrationControllerTest extends TestCase
{
    public function test_user_should_not_retrieve_data_without_token()
    {
        $query = [
            'company' => 'localiza',
            'id'      => 5,
        ];

        $response = $this->get(route('integrations.find', $query));

        $response->assertStatus(Response::HTTP_UNAUTHORIZED)
            ->assertJson([
                'message' => 'you need a token to access'
            ]);
    }

    public function test_user_should_not_retrieve_data_invalid_token()
    {
        $query = [
            'company' => 'localiza',
            'id'      => 2,
        ];

        $response = $this->get(
            route('integrations.find', $query),
            ['token' => 'InvalidToken']
        );

        $response->assertStatus(Response::HTTP_UNAUTHORIZED)
            ->assertJson([
                'message' => 'that token are invalid'
            ]);
    }

    public function test_should_throw_invalid_client__id_if_invalid_data_is_provided() {

        $query = [
            'company' => 'localiza',
            'id'      => 99,
        ];

        $response = $this->get(
            route('integrations.find', $query),
            ['token' => config('integrations.token')]
        );        

        $response->assertStatus(Response::HTTP_BAD_REQUEST)
            ->assertJson([
                "message" => "invalid client ID"
            ]);
    }

    public function test_should_throw_invalid_client_if_invalid_data_is_provided() {

        $query = [
            'company' => 'randomCompany',
            'id'      => 1,
        ];

        $response = $this->get(
            route('integrations.find', $query),
            ['token' => config('integrations.token')]
        );        

        $response->assertStatus(Response::HTTP_BAD_REQUEST)
            ->assertJson([
                "message" => "invalid company name"
            ]);
    }

    public function test_user_can_retrieve_data_with_a_valid_token_and_movida_company() {
        
        $query = [
            'company' => 'movida',
            'id'      => 8,
        ];

        $response = $this->get(
            route('integrations.find', $query),
            ['token' => config('integrations.token')]
        );

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'name',
                'email',
                'phone'
            ]);
    }
    
    public function test_user_can_retrieve_data_with_a_valid_token_and_localiza_company() {
        
        $query = [
            'company' => 'localiza',
            'id'      => 4,
        ];
        
        $response = $this->get(
            route('integrations.find', $query),
            ['token' => config('integrations.token')]
        );

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'name',
                'email',
                'phone'
            ]);
    }
}
