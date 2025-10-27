<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Return current authenticated user or null.
     */
    public function me(Request $request)
    {
        // If authentication will be added later (Sanctum, etc.)
        $user = Auth::user();

        return response()->json([
            'user' => $user,
        ]);
    }
}
