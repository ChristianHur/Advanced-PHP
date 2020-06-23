<?php


class Boat extends Vehicle
{
    public function __construct($vehicleType = "Boat", $engineState = false, $fuel = 100, $speed = 0, $delta_fuel = 10, $delta_speed = 2)
    {
        parent::__construct($vehicleType, $engineState, $fuel, $speed, $delta_fuel, $delta_speed);
    }

    /**
     * Overriding parent's method
     * Prints knots instead of mph
     */
    public function showInfo()
    {
        echo "<p>Vehicle Type: " . $this->getVehicleType() . "</p>";
        echo "<p>Engine State: " . $this->showEngineState() . "</p>";
        echo "<p>Fuel Level: " . $this->getFuel() . "% </p>";
        echo "<p>Current Speed: " . $this->getSpeed() . " knots</p>";
    }
}