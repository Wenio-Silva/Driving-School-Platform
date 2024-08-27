<?php

namespace App\Http\Controllers\API\Auth;

use App\Models\Trainer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class TrainerAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $trainer = Trainer::where('email', $request->email)->first();

        if (!$trainer || !Hash::check($request->password, $trainer->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return response()->json([
            'customer' => $trainer,
            'token' => $trainer->createToken('mobile', ['role:trainer'])->plainTextToken
        ]);

    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
    }
}
