<?php

use App\Models\Location;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('weather', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Location::class);
            $table->decimal('temperature', 5, 2);
            $table->tinyInteger('humidity');
            $table->float('pressure', 2);
            $table->float('wind_speed', 2);
            $table->smallInteger('wind_direction');
            $table->tinyInteger('type');
            $table->dateTime('forecasted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weather');
    }
};
