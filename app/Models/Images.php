<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $table = 'images';
    protected $fillable = [
        'content_id',
        'image',
        'captions'
    ];
    public function content(){
        return $this->hasMany(Contents::class);
    }
}
