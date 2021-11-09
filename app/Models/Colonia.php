<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colonia extends Model
{

    protected $table = 'colonias';

    protected $fillable = [
        'name',
        'section_id',
    ];

    public function section() {
        return $this->belongsTo(Section::class);
    }
}
