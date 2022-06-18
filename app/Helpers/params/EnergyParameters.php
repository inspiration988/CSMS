<?php

namespace App\Helpers\params;

use Exception;

class EnergyParameters implements ParametersInterface
{


    private  $meterStart;
    private  $meterStop;
    private  $rate;

    
    /**
     * check if the parameters are set or not
     * __construct
     *
     * @param  mixed $params
     * @return void
     */
    public function __construct(array $params)
    {
        if (isset($params['cdr']['meterStart'])) {
            $this->meterStart =  $params['cdr']['meterStart'];
        } else {
            throw new Exception("Parameters cdr.meterStart not set");
        }
        if (isset($params['cdr']['meterStop'])) {
            $this->meterStop =  $params['cdr']['meterStop'];
        } else {
            throw new Exception("Parameters cdr.meterStop not set");
        }
        if (isset($params['rate']['energy'])) {
            $this->rate =  $params['rate']['energy'];
        } else {
            throw new Exception("Parameters rate.energy not set");
        }
    }



        
    /**
     * getCdrParamsValue
     *
     * @return float
     */
    public  function getCdrParamsValue(): float
    {

        return   $this->meterStop -  $this->meterStart;
    }
    
    /**
     * getRateValue
     *
     * @return float
     */
    public  function getRateValue(): float
    {

        return   $this->rate;
    }

    
    /**
     * isValidParameters
     *
     * @return bool
     */
    public  function isValidParameters(): bool
    {
        return ($this->meterStop >= $this->meterStart);
    }
}
