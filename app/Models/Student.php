<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'student'; // Explicitly define the correct table name

    protected $primaryKey = 'regno'; // Define primary key

    public $incrementing = false; // Since 'regno' is a string

    protected $fillable = [
        'regno', 'stname', 'sex', 'dob', 'guardian', 'conum', 
        'hname1', 'hname2', 'strname1', 'strname2', 'plcname1', 
        'plcname2', 'cityname1', 'cityname2', 'pinname1', 'pinname2', 
        'emailid', 'courseName', 'bno', 'strtdt', 'grnstatus', 
        'tm', 'rollNo', 'remark'
    ];

    public $timestamps = false; // Disable timestamps since your table does not have `created_at` and `updated_at`
}

