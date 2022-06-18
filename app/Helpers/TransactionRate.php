<?php

namespace App\Helpers;

use App\Helpers\params\ParametersInterface;
use Exception;


class TransactionRate implements RateInterface
{

    private $_transactionParam;

    /**
     * __construct
     *
     * @param  mixed $transactionParameters
     * @return void
     */
    public function __construct(ParametersInterface $transactionParameters)
    {
        $this->_transactionParam = $transactionParameters;
    }

    /**
     * calculate
     *
     * @return float
     */
    public  function calculate(): float | Exception
    {
        if ($this->_transactionParam->isValidParameters()) {
            return $this->_transactionParam->getRateValue();
        } else {
            throw new Exception("rate transaction parameters are not valid");
        }
    }
}
