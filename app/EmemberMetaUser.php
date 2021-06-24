<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmemberMetaUser extends Model
{
    protected $table = 'wp_wp_members_meta_tbl';
    protected $primaryKey = 'umeta_id';

    public $timestamps = false;

    protected $fillable = [
        'meta_value',
    ];

    protected $attributes = [
        'meta_key' => 'custom_field',
    ];
    public function ememberUser() {
        return $this->belongsTo(EmemberUser::class, 'member_id', 'user_id');
    }
}
