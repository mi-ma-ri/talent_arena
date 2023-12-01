<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;
    protected $table = "sports";

    public function player()
    {
        return $this->hasMany(Player::class, 'sports_id', 'sports_name');
    }
}