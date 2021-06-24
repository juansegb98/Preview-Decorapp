<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Background extends Model
{
    protected $table = 'background';

    protected $primaryKey = 'background_id';

    const CREATED_AT = 'background_creation_date';


}
