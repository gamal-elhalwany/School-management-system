<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentParent extends Model
{
    use HasFactory;

    public function bloodType()
    {
        return $this->hasOne(BloodType::class);
    }

    public function religion()
    {
        return $this->hasOne(Religion::class);
    }

    public function nationality()
    {
        return $this->hasOne(Nationality::class);
    }
}
