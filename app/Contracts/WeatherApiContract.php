<?php

namespace App\Contracts;

use App\Structures\Dtos\WeatherDto;
use Illuminate\Support\Collection;

interface WeatherApiContract
{
    /**
     * @param float $latitude
     * @param float $longitude
     *
     * @return Collection<WeatherDto>
     */
    public function fetchWeather(float $latitude, float $longitude): Collection;
}
