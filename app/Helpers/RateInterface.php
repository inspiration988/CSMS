<?php

namespace App\Helpers;

use App\Helpers\params\ParametersInterface;
use Exception;

interface RateInterface
{

    
    /**
     * __construct
     *
     * @param  mixed $parametersInterface
     * @return void
     */
    public function __construct(ParametersInterface $parametersInterface);

    
    /**
     * calculate
     *
     * @return float
     */
    public function calculate(): float| Exception;
}
