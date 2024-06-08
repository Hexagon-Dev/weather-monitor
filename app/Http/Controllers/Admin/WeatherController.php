<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Weather;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
	public function index(): JsonResponse
	{
		return response()->json(Weather::paginate(50));
    }

	public function create(Request $request): JsonResponse
	{
		$data = $request->validate([
			'location_id' => ['required', 'exists:locations,id'],
			'forecasted_at' => ['required', 'date'],
			'temperature' => ['required', 'numeric'],
			'humidity' => ['required', 'numeric'],
			'pressure' => ['required', 'numeric'],
			'wind_speed' => ['required', 'numeric'],
			'wind_direction' => ['required', 'numeric'],
		]);

		$weather = Weather::create($data);

		return response()->json($weather, 201);
	}

	public function update(Request $request, Weather $weather): JsonResponse
	{
		$data = $request->validate([
			'temperature' => ['required', 'numeric'],
			'humidity' => ['required', 'numeric'],
			'pressure' => ['required', 'numeric'],
			'wind_speed' => ['required', 'numeric'],
			'wind_direction' => ['required', 'numeric'],
		]);

		$weather->update($data);

		return response()->json($weather);
	}

	public function delete(Weather $weather): JsonResponse
	{
		$weather->delete();

		return response()->json(null, 204);
	}
}
