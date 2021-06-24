<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    protected $primaryKey = 'design_id';

    const CREATED_AT = 'design_create_date';

    public $timestamps = false;

}
