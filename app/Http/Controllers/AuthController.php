<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // $validatedData = $request->validated();
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // トークンを生成
        $token = $user->createToken('Personal Access Token')->accessToken;

        return response()->json(['token' => $token, 'user' => $user], 201);
    }

    public function login(Request $request)
    {
        // $validatedData = $request->validated();
        $validatedData = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        if (!Auth::attempt($validatedData)) {
        // if (!Auth::attempt($validatedData->only('email', 'password'))) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $token = Auth::user()->createToken('Personal Access Token')->accessToken;

        return response()->json(['token' => $token, 'user' => Auth::user()], 200);
    }

    public function user(Request $request)
    {
        // Bearerトークンが正しければここでユーザー情報取得
        return response()->json($request->user());
    }
}

