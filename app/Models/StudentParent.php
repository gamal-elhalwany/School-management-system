<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class StudentParent extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded = [];

    public $translatable = ['father_name', 'father_job', 'mother_name', 'mother_job'];

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
