<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\RealEstate;


class RealEstateTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_can_list_real_estates()
{
    $response = $this->get('/api/real-estates');

    $response->assertStatus(200);
    $response->assertJsonStructure([
        '*' => ['id', 'name', 'real_state_type', 'street'] // include all relevant fields
    ]);
}
public function test_can_create_real_estate()
{
    $realEstateData = [
        'name' => 'Test Estate',
        'real_state_type' => 'house', // Assuming this is one of the valid options
        'street' => '123 Test Street',
        'external_number' => '100A', // Alphanumeric value
        'internal_number' => '101', // Alphanumeric value
        'neighborhood' => 'Test Neighborhood',
        'city' => 'Test City',
        'country' => 'US', // Use a valid ISO 3166-Alpha2 country code
        'rooms' => 3,
        'bathrooms' => 1.5, // Can be a decimal
        'comments' => 'Some comments here' // Optional
    ];

    $response = $this->post('/api/real-estates', $realEstateData);

    $response->assertStatus(201);
    $response->assertJson($realEstateData);
}
public function test_can_show_real_estate()
{
    $realEstate = RealEstate::first();
    // $realEstate = RealEstate::factory()->create();
    $response = $this->get("/api/real-estates/{$realEstate->id}");

    $response->assertStatus(200);
    $response->assertJson($realEstate->toArray());
}
public function test_can_update_real_estate()
{
    $realEstate = RealEstate::first();

    $updatedData = [
        'name' => 'Updated Name',
        // ... other updated data ...
    ];

    $response = $this->put("/api/real-estates/{$realEstate->id}", $updatedData);

    $response->assertStatus(200);
    $response->assertJson($updatedData);
}
public function test_can_delete_real_estate()
{
    $realEstate = RealEstate::first();

    $response = $this->delete("/api/real-estates/{$realEstate->id}");

    $response->assertStatus(204);
}

}
