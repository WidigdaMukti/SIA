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
        // Validasi input untuk menerima baik NIK atau email
        $request->validate([
            'login' => 'required',  // Bisa berupa NIK atau email
            'password' => 'required',
        ]);

        // Coba cari user berdasarkan NIK
        $user = User::where('nik', $request->login)->orWhere('email', $request->login)->first();

        if (!$user) {
            return response()->json([
                'message' => 'NIK atau email tidak ditemukan.'
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
        // Mendapatkan token yang sedang digunakan
        $token = $request->bearerToken();

        if ($token) {
            // Menghapus token yang digunakan
            $request->user()->tokens()->where('token', hash('sha256', $token))->delete();

            return response()->json([
                'message' => 'Berhasil Logout',
            ], 200);
        }

        return response()->json([
            'message' => 'Token Tidak Valid',
        ], 401);
    }
}
