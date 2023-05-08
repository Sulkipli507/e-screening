<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'gender',
        'date_of_birth',
        'address',
        'disease'
    ];

    public function getAgeAttribute()
    {
        $date_of_birth = Carbon::createFromFormat('Y-m-d', $this->date_of_birth);
        return $date_of_birth->diffInYears(Carbon::now());
    }
}

