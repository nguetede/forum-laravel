<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaires extends Model
{
    protected $fillable=['sid','uid','text'];
}
