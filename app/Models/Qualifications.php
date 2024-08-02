<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualifications extends Model
{
    use HasFactory;
    protected $table = "qualifications";
    protected $fillable = [
        "programs_id",
        "qualification"
    ];

    public function programs(){
        return $this->hasMany(Programs::class);
    }
}
