<?php

namespace App\Http\Controllers;

use App\Models\Forecast;
use App\Models\Studies;
use Illuminate\Http\Request;

class ForecastController extends Controller
{
    //this controller will get the forecast results

    function getForecast(Request $request){


        /* Validation */
        if(!is_numeric($request["no-of-studies"])){
            $data["result"] = array(
                "flag" => false,
                "message" => "No of Studies must be a number!",
                "class" => "warning"
            );
            return response($data);
        }
        if(!is_numeric($request["growth-per-month"])){
            $data["result"] = array(
                "flag" => false,
                "message" => "Growth per month must be a number!",
                "class" => "warning"
            );
            return response($data);
        }

        if(!is_numeric($request["months-to-forecast"])){
            $data["result"] = array(
                "flag" => false,
                "message" => "Months to forecast must be a number!",
                "class" => "warning"
            );
            return response($data);
        }

        if(empty($request["no-of-studies"])|| empty($request["growth-per-month"]) || empty($request["months-to-forecast"])){
            $data["result"] = array(
                "flag" => false,
                "message" => "Entries must not be empty!",
                "class" => "warning"
            );
            return response($data);
        }
        /* End Validation */

        $studies = new Studies();
        $studies->setNoOfStudies($request["no-of-studies"])
        ->setGrowthPerMonth($request["growth-per-month"]);//in percent
        $forecast = new Forecast($studies);
        $forecast->setNoOfMonths($request["months-to-forecast"]);


        /*getting the forecast */
        $data["result"] = $forecast->calculateCost()
                         ->getForecast();

        return response($data);
    }



}
