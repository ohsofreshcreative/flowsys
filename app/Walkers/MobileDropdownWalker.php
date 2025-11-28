<?php

namespace App\Walkers;

use Walker_Nav_Menu;

class MobileDropdownWalker extends Walker_Nav_Menu
{
    /**
     * Starts the list before the elements are added.
     */
    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        // Submenu jest domyślnie ukryte i pojawia się z animacją.
        $output .= "\n<ul x-show=\"open\" x-transition class=\"pl-4 mt-2 space-y-2\" style=\"display: none;\">\n";
    }

    /**
     * Starts the element output.
     */
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $has_children = in_array('menu-item-has-children', $item->classes);

        // Case 1: Element ma dzieci (submenu).
        if ($has_children) {
            // Każdy element z submenu dostaje swój własny, niezależny stan `open`.
            $output .= '<li x-data="{ open: false }">';
            
            // Kontener flex do ułożenia linku i przycisku obok siebie.
            $output .= '<div class="flex items-center justify-between">';
            
            // Link do strony nadrzędnej – zajmuje większość miejsca.
            $output .= '<a href="' . esc_attr($item->url) . '" class="flex-grow py-1 pr-4">';
            $output .= esc_html($item->title);
            $output .= '</a>';
            
            // Osobny przycisk ze strzałką, który rozwija/zwija submenu.
            $output .= '<button @click.stop.prevent="open = !open" class="p-2 -mr-2 shrink-0">';
            $output .= '<span class="sr-only">Rozwiń podmenu</span>';
            // Ikona strzałki, która obraca się w zależności od stanu `open`.
            $output .= '<svg class="w-5 h-5 text-gray-500 transition-transform duration-200" :class="{ \'rotate-180\': open }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" /></svg>';
            $output .= '</button>';
            
            $output .= '</div>';
        } 
        // Case 2: Zwykły element menu, bez dzieci.
        else {
            $output .= '<li>';
            $output .= '<a href="' . esc_attr($item->url) . '" class="block py-1">';
            $output .= esc_html($item->title);
            $output .= '</a>';
        }
    }

    /**
     * Ends the element output, closing `<li>`.
     */
    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $output .= "</li>\n";
    }

    /**
     * Ends the list of after the elements are added.
     */
    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        $output .= "</ul>\n";
    }
}