<?php

namespace App\Helpers;

class RateManager
{
    const decimal_place = 2;

    private $overallRate = 0;
    private $_rateClassNames = [];
    private $_rateClasses = [];
    private $_components = [];
    private $_params;

    
    /**
     * __construct
     *
     * @param  mixed $params
     * @return void
     */
    public function __construct($params)
    {
        $this->_params = $params;
    }
    
    /**
     * addRateClasses
     *
     * @param  mixed $name
     * @param  mixed $rateClass
     * @param  mixed $paramClass
     * @return void
     */
    public function addRateClasses($name,  $rateClass,  $paramClass)
    {
        $this->_rateClassNames[] = [
            'name' => $name,
            'rateClass' => $rateClass,
            'paramClass' => $paramClass,
        ];

        return $this;
    }

    
    /**
     * 1: create object for each ParameterClasses 
     * 2: create object for each RateClass and pass ParameterClasses as DI 
     * _callRateClass
     *
     * @return void
     */
    private function _callRateClass()
    {
        if(empty($this->_rateClasses)){
            foreach ($this->_rateClassNames as $rateSection) {
                $_paramClasss = new  $rateSection['paramClass']($this->_params);
                $this->_rateClasses[$rateSection['name']] = new $rateSection['rateClass']($_paramClasss);
            }
        }
    
        return $this;
    }

    
    /**
     * calclulate total rate
     * calcualateOverall
     *
     * @return void
     */
    public function calcualateOverall()
    {
        $this->_callRateClass();
        foreach ($this->_rateClasses as $rateClass) {
            $this->overallRate =  $rateClass->calculate() + $this->overallRate;
        }

        return round($this->overallRate, self::decimal_place);
    }
    
    /**
     * merging and return  array by setting name of components as index 
     * getComponentsValue
     *
     * @return void
     */
    public function getComponentsValue()
    {
        $this->_callRateClass();
        foreach ($this->_rateClasses as $key => $value) {
            $this->_components[$key] = $value->calculate();
        }

        return $this->_components;
    }
}
