<?php

namespace App\Http\Controllers;


use App\Helpers\RateManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\CdrRequest;
use Illuminate\Http\Response;
use App\Helpers\TimeRate;
use App\Helpers\EnergyRate;
use App\Helpers\TransactionRate;
use App\Helpers\params\TimeParameters;
use App\Helpers\params\EnergyParameters;
use App\Helpers\params\TransactionParameters;
use Exception;

/**
 * Class CdrController
 * @package App\Http\Controllers
 */
class CdrController extends Controller
{

    public function rate(CdrRequest $request)
    {
        try{
            $rateManager = new RateManager($request->all());
            $rateManager->addRateClasses("time", TimeRate::class, TimeParameters::class);
            $rateManager->addRateClasses("energy", EnergyRate::class, EnergyParameters::class);
            $rateManager->addRateClasses("transaction", TransactionRate::class, TransactionParameters::class);
            
            $responce = [
                'overall' => $rateManager->calcualateOverall(),
                'components' => $rateManager->getComponentsValue()
            ];
            return Response::success( $responce);
        }catch(Exception $e){
            return Response::failed( $e->getMessage());
        }
       
    }
}
