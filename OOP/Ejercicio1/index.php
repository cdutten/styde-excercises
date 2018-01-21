<?php

/**
* Car
*/
class Car
{
    public $brand;
    public $name;
    public $model;
    public $plate;
    public $color;
    public $doors;

    public function __construct($brand, $name)
    {
        $this->brand = $brand;
        $this->name = $name;
    }

    public function makeNoise()
    {
        echo 'BEEP!';
    }

    public function start()
    {
        echo 'Engine started';
    }

    public function setInfo(array $car)
    {
        $this->model    = $car['model'];
        $this->plate    = $car['plate'];
        $this->color    = $car['color'];
        $this->doors    = $car['doors'];
        return $this;
    }

    public function carInfo()
    {
        echo "This car is a $this->brand $this->name model $this->model. Has number of plate $this->plate. Is color $this->color an has $this->doors doors.";
    }
}

$cars = array(
    '1'=>[
        'model' => '2008',
        'plate' => 'ZRQ 980',
        'color' => 'blue',
        'doors' => 4
    ]
);
for ($i=1; $i <= count($cars); $i++) {
    ${'car' . $i} = (new Car('Toyota', 'Corolla'))->setInfo($cars[$i]);
}

echo $car1->carInfo();
