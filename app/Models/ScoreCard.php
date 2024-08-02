<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScoreCard extends Model
{
    use HasFactory;
    protected $table = 'score_card';
    protected $fillable = ['number_of_graduates', 'number_of_employed', 'employment_rate'];
}
