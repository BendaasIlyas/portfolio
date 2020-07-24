<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    //
    protected $fillable = ['title', 'start_date', 'end_date', 'company', 'mission'];

}
