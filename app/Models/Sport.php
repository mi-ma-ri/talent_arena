<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;
    protected $table = "sports";

    public function players()
    {
        return $this->hasMany(Sport::class, 'sport_id', 'sports_name');
    }
}
