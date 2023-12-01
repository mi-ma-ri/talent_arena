<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    protected $table = "players";

    protected $fillable = [
        'email',
        'password',
        'sport_id',
        'statuses_id',
        'full_name',
        'gender',
        'birthday',
        'current_team',
        'position',
    ];

    // スポーツ(競技名)テーブルとのリレーション
    public function sport()
    {
        return $this->belongsTo(Sport::class, 'sports_id', 'sports_name');
    }
}
