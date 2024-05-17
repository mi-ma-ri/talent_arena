<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\ScoutsTeam;


class TeamDetails extends Model
{
    /*
        どのテーブルと関連付いているのか
    */
    protected $table = "team_details";

    /*
        guardedは不正データに書き換えられたくないカラム指定
    */
    protected $guarded = [
        'id',
        'scouts_team_id',
    ];

    public function scoutsTeam(): BelongsTo
    {
        return $this->belongsTo(ScoutsTeam::class, 'scouts_team_id');
    }
}
