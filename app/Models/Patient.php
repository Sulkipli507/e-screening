<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'gender',
        'date_of_birth',
        'age',
        'address',
    ];

    public function disease(){
        return $this->belongsTo(Disease::class);
    }
}

