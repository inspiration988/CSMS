<?php

namespace App\Helpers;

use App\Helpers\params\ParametersInterface;
use Exception;


class TimeRate implements RateInterface
{

    const min_per_hours = 60;
    const decimal_place = 3;

    private $_timeParams;

    /**
     * __construct
     *
     * @param  mixed $timeParameters
     * @return void
     */
    public function __construct(ParametersInterface $timeParameters)
    {
        $this->_timeParams = $timeParameters;
    }


    /**
     * calculate
     *
     * @return float
     */
    public  function calculate(): float | Exception
    {
        if ($this->_timeParams->isValidParameters()) {
            $cost = $this->_timeParams->getCdrParamsValue() * ($this->_timeParams->getRateValue() / self::min_per_hours);
            return round($cost, self::decimal_place);
        } else {

            throw new Exception("cdr time parameters are not valid");
        }
    }
}
