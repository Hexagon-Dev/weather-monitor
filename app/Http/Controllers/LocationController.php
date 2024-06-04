<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Structures\Enums\LocationTypeEnum;

class LocationController extends Controller
{
    public function index()
    {
        return Location::where('type', LocationTypeEnum::REGION)->get();
    }
}
