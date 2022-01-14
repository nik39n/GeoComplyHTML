<?php
class Figure{
    public $square;
    public $color;
    public const SIDES = 'undefined';


    public function infoAbout(){

        return "Это геометрическая фигура!";

    }


}

class Rectangle extends Figure {
    private $a;
    private $b;
    public const SIDES = 4;

    public function __construct($a,$b){
        $this->a = $a;
        $this->b = $b;

    }

    public function getArea(){
        $s = $this->a*$this->b;
        return $s;
    }

    public function infoAbout(){

        return "Это класс прямоугольник. У него ".self::SIDES." стороны";

    }

}

class Triangle extends Figure {
    private $a;
    private $b;
    private $c;
    public const SIDES = 3;

    public function __construct($a,$b,$c){
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    public function getArea(){
        $p = ($this->a+$this->b+$this->c)/2;
        $s = sqrt($p*($p-$this->a)*($p-$this->b)*($p-$this->c));
        return $s;
    }

    public function infoAbout(){

        return "Это класс треугольник. У него ".self::SIDES." стороны";

    }
}

class Square extends Figure {
    private $a;
    public const SIDES = 4;


    public function __construct($a){
        $this->a = $a;
    }

    public function getArea(){
        $s = $this->a**2;
        return $s;
    }

    public function infoAbout(){

        return "Это класс квадрат. У него ".self::SIDES." стороны";

    }
}

$figureOne = new Rectangle(4,6);
$figureTwo = new Rectangle(3,10);

$figureThree = new Triangle(4,8,6);
$figureFour = new Triangle(3,7,5);

$figureFive = new Square(5);
$figureSix = new Square(7);

echo $figureOne->infoAbout();
echo "</br>";
echo "Площадь: ".$figureOne->getArea();
echo "</br>";

echo $figureTwo->infoAbout();
echo "</br>";
echo "Площадь: ".$figureTwo->getArea();
echo "</br>";

echo $figureThree->infoAbout();
echo "</br>";
echo "Площадь: ".$figureThree->getArea();
echo "</br>";

echo $figureFour->infoAbout();
echo "</br>";
echo "Площадь: ".$figureFour->getArea();
echo "</br>";

echo $figureFive->infoAbout();
echo "</br>";
echo "Площадь: ".$figureFive->getArea();
echo "</br>";

echo $figureSix->infoAbout();
echo "</br>";
echo "Площадь: ".$figureSix->getArea();
echo "</br>";
