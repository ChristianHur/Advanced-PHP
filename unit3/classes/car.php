<?php


class Car extends Vehicle
{
    public function __construct($vehicleType = "Car", $engineState = false, $fuel = 100, $speed = 0, $delta_fuel = 5, $delta_speed = 5)
    {
        parent::__construct($vehicleType, $engineState, $fuel, $speed, $delta_fuel, $delta_speed);
    }
}