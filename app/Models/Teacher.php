<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    // Define the table name if it doesn't follow the default plural convention
    protected $table = 'teachers';  // Ensure this matches your database table name

    // Define the primary key column name
    protected $primaryKey = 'id';

    // Define which attributes are mass assignable
    protected $fillable = ['name', 'subject', 'email', 'phone']; // Added 'subject' and 'email' to fillable

    // If your table does not have timestamps (created_at, updated_at), set this to false
    public $timestamps = true;

    // Relationship: One Teacher has many Courses
    public function courses()
    {
        return $this->hasMany(Course::class, 'teacher_id');
    }

    // Relationship enrollment
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

}
