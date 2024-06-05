<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\User;
use App\Services\WeatherService;
use Illuminate\Http\JsonResponse;

class WeatherController extends Controller
{
	/**
	 * @param Location $location
	 * @param WeatherService $weatherService
	 *
	 * @return JsonResponse
	 */
    public function get(Location $location, WeatherService $weatherService): JsonResponse
    {
        $weather = $location
            ->weather()
            ->whereDate('forecasted_at', '>=', now()->startOfDay())
            ->where('forecasted_at', '<=', now()->addDays(7)->endOfDay())
            ->get();

		/** @var User|null $user */
		$user = \Auth::guard('sanctum')->user();

		$user?->locationViewHistory()->create(['location_id' => $location->id]);

        // If the weather data is not up-to-date, update it.
        if ($weather->count() < 168) {
            $weatherService->updateWeather($location);

            $weather = $location
                ->weather()
                ->whereDate('forecasted_at', '>=', now()->startOfDay())
                ->where('forecasted_at', '<=', now()->addDays(7)->endOfDay())
                ->get();
        }

        return response()->json(['weather' => $weather]);
    }
}
