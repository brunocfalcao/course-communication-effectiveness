<?php

namespace CommunicationEffectiveness;

use Eduka\Abstracts\Classes\EdukaServiceProvider;

class CommunicationEffectivenessServiceProvider extends EdukaServiceProvider
{
    public function boot()
    {
        /**
         * The only mandatory line to be passed on the
         * course service provider.
         */
        $this->dir = __DIR__;

        parent::boot();
    }
}
