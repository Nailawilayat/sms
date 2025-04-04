<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    // Make sure to include the necessary fields in the fillable array
    protected $fillable = ['student_id', 'course_id', 'status', 'enrollment_date', 'completion_date'];

    // Cast the date fields to Carbon instances for easier manipulation
    protected $casts = [
        'enrollment_date' => 'date',
        'completion_date' => 'date',
    ];

    // Define the relationship with the Student model
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    // Define the relationship with the Course model
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
