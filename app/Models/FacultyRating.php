<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyRating extends Model
{
    use HasFactory;

    protected $table = 'faculty_ratings';
    protected $fillable = ['faculty_id', 'faculty_rating', 'consolidated_faculty_rating'];
}
