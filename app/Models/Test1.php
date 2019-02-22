<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test1 extends Model
{
    protected $table = 'test1';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'id_number', 'date_of_birth',
    ];

}
