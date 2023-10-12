<?php

declare(strict_types = 1);

namespace DigitalCreative\NovaWelcomeCard;

use Laravel\Nova\Card;

class WelcomeCard extends Card
{
    public $component = 'nova-welcome-card';

    public $width = 'full';

    public function title(string $title): static
    {
        return $this->withMeta([ 'title' => $title ]);
    }

    public function description(string $description): static
    {
        return $this->withMeta([ 'description' => $description ]);
    }

    public function addItem(string $icon, string $title, string $content): static
    {
        $currentItems = data_get($this->meta, 'items', []);
        $currentItems[] = [
            'icon' => $icon,
            'title' => $title,
            'content' => $content,
        ];

        return $this->withMeta([ 'items' => $currentItems ]);
    }
}
