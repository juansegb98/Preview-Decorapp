<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liner extends Model
{
    protected $primaryKey = 'liner_id';

    const CREATED_AT = 'liner_creation_date';

    public $timestamps = false;

}
