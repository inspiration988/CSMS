<?php

namespace App\Helpers;

use App\Helpers\params\ParametersInterface;
use Exception;


class EnergyRate implements RateInterface
{

    const decimal_place = 3;
    private $_energyParams;

    /**
     * __construct
     *
     * @param  mixed $energyParameters
     * @return void
     */
    public function __construct(ParametersInterface $energyParameters)
    {
        $this->_energyParams = $energyParameters;
    }

    /**
     * calculate
     *
     * @return float
     */
    public  function calculate(): float | Exception
    {
        if ($this->_energyParams->isValidParameters()) {
            return round(($this->_energyParams->getCdrParamsValue() * $this->_energyParams->getRateValue() / 1000), self::decimal_place);
        } else {
            throw new Exception("cdr energy parameters are not valid");
        }
    }
}
