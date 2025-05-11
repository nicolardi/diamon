<?php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Services\BreweryService;

class BreweryApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_returns_mocked_breweries()
    {
        // Crea una finta risposta
        $mockResponse = [
            'status' => 'OK',
            'message' => 'success',
            'data' => [
                ['name' => 'Birrificio Mock', 'city' => 'Roma', 'state' => 'Lazio'],
            ],
        ];
    
        // Crea un mock del servizio
        $mock = \Mockery::mock(BreweryService::class);
        $mock->shouldReceive('fetchPaginated')->once()->andReturn($mockResponse);
    
        // Sostituisci l'istanza reale con quella mockata
        $this->app->instance(BreweryService::class, $mock);
    
        // Esegui la richiesta autenticata
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);
    
        $response = $this->withHeaders([
            'Authorization' => "Bearer $token",
            'Accept' => 'application/json',
        ])->getJson('/api/v1/breweries');
    
        $response->assertStatus(200)
                 ->assertJson([
                     'status' => 'OK',
                     'message' => 'success',
                     'data' => [
                         ['name' => 'Birrificio Mock']
                     ]
                 ]);
    }

    public function test_unauthenticated_user_gets_401()
    {
        $response = $this->getJson('/api/v1/breweries');

        $response->assertStatus(401)
                 ->assertJson([
                     'status' => 'KO',
                     'message' => 'unauthenticated',
                 ]);
    }
}
