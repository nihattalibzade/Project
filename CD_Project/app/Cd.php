<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cd extends Model {

    protected $table = 'cd';

    protected $fillable = [
        'name', 'artist', 'genre', 'price', 'release'
    ];

}
