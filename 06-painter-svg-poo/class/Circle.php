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
        return '<circle cx="'.$this->x.'" cy="'.$this->y.'" rx="'.$this->radius.'" ry="'.$this->radius.'" fill="'.$this->color.'" opacity="'.$this->opacity.'" />';
    }
}