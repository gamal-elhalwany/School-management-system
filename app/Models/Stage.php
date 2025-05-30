<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Stage extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable = [
        'name',
        'notes',
    ];
    public $translatable = ['name', 'notes'];

    public function classrooms ()
    {
        return $this->hasMany(Classroom::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
