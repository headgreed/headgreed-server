<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    protected $fillable = ['user_id', 'provider_user_id', 'provider', 'avatar_url', 'avatar_original', 'profileUrl'];
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
