<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserDetail extends Authenticatable
{

    protected $table = 'user_details';

    protected $fillable = [
        'user_id',
        'elector_key',
        'state_id',
        'section_id',
        'town_id',
        'townhall_id',
        'colonia_id',
        'street',
        'exterior_no',
        'interior_no',
        'postal_code_id',
        'scholarship',
        'gender',
        'facebook_link',
        'twitter_link',
        'instagram_link',
        'assigned_state_id',
        'tipo',
        'assigned_zone',
        'assigned_electoral_sections',
        'district',
        'verified',
        'assigned_sectional',
        'geo_data',
        'age',
        'curp',
    ];

    public function user() {
        return $this->hasOne(User::class);
    }

    public function state() {
        return $this->belongsTo(State::class);
    }

    public function townhall() {
        return $this->belongsTo(Townhall::class);
    }

    public function section() {
        return $this->belongsTo(Section::class);
    }

    public function colonia() {
        return $this->belongsTo(Colonia::class);
    }

    public function postal() {
        return $this->belongsTo(Zipcode::class, "postal_code_id");
    }
}
