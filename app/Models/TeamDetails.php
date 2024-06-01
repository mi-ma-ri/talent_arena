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
        fillableにidや更新されたくないものは記述しない
    */
    protected $fillable = [
        'ground_1',
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
