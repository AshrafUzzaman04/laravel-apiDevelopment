<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class section extends Model
{
    use HasFactory;

    protected $table = "sections";
    protected $fillable = [
        "class_id", "section_name"
    ];
    protected $casts = [
        "section_name" => "string",
    ];
}
