<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    
    protected $fillable = [
        'username',
        'password',
        'first_name',
        'second_name',
        'father_name',
        'mother_name',
        'phone_number',
        'phone_number_2',
        'email',
        'level',
        'parent_id',
    ];

    public function detail() {
        return $this->hasOne(UserDetail::class);
    }

    public function children() {
        return $this->hasMany(User::class, 'id', 'parent_id');
    }

    public function parent() {
        return $this->belongsTo(User::class, 'id', 'parent_id');
    }

}
