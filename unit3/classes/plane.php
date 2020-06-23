<?php


class Plane extends Vehicle
{
    public function  __construct($vehicleType = "Plane", $engineState = false, $fuel = 100, $speed = 0, $delta_fuel = 10, $delta_speed = 50)
    {
        parent::__construct($vehicleType, $engineState, $fuel, $speed, $delta_fuel, $delta_speed);
    }

}