<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = "students";

    protected $fillable = [
        "class_id", "section_id", "student_name", "student_phone", "student_address", "student_email", "student_roll", "image"
    ];

    protected $casts = [
        "student_name" => "string", "student_phone" => "integer", "student_address" => "string", "student_email" => "string", "student_roll" => "integer",
    ];
}
