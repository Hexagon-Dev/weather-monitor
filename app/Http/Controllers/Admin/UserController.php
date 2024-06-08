<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\Admin\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController
{
	public function index(): JsonResponse
	{
		$users = User::withoutRole('admin')->paginate();

		return response()->json(UserResource::collection($users));
	}

	public function create(Request $request): JsonResponse
	{
		$data = $request->validate([
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'password' => ['required', 'string', 'min:8'],
		]);

		$user = User::create($data);

		return response()->json($user, 201);
	}

	public function update(Request $request, User $user): JsonResponse
	{
		$data = $request->validate([
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
			'is_blocked' => ['required', 'boolean'],
		]);

		$user->update($data);

		return response()->json($user);
	}

	public function delete(User $user): JsonResponse
	{
		$user->delete();

		return response()->json(null, 204);
	}
}
