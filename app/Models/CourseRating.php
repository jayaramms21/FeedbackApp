<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseRating extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'total_marks', 'total_feedbacks', 'course_rating'];
    //protected $fillable = ['course_id', 'course_rating'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
