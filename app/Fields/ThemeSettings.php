<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class ThemeSettings extends Field
{
    public function fields(): array
    {
        $theme = new FieldsBuilder('theme_settings');

        $theme
            ->setLocation('options_page', '==', 'theme-settings')
            ->addImage('logo', [
                'label' => 'Logo',
                'return_format' => 'array', // lub 'url' / 'id'
                'preview_size' => 'medium',
                'library' => 'all',
            ]);

        return [$theme];
    }
}
