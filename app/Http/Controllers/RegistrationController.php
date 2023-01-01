<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Exception;
use Illuminate\Http\Request;
use App\Models\User;

class RegistrationController extends Controller
{
    public function __invoke(Request $request)
    {
        try {
            $data = $request->validate([
                'username' => ['required', 'string', 'min:3', 'max:255', 'unique:users,username'],
                'email' => ['string', 'email', 'max:255', 'unique:users,email'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $user = User::create($data);

            $user->token = $user->createToken('token')->plainTextToken;

            return new UserResource($user);
        } catch (Exception $exception) {
            return response()->json([
                'data' => null,
                'errors' => $exception->getMessage()
            ]);
        }
    }
}
