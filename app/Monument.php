<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monument extends Model
{
    protected $table = 'monument';

    protected $fillable = ['userCreateur','nom', 'rue', 'cp',' ville', 'latitude', 'longitude', 'dateCrea', 'image', 'audio'];

    public $timestamps = false;
}
