<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class ServiceFields extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $serviceFields = new FieldsBuilder('service_fields', [
            'title' => 'Dodatkowe pola Usługi',
            'position' => 'side', // Ta linijka przenosi pole na prawą stronę
        ]);

        $serviceFields
            ->setLocation('post_type', '==', 'uslugi');

        $serviceFields
            ->addWysiwyg('short_description', [
                'label' => 'Krótki opis (do zakładek)',
                'media_upload' => 0,
                'toolbar' => 'basic',
            ]);

        return $serviceFields->build();
    }
}