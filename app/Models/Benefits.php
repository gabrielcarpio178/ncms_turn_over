<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefits extends Model
{
    use HasFactory;
    protected $table = "benefits";
    protected $fillable = [
        "programs_id",
        "benefit"
    ];

    public function programs(){
        return $this->hasMany(Programs::class);
    }
}
