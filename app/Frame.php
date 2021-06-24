<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frame extends Model
{
    protected $primaryKey = 'frame_id';

    const CREATED_AT = 'frame_creation_date';

    public $timestamps = false;


}
