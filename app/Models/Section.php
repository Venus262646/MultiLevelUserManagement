<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    
    protected $table = 'sections';
        
    protected $fillable = [
        'code',
        'state_id',
    ];

    public function towns() {
        return $this->hasMany(Town::class);
    }

    public function townhalls() {
        return $this->hasMany(Townhall::class);
    }

    public function colonias() {
        return $this->hasMany(Colonia::class);
    }

    public function postal_codes() {
        return $this->hasMany(Zipcode::class);
    }

    public function state() {
        return $this->belongsTo(State::class);
    }
}
