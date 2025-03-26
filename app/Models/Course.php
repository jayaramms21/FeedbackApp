<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'course_tp';  // Link to your table

    protected $primaryKey = 'courseId';  // Primary key

    public $incrementing = false;  // Because courseId is a string

    public $timestamps = false; // 🚀 Disable timestamps

    protected $fillable = [
        'courseId', 'courseName', 'shortForm', 'coordinator', 'flag', 'courseFee'
    ];
}
