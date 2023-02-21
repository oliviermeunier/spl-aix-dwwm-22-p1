<?php 


// Inclusion des dépendances
require 'class/Shape.php';
require 'class/Rectangle.php';
require 'class/Ellipse.php';
require 'class/Square.php';
require 'class/Circle.php';

// function genRectangle(int $x, int $y, int $width, int $height, string $color, float $opacity)
// {
//     return '<rect x="'.$x.'" y="'.$y.'" width="'.$width.'" height="'.$height.'" fill="'.$color.'" opacity="'.$opacity.'" />';
// }

// #1 TRAITEMENTS : création des formes géométriques

$shapes = [];

// Création d'un objet de la classe Rectangle
// Lors de la création d'un objet, c'est le constructeur qui est appelé automatiquement par PHP
$rect1 = new Rectangle(100, 50, 200, 150, 'crimson', 1);
$rect2 = new Rectangle(50, 200, 150, 300, 'green', 0.8);

$rect3 = new Rectangle();
$rect3
    ->setPosition(40, 75)
    ->setSize(80, 120)
    ->setFill('orange', 1);

$ellipse = new Ellipse();
$ellipse
    ->setPosition(500, 198)
    ->setRadius(70,140)
    ->setFill('lightblue', 0.7);

$circle = new Circle();
$circle
    ->setPosition(420, 150)
    ->setRadius(60)
    ->setFill('pink', 1);

// Je stocke mes objets de forme dans un tableau
$shapes[] = $rect1;
$shapes[] = $rect2;
$shapes[] = $rect3;
$shapes[] = $ellipse;
$shapes[] = $circle;

// #2 AFFICHAGE : Rendu SVG
$svg = '';

foreach ($shapes as $shape)
{
    $svg .= $shape->draw(); // $svg = $svg . $shape->draw();
}


// Inclusion du template
include 'index.phtml';