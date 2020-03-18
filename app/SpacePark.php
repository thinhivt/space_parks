<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpacePark extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number', 'status', 'group_id', 'trouble'
    ];
}
