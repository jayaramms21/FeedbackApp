<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courses extends Model
{
    use HasFactory;

    protected $table = 'course_tp'; // Ensure it matches your DB table name
    public $timestamps = false; // Disable timestamps if not in DB

    protected $fillable = [
        'courseId',
        'courseName',
        'description',
    ];
}
