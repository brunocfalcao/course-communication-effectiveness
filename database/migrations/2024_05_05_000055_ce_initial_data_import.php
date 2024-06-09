<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Artisan;

class CeInitialDataImport extends Migration
{
    public function up()
    {
        Artisan::call('db:seed', [
            '--class' => 'CommunicationEffectiveness\Database\Seeders\CommunicationEffectivenessCourseSeeder',
            '--force' => true,
        ]);
    }

    public function down()
    {
        //
    }
}
