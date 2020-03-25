<?php

namespace App\Http\Controllers;

use App\Models\Forecast;
use App\Models\Studies;
use Illuminate\Http\Request;

class AppController extends Controller
{
    function index(){
        $studies = new Studies();
        $studies->setNoOfStudies(300)
        ->setGrowthPerMonth(0);//in percent
        $forecast = new Forecast($studies);
        $forecast->setNoOfMonths(5);

        $data = $forecast->calculateCost()
        ->getForecast();

        echo "<pre>";
        print_r($data);
        echo "</pre>";



        return view("app.index");
    }
}
