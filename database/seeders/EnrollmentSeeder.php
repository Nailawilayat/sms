<?php
// database/seeders/EnrollmentSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnrollmentSeeder extends Seeder
{
    public function run()
    {
        DB::table('enrollments')->insert([
            'student_id' => 1,
            'course_id' => 1,
            'enrollment_date' => '2025-04-01',
            'status' => 'active',
            'completion_date' => '2025-06-01',
            'grade' => 85.50,
        ]);
    }
}

