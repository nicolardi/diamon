<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BreweryService;

class ApiBreweryController extends Controller
{
    public function index(Request $request, BreweryService $breweryService)
    {
        return $breweryService->fetchPaginated($request->get('page', 1), $request->get('per_page', 10));
    }
}
