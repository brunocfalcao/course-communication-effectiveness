<?php

namespace CommunicationEffectiveness\Database\Seeders;

use Eduka\Cube\Models\Backend;
use Eduka\Cube\Models\Course;
use Eduka\Cube\Models\Student;
use Eduka\Cube\Models\Variant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CommunicationEffectivenessCourseSeeder extends Seeder
{
    public function run()
    {
        $backend = Backend::firstWhere('domain', env('BPRO_DOMAIN'));

        $student = Student::create([
            'name' => env('CE_STUDENT_NAME'),
            'email' => env('CE_STUDENT_EMAIL'),
            'password' => bcrypt(env('CE_STUDENT_PASSWORD')),
        ]);

        // Create course.
        $course = Course::create([
            'name' => 'Communication Effectiveness',
            'description' => 'Be the best communicator in project management',
            'canonical' => 'course-communication-effectiveness',
            'domain' => env('CE_DOMAIN'),
            'provider_namespace' => 'CommunicationEffectiveness\\CommunicationEffectivenessServiceProvider',
            'backend_id' => $backend->id,

            'lemon_squeezy_store_id' => env('LEMON_SQUEEZY_STORE_ID'),
            'lemon_squeezy_api_key' => env('LEMON_SQUEEZY_API_KEY'),
            'lemon_squeezy_hash' => env('LEMON_SQUEEZY_HASH_KEY'),

            'progress' => 25,

            'theme' => [
                'primary-color' => '#1338BE',
                'secondary-color' => '#10414a',
                'danger-color' => '#23dafc',
            ],

            'clarity_code' => null,

            'twitter_handle' => env('CE_TWITTER'),
            'prelaunched_at' => now()->subHours(1),
            'launched_at' => now()->addDay(365),

            'student_admin_id' => $student->id,
        ]);

        // Add the 'course' filesystem disk.
        push_canonical_filesystem_disk($course->canonical);

        // Add twitter and logo images and update course.
        $email = Storage::disk($course->canonical)
            ->putFile(__DIR__.
                      '/../assets/email-logo.jpg');

        $course->update([
            'filename_email_logo' => $email,
        ]);

        $variant = Variant::create([
            'name' => 'Communication Effectiveness',
            'canonical' => 'communication-effectiveness',
            'description' => 'Communication Effectiveness (standard version)',
            'course_id' => $course->id,
            'lemon_squeezy_variant_id' => env('CE_VARIANT_ID'),
        ]);

        $course->update(['student_admin_id' => $student->id]);

        // Lets create a 2nd student that is not admin.
        $anotherStudent = Student::create([
            'name' => env('CE_ANOTHER_STUDENT_NAME'),
            'password' => bcrypt(env('CE_ANOTHER_STUDENT_PASSWORD')),
            'email' => env('CE_ANOTHER_STUDENT_EMAIL'),
        ]);

        // Add user to course.
        $anotherStudent->courses()->attach($course->id);
    }
}
