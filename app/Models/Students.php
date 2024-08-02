<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Students extends Model
{
    use HasFactory;
    protected $table = "students";
    protected $fillable = [
        "id_course",
        "fname",
        "mname",
        "lname",
        "sname",
        "region",
        "province",
        "street_number",
        "city",
        "district",
        "zipcode",
        "nationality",
        "contact_number",
        "email",
        "gender",
        "civil_status",
        "education",
        "employment",
        "status",
        "birthdate",
        "birthplace",
    ];


    public function parent(){
        return $this->hasOne(Parents::class);
    }

    public function classification(){
        return $this->hasMany(Classification::class);
    }

    public function program(){
        return $this->hasOne(Programs::class, 'id', 'id_course');
    }


}
