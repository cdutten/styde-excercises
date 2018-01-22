<?php

abstract class Unit
{
    protected $hp = 40;
    protected $name;
    protected $damage = 10;
    protected $shield = 1;

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
        if ($this->hp <= 0) {
            $this->die();
        }
    }

    public function die()
    {
        $this->show("{$this->name} muere");
    }

    private function setHp($points)
    {
        $this->hp = $points;

        $this->show("{$this->name} ahora tiene " . round($this->hp) . " puntos de vida");
    }

    public function show($message)
    {
        echo "<p>$message</p>";
    }
}


class Soldier extends Unit
{
    public function __construct($name)
    {
        switch (rand(0, 3)) {
            case '1':
                $this->name = $name . ' +1';
                $this->shield = 1.5;
                break;
            
            case '2':
                $this->name = $name . ' +2';
                $this->shield = 3;
                break;
            
            case '3':
                $this->name = $name . ' +3';
                $this->shield = 6;
                break;
            
            default:
                $this->name = $name;
                break;
        }
    }

    protected $damage = 40;

    public function attack(Unit $opponent)
    {
        $this->show("{$this->name} corta a {$opponent->getName()} en dos");

        $opponent->takeDamage($this->damage);
    }

    public function takeDamage($damage)
    {
        if (rand(0, 1)) {
            return parent::takeDamage($damage / $this->shield);
        }
    }
}


class Archer extends Unit
{
    protected $hp = 100;
    protected $damage = 20;

    public function attack(Unit $opponent)
    {
        $this->show("{$this->name} dispara una flecha a {$opponent->getName()}");

        $opponent->takeDamage($this->damage);
    }

    public function takeDamage($damage)
    {
        if (rand(0, 1)) {
            return parent::takeDamage($damage);
        }
    }
}


$ramm = new Soldier('Ramm');

$silence = new Archer('Silence');
//$silence->move('el norte');
$i = 1;
while ($i <= 40) {
    $i++;
    if (rand(0, 1)) {
        $silence->attack($ramm);
    } else {
        $ramm->attack($silence);
    }
    if ($silence->getHp() <= 0 || $ramm ->getHp() <= 0) {
        exit;
    }
}
