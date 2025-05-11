<?php
use App\Http\Controllers\api\ApiBreweryController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/v1/breweries', [ApiBreweryController::class, 'index'])->named('breweries.list');

