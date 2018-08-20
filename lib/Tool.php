<?php

namespace Library;

class Tool{

    /**
     * Get the Excerpt from string.
     * Register as Twig extension filter : {{text|excerpt}}
     * @return string 
     */
    public static function getExcerpt($str, $startPos=0, $maxLength=500) {
        if(strlen($str) > $maxLength) {
            $excerpt   = substr($str, $startPos, $maxLength-3);
            $lastSpace = strrpos($excerpt, ' ');
            $excerpt   = substr($excerpt, 0, $lastSpace);
            $excerpt  .= '...';
        } else {
            $excerpt = $str;
        }
        
        return $excerpt;
    }
}