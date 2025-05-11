<?php
namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestBreweriesController extends Controller
{
    public function index(Request $request)
    {
        $token = JWTAuth::fromUser(Auth::user());
        $page = $request->query('page', 1);
        $url = url(env('API_URL').'/breweries');
        $response = Http::withToken($token)->get(url($url), [
            'page' => $page,
            'per_page' => 10,
        ]);

        $data = $response->json();

        return view('admin.test', [
            'token' => $token,
            'breweries' => $data['data'] ?? [],
            'page' => $page
        ]);
    }
}
