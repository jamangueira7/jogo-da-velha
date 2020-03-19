<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Game extends Authenticatable
{
    use Notifiable;

    protected $connection = "mysql";
    protected $table = "games";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'level', 'result', 'user_id',
    ];

}//Game
