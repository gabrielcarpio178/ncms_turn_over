<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use HasFactory;
    protected $table = 'parents';
    protected $fillable = [
        'students_id',
        'plname',
        'pfname',
        'pmname',
        'pstreet_number',
        'pdistrict',
        'pzipcode',
        'pmunicipality',
        'psname',
        'pcontact_number'
    ];

    public function students(){
        return $this->hasOne(Students::class);
    }
}
