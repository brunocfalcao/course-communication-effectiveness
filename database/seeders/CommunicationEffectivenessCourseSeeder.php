<?php

namespace CommunicationEffectiveness\Database\Seeders;

use Eduka\Cube\Models\Course;
use Eduka\Cube\Models\Domain;
use Eduka\Cube\Models\User;
use Eduka\Cube\Models\Variant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CommunicationEffectivenessCourseSeeder extends Seeder
{
    private static $videoIndex = 0;

    public function run(): void
    {
        $course = Course::create([
            'name' => 'Communication Effectiveness',
            'canonical' => 'communication-effectiveness',
            'admin_name' => 'Bruno Falcao',
            // Launched testing.
            'launched_at' => now()->subHour(),
            'admin_email' => env('NOVA_ADVANCED_UI_EMAIL'),
            'twitter_handle' => env('NOVA_ADVANCED_UI_TWITTER'),
            'provider_namespace' => 'NovaAdvancedUI\\NovaAdvancedUIServiceProvider',
            'lemon_squeezy_store_id' => env('LEMON_SQUEEZY_STORE_ID'),
        ]);

        // TailwindUI variant.
        $variant = Variant::create([
            'uuid' => (string) Str::uuid(),
            'canonical' => 'nova-advanced-ui-tailwindui',
            'course_id' => $course->id,
            'description' => 'Main course - Tailwind UI',
            'lemon_squeezy_variant_id' => env('NOVA_ADVANCED_UI_MAIN_VARIANT_TAILWIND_UI_ID'),
        ]);

        // Just Library and Videos variant.
        $variant = Variant::create([
            'uuid' => (string) Str::uuid(),
            'canonical' => 'nova-advanced-ui-library',
            'course_id' => $course->id,
            'description' => 'Main course - Just Library and Videos',
            'lemon_squeezy_variant_id' => env('NOVA_ADVANCED_UI_MAIN_VARIANT_LIBRARY_AND_VIDEOS_ID'),
            'lemon_squeezy_price_override' => env('NOVA_ADVANCED_UI_MAIN_VARIANT_LIBRARY_AND_VIDEOS_PRICE'),
        ]);

        $domain = Domain::create([
            'name' => 'communication-effectiveness.local',
            'course_id' => $course->id,
        ]);

        // Create admin user.
        $admin = User::create([
            'name' => 'Bruno Falcao',
            'email' => env('NOVA_ADVANCED_UI_EMAIL'),
            'password' => bcrypt('password'),
        ]);

        // Attach user to course.
        $course->users()->attach($admin->id);
    }
}
