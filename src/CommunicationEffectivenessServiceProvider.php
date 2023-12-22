<?php

namespace CommunicationEffectiveness;

use Eduka\Abstracts\Classes\EdukaServiceProvider;

class CommunicationEffectivenessServiceProvider extends EdukaServiceProvider
{
    public function boot()
    {
        Vite::macro('image', fn (string $asset) => $this->asset("resources/assets/images/{$asset}"));

        Vite::useBuildDirectory('vendor/' . Nereus::course()->canonical);

        $this->customViewNamespace(__DIR__.'/../resources/views', 'course');

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        parent::boot();
    }

    public function register()
    {
        parent::register();
    }
}
