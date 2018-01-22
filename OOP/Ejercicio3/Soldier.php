<?php

namespace \Styde\OOP\Ejercicio3;

use \Styde\OOP\Ejercicio3\Unit;

class Soldier extends Unit
{
    protected $damage = 40;
    protected $shield = 20;

    public function attack(Unit $opponent)
    {
        $this->show("{$this->name} corta a {$opponent->getName()} en dos");

        $opponent->takeDamage($this->damage);
    }

    public function takeDamage($damage)
    {
        if (rand(0, 1)) {
            return parent::takeDamage($damage / 2);
        }
    }
}
