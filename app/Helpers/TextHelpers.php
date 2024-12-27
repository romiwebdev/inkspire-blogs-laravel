<?php

namespace App\Helpers;

class TextHelpers
{
    public static function autoLink($text)
    {
        // Escape semua input untuk keamanan
        $escapedText = e($text);

        // Deteksi URL dan bungkus dengan tag <a>
        return preg_replace(
            '#(https?://[^\s]+)#',
            '<a href="$1" target="_blank" rel="noopener noreferrer">$1</a>',
            $escapedText
        );
    }
}
