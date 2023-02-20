<?php 


// Inclusion des dépendances
require 'class/Rectangle.php';


// function genRectangle(int $x, int $y, int $width, int $height, string $color, float $opacity)
// {
//     return '<rect x="'.$x.'" y="'.$y.'" width="'.$width.'" height="'.$height.'" fill="'.$color.'" opacity="'.$opacity.'" />';
// }

// #1 TRAITEMENTS : création des formes géométriques

// Création d'un objet de la classe Rectangle
// Lors de la création d'un objet, c'est le constructeur qui est appelé automatiquement par PHP
$rect1 = new Rectangle(100, 50, 200, 150, 'crimson', 1);
$rect2 = new Rectangle(50, 200, 150, 300, 'green', 0.8);

$rect3 = new Rectangle();
$rect3
    ->setPosition(40, 75)
    ->setSize(80, 120)
    ->setFill('orange', 1);

// #2 AFFICHAGE : Rendu SVG
$svg = '';
$svg .= $rect1->draw(); // équivaut à : $svg = $svg . $rect1->draw();
$svg .= $rect2->draw();
$svg .= $rect3->draw();


// Inclusion du template
include 'index.phtml';