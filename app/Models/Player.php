<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;
use App\Models\VideoPosts;
use App\Models\Statuses;


class Player extends Authenticatable
{
    /*
        メール・SMSなどの通知を送信する.現状実装していない
        use Notifiable;
    */
    const DEFAULT_STATUS = 1; // 定数を定義
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

    public function videoPosts()
    {
        return $this->hasMany(VideoPosts::class, 'players_id', 'id');
    }

    public function statuses()
    {
        return $this->belongsTo(Statuses::class, 'status_id');
    }
}
