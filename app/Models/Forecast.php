<?php

namespace App\Models;

use App\Models\Studies;


class Forecast
{
    private $studies;
    private $noOfMonths;

    protected $ramPerStudy = 0.5; //0.5mb per study
    protected $ramCostPerHour = 0.00553; //0.00553 in USD
    protected $storagePerStudy = 10; //10mb per study
    protected $storageCost = 0.0001; //0.0001 per MB

    function __construct(Studies $studies)
    {
        $this->studies = $studies;
    }


    /**setters and getters**/
    public function setNoOfMonths($noOfMonths){
        $this->noOfMonths = $noOfMonths;
        return $this;
    }

    public function getNoOfMonths(){
        return $this->noOfMonths;
    }
    /**end setters and getters**/


    /* calculating the cost per month */
    function calculateCost(){
        $noOfStudies = $this->studies->getNoOfStudies();
        $growthPerMonth = $this->studies->getGrowthPerMonth();
        $noOfMonths = $this->getNoOfMonths();


    }




    public function getForecast(){






    }








}
