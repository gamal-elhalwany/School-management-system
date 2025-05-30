<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['section_name', 'status', 'stage_id', 'classroom_id'];

    public $translatable = ['section_name'];

    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}