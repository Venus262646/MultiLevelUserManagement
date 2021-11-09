<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Townhall extends Model
{
    
    protected $table = 'townhalls';
        
    protected $fillable = [
        'name',
        'section_id',
    ];

    public function section() {
        return $this->belongsTo(Section::class);
    }
}
