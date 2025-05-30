<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct(protected UserService $userService) {}

    public function register(AuthUserRequest $request)
    {
        $validated = $request->validated();

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json([
            'user'  => $user,
            'token' => $user->createToken('auth_token')->plainTextToken,
        ]);
    }

    public function login(AuthUserRequest $request)
    {

        $credentials  = $request->validated();

        $user = User::firstWhere('email', $credentials['email']);

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Invalid credentials.'],
            ]);
        }

        $user->update(['qr_login_code' =>  null]);

        return response()->json([
            'user'  => $user,
            'token' => $user->createToken('auth_token')->plainTextToken,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out']);
    }

    public function qrLogin(Request $request)
    {
        $request->validate([
            'qr_login_code' => ['required'],
            'user_id' => ['required'],
        ]);

        $qrLoginCode = $request->input('qr_login_code');

        $userId = $request->input('user_id');

        $user = $this->userService->findFirst(filter: ['qr_login_code' => $qrLoginCode, 'id' => $userId]);

        if ($user) {
            $user->update(['qr_login_code' => null]);

            return response()->json([
                'user'  => $user,
                'token' => $user->createToken('auth_token')->plainTextToken,
            ]);
        }

        throw ValidationException::withMessages([
            'email' => ['Invalid credentials.'],
        ]);
    }
}
