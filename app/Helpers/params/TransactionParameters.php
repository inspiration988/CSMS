<?php

namespace App\Helpers\params;

use Exception;

class TransactionParameters  implements ParametersInterface
{



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
        if (isset($params['rate']['transaction'])) {
            $this->rate =  $params['rate']['transaction'];
        } else {
            throw new Exception("Parameters rate.transaction not set");
        }
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
        return (!empty($this->rate) ? true : false);
    }

    /**
     * getCdrParamsValue
     *
     * @return float
     */
    public  function getCdrParamsValue(): float
    {
        return   $this->rate;
    }
}
