<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Helpers\ApiResponse;

class BreweryService
{
    // Base URL of the external brewery API
    protected $apiUrl = 'https://api.openbrewerydb.org/v1/breweries';

    /**
     * Fetch a paginated list of breweries from the external API.
     *
     * @param int $page     The page number to retrieve (default: 1)
     * @param int $perPage  The number of items per page (default: 10)
     * @return \Illuminate\Http\JsonResponse  Standardized JSON response with status/message/data
     */
    public function fetchPaginated($page = 1, $perPage = 10)
    {
        // Send GET request to external API with pagination parameters
        $response = Http::get($this->apiUrl, [
            'page' => $page,
            'per_page' => $perPage,
        ]);

        // Return a standardized API response using helper
        return ApiResponse::success($response->json());
    }
}
