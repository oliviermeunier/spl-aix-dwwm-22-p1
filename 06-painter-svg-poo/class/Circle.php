<?php 

class Circle extends Shape {

    private int $radius;

    /**
     * Constructeur 
     */
    public function __construct(
        int $x = 0, 
        int $y = 0,
        int $radius = 10, 
        string $color = 'grey', 
        float $opacity = 1) 
    {
        parent::__construct($x, $y, $color, $opacity);
        $this->radius = $radius;
    }

    public function setRadius(int $radius)
    {
        $this->radius = $radius;

        return $this;
    }

    function draw()
    {
        $x = $this->position->getX();
        $y = $this->position->getY();

        return '<circle cx="'.$x.'" cy="'.$y.'" r="'.$this->radius.'" fill="'.$this->color.'" opacity="'.$this->opacity.'" />';
    }
}