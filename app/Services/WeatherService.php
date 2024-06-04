<?php

namespace App\Services;

use App\Contracts\WeatherApiContract;
use App\Models\Location;
use App\Structures\Dtos\WeatherDto;

class WeatherService
{
    public function __construct(protected WeatherApiContract $weatherService)
    {
        //
    }

    public function updateWeather(Location $location): Location
    {
        $weatherCollection = $this->weatherService->fetchWeather($location->latitude, $location->longitude);

        $weatherCollection->each(fn (WeatherDto $dto) => $location->weather()->updateOrCreate(
            ['forecasted_at' => $dto->forecastedAt],
            [
                'location_id' => $location->id,
                'forecasted_at' => $dto->forecastedAt,
                'temperature' => $dto->temperature,
                'humidity' => $dto->humidity,
                'pressure' => $dto->pressure,
                'type' => $dto->weatherCode,
                'wind_speed' => $dto->windSpeed,
                'wind_direction' => $dto->windDirection,
            ],
        ));

        return $location;
    }
}
