<?php

namespace Tests\Unit;

use App\Helpers\RateManager;
use App\Helpers\params\EnergyParameters;
use App\Helpers\params\TimeParameters;
use App\Helpers\params\TransactionParameters;
use App\Helpers\EnergyRate;
use App\Helpers\TimeRate;
use App\Helpers\TransactionRate;
use PHPUnit\Framework\TestCase;

class CalculateTest extends TestCase
{
    private $request;

    public function getRequest()
    {
        return [
            "rate" => [
                "time" => 2,
                "energy" => 0.3,
                "transaction" => 1
            ],
            "cdr" => [
                "meterStart" => 1204307,
                "timestampStart" =>  "2021-04-05T10:04:00Z",
                "meterStop" =>  1215230,
                "timestampStop" => "2021-04-05T11:27:00Z"
            ]
        ];
    }


    /**
     * test to check energy amount rate
     * @return void
     */
    public function test_calculate_energy()
    {
        $rateManager = new RateManager($this->getRequest());
        $rateManager->addRateClasses("energy", EnergyRate::class, EnergyParameters::class);
        $energyRate = $rateManager->calcualateOverall();
        $this->assertEquals(3.28, $energyRate);
    }

    /**
     * test to check time amount rate
     * @return void
     */
    public function test_calculate_time()
    {
        $rateManager = new RateManager($this->getRequest());
        $rateManager->addRateClasses("time", TimeRate::class, TimeParameters::class);
        $timeRate = $rateManager->calcualateOverall();
        $this->assertEquals(2.77, $timeRate);
    }

    /**
     * test to check transaction amount rate
     * @return void
     */
    public function test_calculate_transaction()
    {
        $rateManager = new RateManager($this->getRequest());
        $rateManager->addRateClasses("transaction", TransactionRate::class, TransactionParameters::class);
        $transactionRate = $rateManager->calcualateOverall();
        $this->assertEquals(1, $transactionRate);
    }

        
    /**
     * check if the time parameters are valid or not
     * test_time_parameters
     *
     * @return void
     */
    public function test_time_parameters(){
    
        $timeParamsClass = new TimeParameters($this->getRequest());
        $this->assertTrue(true , $timeParamsClass->isValidParameters());
    }
        
    /**
     * check if the energy parameters are valid or not
     * test_energy_parameters
     *
     * @return void
     */
    public function test_energy_parameters(){
    
        $energyParamsClass = new EnergyParameters($this->getRequest());
        $this->assertTrue(true , $energyParamsClass->isValidParameters());
    }

    
        
    /**
     * check if the transaction parameter is valid or not
     * test_transaction_parameters
     *
     * @return void
     */
    public function test_transaction_parameters(){
    
        $transactionParamsClass = new TransactionParameters($this->getRequest());
        $this->assertTrue(true , $transactionParamsClass->isValidParameters());
    }

    
}
