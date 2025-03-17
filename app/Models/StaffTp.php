<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffTp extends Model
{
    use HasFactory;
    protected $table = 'staff_tp'; // Table name
    public $timestamps = false; // Disable timestamps if not in the table

    protected $fillable = [
        'emp_number',
        'emp_name',
        'flag'
    ];
}
