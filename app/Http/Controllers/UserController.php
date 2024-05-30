<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function getMe(): JsonResponse
    {
        return response()->json(UserResource::make(auth()->user()));
    }

    public function updateMe(Request $request): JsonResponse
    {
        /** @var User $user */
        $user = auth()->user();

        $data = $request->validate([
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ]);

        $user->update($data);

        return response()->json(['message' => 'Successfully updated.', 'user' => UserResource::make($user)]);
    }
}
