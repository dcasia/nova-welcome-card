<?php

declare(strict_types = 1);

namespace DigitalCreative\NovaWelcomeCard;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class WelcomeCardServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Nova::serving(static function (ServingNova $event): void {

            Nova::script('nova-welcome-card', __DIR__ . '/../dist/js/card.js');
            Nova::style('nova-welcome-card', __DIR__ . '/../dist/css/card.css');

        });
    }
}
