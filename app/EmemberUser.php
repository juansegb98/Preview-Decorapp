<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmemberUser extends Model
{
    protected $table = 'wp_wp_eMember_members_tbl';
    protected $primaryKey = 'member_id';

    public $timestamps = false;

    protected $hidden = [
        'password',
    ];
    protected $fillable = [

    ];
    protected $attributes = [
        'membership_level' => 4,
        'last_accessed' => "0000-00-00 00:00:00",
        'last_accessed_from_ip' => '::1',
        
    ];
    public function wpUser() {
        return $this->belongsTo(User::class, 'user_email', 'email');
    }
    public function ememberData () {
        return $this->hasOne(EmemberMetaUser::class, 'user_id', 'member_id');
    }
}
