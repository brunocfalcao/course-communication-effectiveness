<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Artisan;
use NovaAdvancedUI\Database\Seeders\NovaAdvancedUICourseSeeder;

class NovaAdvancedUiInitialDataImport extends Migration
{
    public function up()
    {
        /**
         * We don't need to create anything specific here because eduka
         * already has the migration logic to migrate this course. The next
         * courses they will need to have their own migration logic.
         *
         * The only thing that lives here he any specific computation related
         * to the course configuration as per the eduka context.
         *
         * Please check the eduka-migrations migration files.
         */
        // Run initial framework schema seeder.
        // $seeder = new NovaAdvancedUICourseSeeder();
        // $seeder->run();
        Artisan::call('db:seed', [
            '--class' => 'NovaAdvancedUI\Database\Seeders\NovaAdvancedUICourseSeeder',
            '--force' => true,
        ]);
    }

    public function down()
    {
        //
    }
}
