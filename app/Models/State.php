<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    
    protected $table = 'states';
        
    protected $fillable = [
        'name',
    ];

    public function sections() {
        return $this->hasMany(Section::class);
    }

    public function userDetails() {
        return $this->hasMany(UserDetail::class);
    }
}
