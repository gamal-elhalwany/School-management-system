<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classroom extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable = ['name', 'stage_id'];
    public $translatable = ['name'];

    public function stages ()
    {
        return $this->belongsTo(Stage::class, 'stage_id', 'id');
    }
}
