<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class AboutImage extends Model
{
    protected $fillable = [
        'about_section_id',
        'image',
        'caption',
    ];

    public function aboutSection()
    {
        return $this->belongsTo(AboutSection::class);
    }
}