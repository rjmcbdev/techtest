<?php

namespace App\Models;

use App\Models\Studies;


class Forecast
{
    private $studies;
    private $noOfMonths;

    protected $ramPerStudy = 0.5; //0.5mb per study
    protected $ramCostPerHour = 0.00000553; //0.00553 in USD
    protected $storagePerStudy = 10; //10mb per study
    protected $storageCost = 0.0001; //0.0001 per MB

    private $data;


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


    /* calculating the costs per month */
    function calculateCost(){
        $noOfStudies = $this->studies->getNoOfStudies();
        $growthPerMonth = $this->studies->getGrowthPerMonth();
        $noOfMonths = $this->getNoOfMonths();
        $month = 1;

        while($month != $noOfMonths){

            //considering forecast must be done next month
             $nextDate = date("Y-m-d",strtotime(" +" . $month . " months"));
             $days = date("t",strtotime($nextDate));

             $noOfStudies = $this->calculateStudiesGrowth($noOfStudies,$growthPerMonth);
             $ram = $this->getTotalRam($noOfStudies);
             $ramCost = $this->getTotalRamCost($ram);
             $storage = $this->getTotalStorage($noOfStudies);
             $storageCost = $this->getStorageCostPerHr($storage,$days);
             $monthlyStorageCost = $this->getMonthlyStorageCost($storageCost,$days);

            $this->data[] = array(
                "month" => date("M Y",strtotime($nextDate)),
                "days" => $days,
                "noOfStudies" => $noOfStudies,
                "ram" => $ram,
                "ramCost" => $ramCost,
                "storageInMB" => $storage,
                "storageInGB" => $storage / 1000,
                "storageCostPerHr" => $storageCost,
                "monthlyStorageCost" => $monthlyStorageCost,
            );
            $month++;
        }
        return $this;
    }


    function getTotalRam($noOfStudies){
        $ram = $noOfStudies * $this->ramPerStudy;
        return $ram;
    }

    function getTotalRamCost($ram){
         $ramCost = $ram * $this->ramCostPerHour;
         return $ramCost;
    }
    function getTotalStorage($noOfStudies){
       $storage = $noOfStudies * $this->storagePerStudy;
       return $storage;
    }


    function getStorageCostPerHr($storage,$days){
        $cost = $storage * $this->storageCost; //per hour
       return $cost;
     }

     function getMonthlyStorageCost($cost,$days){
        $totalStorageCost = ($days * 24) * $cost ; //per month
        return $totalStorageCost;
     }

    function calculateStudiesGrowth($noOfStudies,$growthPerMonth){
        $studiesGrowth = $noOfStudies + ($noOfStudies * ($growthPerMonth * .01));
        return $studiesGrowth;
    }



    public function getForecast(){
        return $this->data;
    }








}
