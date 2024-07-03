<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'nik' => 'required|integer',
            'password' => 'required',
        ]);

        // $credentials = request(['nik', 'password']);

        // if (!Auth::attempt($credentials)) {
        //     return response()->json([
        //         'message' => 'Unauthorized'
        //     ], 401);
        // }

        $user = User::where('nik', $request->nik)->first();

        if (!$user) {
            return response()->json([
                'message' => 'NIK tidak ditemukan.'
            ], 401);
        }

        // Periksa password
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Password tidak valid.'
            ], 401);
        }

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function logout(Request $request)
    {
        // Mengambil token dari request yang aktif
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out successfully'
        ], 200);
    }
}
