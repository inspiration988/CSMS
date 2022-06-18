<?php

namespace App\Helpers\params;

interface ParametersInterface
{

    /**
     * __construct
     *
     * @param  mixed $params
     * @return void
     */
    public function __construct(array $params);


    /**
     * getRateValue
     *
     * @return void
     */
    public  function getRateValue();

    /**
     * getCdrParamsValue
     *
     * @return float
     */
    public  function getCdrParamsValue(): float;

    /**
     * isValidParameters
     *
     * @return bool
     */
    public  function isValidParameters(): bool;
}
