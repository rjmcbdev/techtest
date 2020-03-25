<?php

use Illuminate\Support\Facades\Route;

Route::get("/","AppController@index");

Route::get("/forecast/","ForecastController@getForecast");
