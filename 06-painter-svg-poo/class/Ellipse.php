<?php

class Ellipse extends Shape {

    private int $xRadius;
    private int $yRadius;

    /**
     * Constructeur 
     */
    public function __construct(
        int $x = 0, 
        int $y = 0,
        int $xRadius = 10, 
        int $yRadius = 5,
        string $color = 'green', 
        float $opacity = 1) 
    {
        parent::__construct($x, $y, $color, $opacity);
        $this->xRadius = $xRadius;
        $this->yRadius = $yRadius;
    }

    public function setRadius(int $xRadius, int $yRadius)
    {
        $this->xRadius = $xRadius;
        $this->yRadius = $yRadius;

        return $this;
    }

    function draw()
    {
        $x = $this->position->getX();
        $y = $this->position->getY();

        return '<ellipse cx="'.$x.'" cy="'.$y.'" rx="'.$this->xRadius.'" ry="'.$this->yRadius.'" fill="'.$this->color.'" opacity="'.$this->opacity.'" />';
    }
}


// Là je suis à l'extérieur de la classe