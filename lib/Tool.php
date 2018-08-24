<?php

namespace Library;

class Tool{

    const EXCERPT_MAX_LENGHT = 500;

    const GRAVATAR_DEFAULT_URL = 'http://projects.exanys.fr/discovery/images/default-avatar.png';
    const GRAVATAR_SIZE = 90;
    

    /**
     * Get the Excerpt from string.
     * Register as Twig extension filter : {{text|excerpt}}
     * @return string 
     */
    public static function getExcerpt($str, $maxLength= self::EXCERPT_MAX_LENGHT, $startPos=0) {
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

    /**
     * Get Gravatar from EMail.
     * Register as Twig extension filter : {{email|gravatar}}
     */
     public static function getGravatar($email){
        $gravURL = 'https://www.gravatar.com/avatar/'. md5( strtolower( trim( $email ) ) ) 
                    .'?d=' . urlencode( self::GRAVATAR_DEFAULT_URL )
                    .'&s=' . self::GRAVATAR_SIZE;

        return $gravURL;

     }
}