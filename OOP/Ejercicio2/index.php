<?php
namespace styde\OOP\Ejercicio2;

/**
* Car
*/
class Car
{
    /**
     * [$brand description]
     * @var [string]
     */
    protected $brand;
    protected $name;
    protected $model;
    protected $plate;
    protected $color;
    protected $doors;

    /**
     * [__construct : Constructor of the object]
     * @param string $brand : car brand
     * @param string $name  : car name
     */
    public function __construct($brand, $name)
    {
        if ($brand == $name || strlen($name) < 2 || strlen($brand) < 2) {
            $this->brand = $brand;
            $this->name = $name;
        }
    }

    /**
     * Setters
     */

    /**
     * [setInfo : Set the car properties]
     * @param array $car [array of car info]
     * Accept: Model, plate, color and doors;
     */
    public function setInfo(array $car)
    {
        $car['model']? $this->model = $car['model']: '';
        $car['plate']? $this->plate = $car['plate']: '';
        $car['color']? $this->color = $car['color']: '';
        $car['doors']? $this->doors = $car['doors']: '';
        return $this;
    }


    /**
     * Getters
     */
    
    /**
     * [getBrand : get car brand]
     * @return [string] [ex: Toyota, Ford]
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * [getName : get car name ]
     * @return [String] [ex: Yaris, Focus or Fiesta]
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * [getModel : get car manufctar year ]
     * @return [date] [ex: 1998, 2015]
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * [getAge : get the age of the car]
     * @return [date] [age]
     */
    public function getAge()
    {
        return date("Y") - $this->model;
    }

    /**
     * [getPlate : get car Plate]
     * @return [String] [ex: QVR 555]
     */
    public function getPlate()
    {
        return $this->plate;
    }

    /**
     * [getColor : get color of the car]
     * @return [String] [ex: blue]
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * [getDoors : get number of doors]
     * @return [int] [ex: 4, 5 or 2]
     */
    public function getDoors()
    {
        return $this->doors;
    }

    /**
     * [getCarInfo description]
     * @return [type] [description]
     */
    public function getCarDescription()
    {
        return "This car is a $this->brand $this->name model $this->model. Has number of plate $this->plate. Is color $this->color an has $this->doors doors.";
    }

    /**
     * Custom Methods
     */

    /**
     * [makeNoise : use the claxon ]
     * @return [string] [the sound of the claxon]
     */
    public function makeNoise()
    {
        echo 'BEEP!';
    }

    /**
     * [start : starts the car engine]
     * @return [string] ['engine started confirmation']
     */
    public function start()
    {
        return 'Engine started';
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

echo $car1->getCarDescription();
echo '</br>';
echo $car1->getAge();
