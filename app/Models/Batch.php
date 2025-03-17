<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $table = 'batch'; // Table name
    protected $primaryKey = ['courseId', 'bno']; // Composite primary key
    public $incrementing = false; // Since it's not a single primary key
    public $timestamps = false; // No created_at or updated_at fields

    protected $fillable = [
        'courseId',
        'courseName',
        'bno',
        'interdt',
        'strtdt',
        'enddt',
        'coordinator',
        'tm',
        'numst',
        'courseFee'
    ];
}
