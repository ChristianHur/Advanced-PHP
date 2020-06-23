<?php

//Parent class
class Vehicle
{
    // Data fields - properties
    private $vehicleType;
    private $engineState;   //on - off, true and false
    private $fuel;          //integer - measured in %
    private $speed;         //integer - measured in mph or knots

    private $delta_fuel;    //decremental or incremental value
    private $delta_speed;   //decremental/incremental value

    /**
     * Vehicle constructor.
     * @param string $vehicleType
     * @param bool $engineState
     * @param int $fuel
     * @param int $speed
     * @param int $delta_fuel
     * @param int $delta_speed
     */
    function __construct($vehicleType="uknown",$engineState=false,$fuel=100,$speed=0,$delta_fuel=1,$delta_speed=1)
    {
        $this->init($vehicleType,$engineState,$fuel,$speed,$delta_fuel,$delta_speed);
    }

    /**
     * Initialize data
     * @param $vehicleType
     * @param $engineState
     * @param $fuel
     * @param $speed
     * @param $delta_fuel
     * @param $delta_speed
     */
    function init($vehicleType,$engineState,$fuel,$speed,$delta_fuel,$delta_speed){
        $this->setVehicleType($vehicleType);
        $this->setEngineState($engineState);
        $this->setFuel($fuel);
        $this->setSpeed($speed);
        $this->setDeltaFuel($delta_fuel);
        $this->setDeltaSpeed($delta_speed);
    }

    /**
     * Start engine
     */
    public function startEngine(){

        if($this->getFuel() <= 0){
            echo "No fuel.  Cannot start engine.";
            return;
        }
        if($this->getEngineState()){
            echo "Engine is already ON.";
            return;
        }
        //Turn on engine
        $this->setEngineState(true);
        echo "Engine is ON";
    }

    /**
     * Stop engine
     */
    public function stopEngine(){
        /*
         * If vehicle is currently in motion, do not turn off engine
         */
        if($this->getSpeed() > 0){
            echo "Vehicle is still in motion.  Cannot turn off engine!";
            return;
        }

        if($this->getEngineState()){
            $this->setSpeed(0);
            $this->setEngineState(false);
            echo "Engine is OFF.";
            return;
        }

        echo "Engine is already OFF";
    }

    /**
     * Accelerate the vehicle by a notch
     */
    public function accelerate(){
        if(!$this->getEngineState()){
            echo "Please turn on the engine first!";
            return;
        }

        //If vehicle has fuel
        if($this->getFuel()>0){
            $this->fuel -= $this->delta_fuel;
            $this->speed += $this->delta_speed;
            echo "Accelerating...increasing speed.";
            return;
        }

        //If no fuel
        $this->setFuel(0);
        $this->setSpeed(0);
        $this->setEngineState(false);
        echo "Run out of fuel.";
    }

    /**
     * Breaking the vehicle
     */
    public function breaking(){
        /*
         * If engine is off
         */
        if(!$this->getEngineState()){
            echo "Breaking...Engine is off.";
            return;
        }

        /*
         * If vehicle is not moving
         */
        if($this->getSpeed()<=0){
            echo "Vehicle is already stopped.";
            return;
        }

        $this->speed -= $this->delta_speed;

        if($this->getSpeed() < 0){
            $this->setSpeed(0);
        }

        echo "Breaking...reducing speed.";
    }

    /**
     * Prints the vehicle information
     */
    public function showInfo(){
        echo "<p>Vehicle Type: " . $this->getVehicleType() . "</p>";
        echo "<p>Engine State: " . $this->showEngineState() . "</p>";
        echo "<p>Fuel Level: " . $this->getFuel() . "% </p>";
        echo "<p>Current Speed: " . $this->getSpeed() . " mph</p>";
    }

    /**
     * Method to return a text of "ON" or "OFF"
     * PHP does not display true/false to browser
     */
    public function showEngineState(){
        if($this->getEngineState()){
            return "ON";
        }else{
            return "OFF";
        }
    }

    /**
     * @return mixed
     */
    public function getVehicleType()
    {
        return $this->vehicleType;
    }

    /**
     * @param mixed $vehicleType
     */
    public function setVehicleType($vehicleType)
    {
        $this->vehicleType = $vehicleType;
    }

    /**
     * @return mixed
     */
    public function getEngineState()
    {
        return $this->engineState;
    }

    /**
     * @param mixed $engineState
     */
    public function setEngineState($engineState)
    {
        $this->engineState = $engineState;
    }

    /**
     * @return mixed
     */
    public function getFuel()
    {
        return $this->fuel;
    }

    /**
     * @param mixed $fuel
     */
    public function setFuel($fuel)
    {
        $this->fuel = $fuel;
    }

    /**
     * @return mixed
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * @param mixed $speed
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;
    }

    /**
     * @return mixed
     */
    public function getDeltaFuel()
    {
        return $this->delta_fuel;
    }

    /**
     * @param mixed $delta_fuel
     */
    public function setDeltaFuel($delta_fuel)
    {
        $this->delta_fuel = $delta_fuel;
    }

    /**
     * @return mixed
     */
    public function getDeltaSpeed()
    {
        return $this->delta_speed;
    }

    /**
     * @param mixed $delta_speed
     */
    public function setDeltaSpeed($delta_speed)
    {
        $this->delta_speed = $delta_speed;
    }


}