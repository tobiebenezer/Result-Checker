<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courses extends Model
{
    use HasFactory;
    protected $fillable =[
        'grade',
        'session',
        'matric_no',
        'file_id',
        'course_id'
    ];
}
