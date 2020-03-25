<?php

namespace App\Http\Controllers;

use App\Models\Forecast;
use App\Models\Studies;
use Illuminate\Http\Request;

class ForecastController extends Controller
{
    //this controller will get the forecast results

    function getForecast(Request $request){

        $studies = new Studies();
        $studies->setNoOfStudies($request["no-of-studies"])
        ->setGrowthPerMonth($request["growth-per-month"]);//in percent
        $forecast = new Forecast($studies);
        $forecast->setNoOfMonths($request["months-to-forecast"]);


        /*getting the forecast */
        $data = $forecast->calculateCost()
                         ->getForecast();

        return response($data);
    }



}
