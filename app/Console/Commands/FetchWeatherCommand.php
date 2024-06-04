<?php

namespace App\Console\Commands;

use App\Contracts\WeatherApiContract;
use App\Models\Location;
use App\Services\WeatherService;
use Illuminate\Console\Command;

class FetchWeatherCommand extends Command
{
    protected $signature = 'weather:fetch {location}';

    protected $description = 'Fetches and updates weather for location.';

    public function handle(WeatherApiContract $weatherApiService): void
    {
        $locationArg = $this->argument('location');

        $location = Location::query()
            ->where('name', $locationArg)
            ->orWhere('code', $locationArg)
            ->orWhere('id', $locationArg)
            ->first();

        $service = new WeatherService($weatherApiService);

        $service->updateWeather($location);

        $this->info('Weather updated for ' . $location->name);
    }
}
