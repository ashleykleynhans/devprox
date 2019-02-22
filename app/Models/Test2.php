<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test2 extends Model
{
    protected $table = 'csv_import';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'id_number', 'date_of_birth',
    ];

}
