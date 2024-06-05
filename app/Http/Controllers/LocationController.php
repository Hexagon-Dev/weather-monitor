<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\User;
use App\Structures\Enums\LocationTypeEnum;
use Illuminate\Http\JsonResponse;

class LocationController extends Controller
{
    public function index()
    {
        return Location::where('type', LocationTypeEnum::REGION)
			->orderBy('name')
			->get();
    }

	public function toggleFavourite(Location $location): JsonResponse
	{
		/** @var User $user */
		$user = auth()->user();

		$user->favouriteLocations()->toggle($location);

		return response()->json();
	}
}
