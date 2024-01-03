<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Models\VideoPosts;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Player extends Authenticatable
{
    use Notifiable;
    protected $table = "players";

    protected $fillable = [
        'email',
        'password',
        'sports_id',
        'full_name',
        'gender',
        'birthday',
        'current_team',
        'position',
    ];

    // スポーツ(競技名)テーブルとのリレーション
    public function sport()
    {
        return $this->belongsTo(Sport::class, 'sports_id', 'id');
    }

    public function video_posts()
    {
        return $this->hasMany(VideoPosts::class, 'players_id', 'id');
    }
}
