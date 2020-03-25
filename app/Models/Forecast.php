<?php

namespace App\Models;

use App\Models\Studies;


class Forecast
{
    private $studies;
    private $noOfMonths;

    protected $ramPerStudy = 0.5; //0.5mb per study
    protected $ramCostPerHour = 0.00000553; // ram cost per MB
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

        while($month <= $noOfMonths){

            //considering forecast must be done next month
             $nextDate = date("Y-m-d",strtotime(" +" . $month . " months"));
             $days = date("t",strtotime($nextDate));

             $noOfStudies = $this->calculateStudiesGrowth($noOfStudies,$growthPerMonth);
             $ram = $this->getTotalRam($noOfStudies);
             $ramCostPerHr = $this->getRamCostPerHr($ram);
             $ramCostPerMonth = $this->getRamCostPerMonth($ramCostPerHr,$days);
             $storage = $this->getTotalStorage($noOfStudies);
             $storageCost = $this->getStorageCost($storage);
             $monthlyCost = $this->getTotalCost($storageCost,$ramCostPerMonth);
             $this->data[] = array(
                "monthYearStr" => date("Ym",strtotime($nextDate)),
                "month" => date("M Y",strtotime($nextDate)),
                "days" => $days,
                "noOfStudies" => $noOfStudies,
                "noOfStudiesFormatted" => number_format( $noOfStudies, 2, '.', ',' ),
                "ram" => $ram,
                "ramCostPerHr" => $ramCostPerHr,
                "ramCostPerMonth" => $ramCostPerMonth,
                "storageInMB" => $storage,
                "storageInGB" => $storage / 1000,
                "storageCost" => $storageCost,
                "monthlyCost" => $monthlyCost,
                "monthlyCostFormatted" => number_format($monthlyCost,2) . "$"
            );
            $month++;
        }
        return $this;
    }

    function calculateStudiesGrowth($noOfStudies,$growthPerMonth){
        $studiesGrowth = $noOfStudies + ($noOfStudies * ($growthPerMonth * .01));
        return $studiesGrowth;
    }

    function getTotalRam($noOfStudies){
        $ram = $noOfStudies * $this->ramPerStudy;
        return $ram;
    }

    function getRamCostPerHr($ram){
         $ramCost = $ram * $this->ramCostPerHour;
         return $ramCost;
    }
    function getRamCostPerMonth($ramCost,$days){
         $ramCost = $ramCost * ($days * 24);
         return $ramCost;
    }
    function getTotalStorage($noOfStudies){
       $storage = $noOfStudies * $this->storagePerStudy;
       return $storage;
    }


    function getStorageCost($storage){
        $cost = $storage * $this->storageCost; //per hour
       return $cost;
     }

     function getTotalCost($storageCost,$ramCost){
         $totalCost  = $storageCost + $ramCost;
         return $totalCost;
     }



    public function getForecast(){
        return $this->data;
    }








}
