<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';

    use HasFactory;

    protected $fillable = ['student_id', 'course_id','faculty_rating', 'course_rating'];

    protected $casts = [
        'faculty_rating' => 'array', // JSON to array conversion
        'course_rating' => 'array',
    ];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
