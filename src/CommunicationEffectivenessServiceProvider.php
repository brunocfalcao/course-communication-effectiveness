<?php

namespace CommunicationEffectiveness;

use Eduka\Abstracts\Classes\EdukaServiceProvider;

class CommunicationEffectivenessServiceProvider extends EdukaServiceProvider
{
    public function boot()
    {
        $this->customViewNamespace(__DIR__.'/../resources/views', 'course');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        parent::boot();
    }

    public function register()
    {
        parent::register();
    }
}
