<?php

use Illuminate\Support\Facades\Route;

Route::get("/","AppController@index");

Route::get("/forecast/get-forecast","ForecastController@getForecast");
