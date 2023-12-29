<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scouts_team;


class VideoPosts extends Model
{
    use HasFactory;
    protected $table = "video_posts";

    protected $fillable = [
        'player_id',
        'scouts_team_id',
        'post_date',
        'post_url_1',
        'check_point_1',
        'post_url_2',
        'check_point_2',
        'post_url_3',
        'check_point_3'
    ];

    public function scoutsTeam()
    {
        return $this->belongsTo(Scouts_team::class, 'scouts_team_id');
    }

}
