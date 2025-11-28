<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class ProductCategory extends Field
{
    /**
     * Definiuje grupę pól dla kategorii produktów.
     *
     * @return array
     */
    public function fields(): array
    {
        $productCategory = new FieldsBuilder('product_category_fields', [
            'title' => 'Ustawienia kategorii',
            'style' => 'seamless',
            'position' => 'normal',
        ]);

        $productCategory
            ->setLocation('taxonomy', '==', 'product_cat');

        $productCategory
            ->addPageLink('linked_page', [
                'label' => 'Zastąp stronę kategorii',
                'instructions' => 'Wybierz stronę (utworzoną w zakładce "Strony"), która ma zostać wyświetlona zamiast domyślnej listy produktów dla tej kategorii. Jeśli nic nie wybierzesz, wyświetli się standardowe archiwum.',
                'post_type' => ['page'],
                'allow_null' => 1,
                'multiple' => 0,
                'allow_archives' => 0,
            ]);

        // Zwracamy tablicę zawierającą naszą grupę pól
        return [$productCategory];
    }
}