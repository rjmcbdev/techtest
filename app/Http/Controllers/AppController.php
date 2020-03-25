<?php

namespace App\Http\Controllers;

use App\Models\Forecast;
use App\Models\Studies;
use Illuminate\Http\Request;

class AppController extends Controller
{
    function index(){
        $studies = new Studies();
        $studies->setNoOfStudies(1);
        $forecast = new Forecast($studies);





        return view("app.index");
    }
}
