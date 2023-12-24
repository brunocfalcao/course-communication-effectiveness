<?php

namespace CommunicationEffectiveness\Database\Seeders;

use Eduka\Cube\Models\Course;
use Eduka\Cube\Models\Domain;
use Eduka\Cube\Models\User;
use Eduka\Cube\Models\Variant;
use Illuminate\Database\Seeder;

class CommunicationEffectivenessCourseSeeder extends Seeder
{
    public function run(): void
    {
        $course = Course::create([
            'name' => 'Communication Effectiveness',
            'canonical' => 'course-communication-effectiveness',
            'admin_name' => 'Bruno Falcao',
            // Launched testing.
            'launched_at' => now()->subHour(),
            'admin_email' => env('CE_EMAIL'),
            'twitter_handle' => env('CE_TWITTER'),
            'provider_namespace' => 'CommunicationEffectiveness\\CommunicationEffectivenessServiceProvider',
            'lemon_squeezy_store_id' => env('LEMON_SQUEEZY_STORE_ID'),
        ]);

        // Add variant.
        Variant::create([
            'canonical' => 'course-communication-effectiveness-full',
            'course_id' => $course->id,
            'description' => 'Full course',
            'is_default' => true,
            'lemon_squeezy_variant_id' => env('CE_FULL_VARIANT_ID'),
        ]);

        Variant::create([
            'canonical' => 'course-communication-effectiveness-minimum',
            'course_id' => $course->id,
            'description' => 'Just the minimum',
            'lemon_squeezy_variant_id' => env('CE_MINIMUMS_VARIANT_ID'),
        ]);

        $domain = Domain::create([
            'name' => 'ce.local',
            'course_id' => $course->id,
        ]);

        // Create admin user.
        $admin = User::create([
            'name' => 'Bruno Falcao (CE)',
            'email' => env('CE_EMAIL'),
            'password' => bcrypt('password'),
        ]);

        // Attach user to course.
        $course->users()->attach($admin->id);
    }
}
