<?php

namespace App\Models;



class Studies
{
    protected $noOfStudies ;
    protected $growthPerMonth;


/** setters and getters**/

    public function setNoOfStudies($noOfStudies){
        $this->noOfStudies = $noOfStudies;
        return $this;
    }

    public function setGrowthPerMonth($growthPerMonth){
        $this->growthPerMonth = $growthPerMonth;
        return $this;
    }


    public function getNoOfStudies(){
        return $this->noOfStudies;
    }

    public function getGrowthPerMonth(){
        return $this->growthPerMonth;
    }

    /**end setters and getters**/

}
