<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Services\BreweryService;
use Illuminate\Support\Facades\Http;

class BreweryServiceTest extends TestCase
{
    public function test_fetch_paginated_returns_expected_data()
{
    $fakeApiResponse = [[
        "id" => "5128df48-79fc-4f0f-8b52-d06be54d0cec",
        "name" => "(405) Brewing Co",
        "brewery_type" => "micro",
        "address_1" => "1716 Topeka St",
        "address_2" => null,
        "address_3" => null,
        "city" => "Norman",
        "state_province" => "Oklahoma",
        "postal_code" => "73069-8224",
        "country" => "United States",
        "longitude" => -97.46818222,
        "latitude" => 35.25738891,
        "phone" => "4058160490",
        "website_url" => "http://www.405brewing.com",
        "state" => "Oklahoma",
        "street" => "1716 Topeka St"
    ]];

    Http::fake([
        'https://api.openbrewerydb.org/v1/breweries*' => Http::response($fakeApiResponse, 200),
    ]);

    $service = new BreweryService();
    $jsonResponse = $service->fetchPaginated(1, 10);

    $result = $jsonResponse->getData(true); 

    $this->assertEquals('OK', $result['status']);
    $this->assertEquals('success', $result['message']);
    $this->assertCount(1, $result['data']);
    $this->assertEquals('(405) Brewing Co', $result['data'][0]['name']);
}

}
