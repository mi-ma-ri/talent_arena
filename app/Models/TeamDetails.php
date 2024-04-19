<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\ScoutsTeam;


class TeamDetails extends Model
{
    use Authenticatable;
    protected $table = "team_details";

    protected $fillable = [
        'ground1',
        'ground_2',
        'ground_3',
        'members',
        'coach',
        'weekly_schedule',
        'tr_time',
        'pitch',
        'expenses',
        'dormitory',
        'conditions',
        'is_part_time_allowed'
    ];

    public function scoutsTeam(): BelongsTo
    {
        return $this->belongsTo(ScoutsTeam::class, 'scouts_team_id');
    }
}
