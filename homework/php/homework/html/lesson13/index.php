<?php
class Car {
    public $door = 4;
    public $color;
    public $brand;
    public $fuel;

    const CONSTANTFIRST = 2;
    const CONSTANTSECOND = 5;
    const CONSTANTTHIRD = 12;

    public static function getMaxConstant(){
        $arr = [self::CONSTANTFIRST,self::CONSTANTSECOND,self::CONSTANTTHIRD];
        return max($arr);
    }


    public function __construct($color,$brand,$fuel)
    {
        $this->color = $color;
        $this->brand = $brand;
        $this->fuel = $fuel;
    }


    public function fuelСonsumption($distance)
    {
        $result = ($distance*$this->fuel)/100;
        return $result;
    }
}

$firstObject = new Car(null,null,null);
$secondObject = new Car(null,null,null);
$thirdObject = new Car("blue","volvo",5);
$fourthObject = new Car("dark","suzuki",8);


$firstObject->color = "red";
$firstObject->brand = "bmw";
$firstObject->fuel = 6;

$secondObject->color = "green";
$secondObject->brand = "vaz";
$secondObject->fuel = 9;

echo $firstObject->fuelСonsumption(1000). "</br>";
echo Car::CONSTANTFIRST. "</br>";
echo Car::CONSTANTSECOND. "</br>";
echo Car::CONSTANTTHIRD. "</br>";
echo Car::getMaxConstant();