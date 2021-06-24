<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    protected $table = "arts";
    protected $primaryKey = 'art_id';
    const CREATED_AT = 'art_creation_date';
    public $timestamps = false;

}
