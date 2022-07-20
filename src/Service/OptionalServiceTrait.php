<?php 

namespace App\Service;

use App\Service\SecondService;
use Symfony\Contracts\Service\Attribute\Required;

trait OptionalServiceTrait {


    private $service;

    #[Required]
    public function setSecondService(SecondService $second_service){

        $this->service = $second_service;
       
    }
}