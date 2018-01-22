<?
namespace C:\xampp7\htdocs\Styde\OOP\Ejercicio3;

use C:\xampp7\htdocs\Styde\OOP\Ejercicio3\Unit\unit.php;

class Archer extends Unit
{

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
