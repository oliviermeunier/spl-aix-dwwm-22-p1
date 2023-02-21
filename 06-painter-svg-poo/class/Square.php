<?php 

class Square extends Shape {

    private int $size;

    /**
     * Constructeur 
     */
    public function __construct(
        int $x = 0, 
        int $y = 0,
        int $size = 10, 
        string $color = 'grey', 
        float $opacity = 1) 
    {
        parent::__construct($x, $y, $color, $opacity);
        $this->size = $size;
    }

    public function setSize(int $size)
    {
        $this->size = $size;

        return $this;
    }

    function draw()
    {
        $x = $this->position->getX();
        $y = $this->position->getY();

        return '<rect x="'.$x.'" y="'.$y.'" width="'.$this->size.'" height="'.$this->size.'" fill="'.$this->color.'" opacity="'.$this->opacity.'" />';
    }
}