<?php

namespace App\Http\Controllers;

use App\Models\Forecast;
use App\Models\Studies;
use Illuminate\Http\Request;

class AppController extends Controller
{
    function index(){




        return view("app.index");
    }
}
