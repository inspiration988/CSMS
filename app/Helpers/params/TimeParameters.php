<?php

namespace App\Helpers\params;

use Carbon\Carbon;
use DateTime;
use Exception;

class TimeParameters  implements ParametersInterface
{


    private  $timestampStart;
    private  $timestampStop;
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
        if (isset($params['cdr']['timestampStart'])) {
            $this->timestampStart =  $params['cdr']['timestampStart'];
        } else {
            throw new Exception("Parameters cdr.timestampStart not set");
        }
        
        if (isset($params['cdr']['timestampStop'])) {
            $this->timestampStop =  $params['cdr']['timestampStop'];
        } else {
            throw new Exception("Parameters cdr.timestampStop not set");
        }
        if (isset($params['rate']['time'])) {
            $this->rate =  $params['rate']['time'];
        } else {
            throw new Exception("Parameters rate.time not set");
        }
    
    }

    
    /**
     * getCdrParamsValue
     *
     * @return float
     */
    public  function getCdrParamsValue(): float
    {
        $start = Carbon::create($this->timestampStart);
        $stop = Carbon::create($this->timestampStop);

        $diff = $start->diffInMinutes($stop);

        return $diff;
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
     * check the request parameters are valid or not
     * isValidParameters
     *
     * @return bool
     */
    public  function isValidParameters(): bool
    {
        return ($this->timestampStop >= $this->timestampStart);
    }
}
