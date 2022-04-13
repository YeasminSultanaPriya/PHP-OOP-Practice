<?php 


    // class declare 
    class Person{

        //property declare 
        public $name ;
        private $id ;
        protected $semester;

        const PI = 3.1416;

        //constructor method 
        public function __construct( $nameInfo , $sId , $sSemester )
        {
            $this->name = $nameInfo;
            $this->id = $sId;
            $this->semester = $sSemester;
        }

        public function makeCircle($r)
        {
            return self::PI * ($r * $r);
        }



        public function __destruct()
        {
            
        }
    }


    

?>