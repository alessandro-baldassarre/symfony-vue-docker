<?php 

namespace App\Service;

class SecondService{
    public function __construct()
    {
        dump("from second service");
        $this->doSomething();
    }

    public function doSomething(){

    }

    public function doSomething2(){

        return 'WoW!';
    }
}