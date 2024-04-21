<?php
include('../models/db.php');

if (!$connect) {
    echo "No DATABASE";
} else {

    class userData
    {

        protected $feeds1;
        protected $feeds2;
        protected $feeds3;
        protected $feeds4;
        protected $mortality;
        protected $alive;
        protected $load;
        protected $harvest;
        protected $m1;
        protected $m2;
        protected $m3;
        protected $m4;
        protected $report;
        protected $weight;
        protected $message;

        public function __construct($getDATA)
        {
            $this->feeds1 = isset($getDATA["feeds1"]) ? $getDATA['feeds1'] : '';
            $this->feeds2 = isset($getDATA["feeds2"]) ? $getDATA['feeds2'] : '';
            $this->feeds3 = isset($getDATA["feeds3"]) ? $getDATA['feeds3'] : '';
            $this->feeds4 = isset($getDATA["feeds4"]) ? $getDATA['feeds4'] : '';
            $this->mortality = isset($getDATA["mortality"]) ? $getDATA['mortality'] : '';
            $this->alive = isset($getDATA["alive"]) ? $getDATA['alive'] : '';
            $this->load = isset($getDATA["load"]) ? $getDATA['load'] : '';
            $this->harvest =  isset($getDATA["harvest"]) ? $getDATA['harvest'] : '';
            $this->m1 = isset($getDATA["m1"]) ? $getDATA['m1'] : '';
            $this->m2 = isset($getDATA["m2"]) ? $getDATA['m2'] : '';
            $this->m3 = isset($getDATA["m3"]) ? $getDATA['m3'] : '';
            $this->m4 = isset($getDATA["m4"]) ? $getDATA['m4'] : '';
            $this->report = isset($getDATA["report"]) ? $getDATA['report'] : '';
            $this->weight = isset($getDATA["weight"]) ? $getDATA['weight'] : '';
            $this->message = isset($getDATA['message']) ? $getDATA['message'] : '';
        }

        // Getter methods
        public function getFeeds1()
        {
            return $this->feeds1;
        }

        public function getFeeds2()
        {
            return $this->feeds2;
        }

        public function getFeeds3()
        {
            return $this->feeds3;
        }

        public function getFeeds4()
        {
            return $this->feeds4;
        }

        public function getMortality()
        {
            return $this->mortality;
        }

        public function getAlive()
        {
            return $this->alive;
        }

        public function getLoad()
        {
            return $this->load;
        }

        public function getHarvest()
        {
            return $this->harvest;
        }

        public function getM1()
        {
            return $this->m1;
        }

        public function getM2()
        {
            return $this->m2;
        }

        public function getM3()
        {
            return $this->m3;
        }

        public function getM4()
        {
            return $this->m4;
        }

        public function getReport()
        {
            return $this->report;
        }

        public function getWeight()
        {
            return $this->weight;
        }
        public function getMessage()
        {
            return $this->message;
        }
    }
}
