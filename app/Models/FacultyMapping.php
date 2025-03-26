<?php
/*
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyMapping extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'batch_id', 'subject_id', 'faculty_id'];

    public function course() { return $this->belongsTo(Course::class); }
    public function batch() { return $this->belongsTo(Batch::class); }
    public function subject() { return $this->belongsTo(Subject::class); }
   // public function faculty() { return $this->belongsTo(Faculty::class); }

   public function faculty() {
    return $this->belongsTo(Stafftp::class, 'faculty_id');
}

}*/
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyMapping extends Model
{
    protected $table = 'faculty_mapping'; // Ensure this is correct
    protected $fillable = ['course_id', 'batch_id', 'subject_id', 'faculty_id'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class, 'batch_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

  
    
   /* public function faculty()
    {
        return $this->belongsTo(StaffTp::class, 'faculty_id', 'emp_number')->withDefault();
    }*/
    public function faculty()
{
    return $this->belongsTo(StaffTp::class, 'faculty_id');
}

    
    

}

