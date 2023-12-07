<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scouts_team extends Model
{
    use HasFactory;
    protected $table = "scouts_team";

    public function videoPosts()
    {
        return $this->hasMany(Video_posts::class, 'scouts_team_id');
    }
}
