<?php
use Library\Application;

namespace Library;

class FrontendApplication extends Application{

    const FrontendENV = 'frontend';

    public function __construct(){
        $this->environnement = self::FrontendENV;
    }

}