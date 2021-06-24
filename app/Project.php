<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $primaryKey = 'project_id';

    const CREATED_AT = 'project_creation_date';

}
