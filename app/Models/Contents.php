<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contents extends Model
{
    use HasFactory;
    protected $table = 'content';
    protected $fillable = [
        "content_name",
    ];

    public function images(){
        return $this->hasMany(Images::class);
    }
}
