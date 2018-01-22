<?php
namespace Styde\OOP\Ejercicio3;

abstract class Unit
{
    protected $hp = 40;
    protected $name;
    protected $damage = 10;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getHp()
    {
        return $this->hp;
    }

    public function move($direction)
    {
        $this->show("{$this->name} camina hacia $direction");
    }

    abstract public function attack(Unit $opponent);

    public function takeDamage($damage)
    {
        $this->setHp($this->hp - $damage);
        if (rand(0, 1)) {
            if ($this->hp <= 0) {
                $this->die();
            }
        }
    }

    public function die()
    {
        $this->show("{$this->name} muere");
    }

    private function setHp($points)
    {
        $this->hp = $points;

        $this->show("{$this->name} ahora tiene {$this->hp} puntos de vida");
    }

    public function show($message)
    {
        echo "<p>$message</p>";
    }
}
