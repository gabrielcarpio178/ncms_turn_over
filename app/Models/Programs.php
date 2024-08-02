<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programs extends Model
{
    use HasFactory;
    protected $table = 'programs';
    protected $fillable = [
        "id",
        "name",
        "exam_link",
        "img_name",
        "hours",
        "caption",
        "assessment_fee"
    ];

    public function qualifications(){
        return $this->hasMany(Qualifications::class);
    }

    public function competencies(){
        return $this->hasMany(Competencies::class);
    }

    public function benefits(){
        return $this->hasMany(Benefits::class);
    }

    public function students(){
        return $this->hasMany(Students::class);
    }

}
