<?php
abstract class Unit {

    public function addUnit(Unit $unit) {
        throw new Exception(get_class($this). ' относится к "листьям"');
    }

    public function removeUnit(Unit $unit) {
        throw new Exception(get_class($this). ' относится к "листьям"');
    }

    abstract function bombardStrange();
}

class Army extends Unit {

    private $units = [];

    public function addUnit(Unit $unit) {
        if (in_array($unit, $this->units, true)) // проверяет дублирование ключей
            return;
        $this->units[] = $unit;
    }

    public function removeUnit(Unit $unit) {
        $this->units = array_udiff($this->units, [$unit], function ($a, $b) {
            return ($a === $b) ? 0 : 1;
        });
    }

    public function bombardStrange() {
        $res = 0;
        foreach ($this->units as $unit) {
            $res += $unit->bombardStrange();
        }
        return $res;
    }

}

class Archers extends Unit {

    function bombardStrange() {
        return 4;
    }

}

$main_army = new Army();
$main_army->addUnit(new Archers());

$sub_army = new Army();
$sub_army->addUnit(new Archers());
$sub_army->addUnit(new Archers());
$sub_army->addUnit(new Archers());

$main_army->addUnit($sub_army);
echo ($main_army instanceof Unit);
echo "Атакующая сила: {$main_army->bombardStrange()}\n";
