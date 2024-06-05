<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @method static Builder|LocationViewHistory newModelQuery()
 * @method static Builder|LocationViewHistory newQuery()
 * @method static Builder|LocationViewHistory query()
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $user_id
 * @property int $location_id
 * @method static Builder|LocationViewHistory whereCreatedAt($value)
 * @method static Builder|LocationViewHistory whereId($value)
 * @method static Builder|LocationViewHistory whereLocationId($value)
 * @method static Builder|LocationViewHistory whereUpdatedAt($value)
 * @method static Builder|LocationViewHistory whereUserId($value)
 * @mixin Eloquent
 */
class LocationViewHistory extends Model
{
    use HasFactory;
}
