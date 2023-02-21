<?php

abstract class Shape {

    protected Point $position;
    protected string $color;
    protected float $opacity;

    abstract public function draw();

    public function __construct(
        int $x = 0, 
        int $y = 0, 
        string $color = 'grey', 
        float $opacity = 1)
    {
        $this->position = new Point($x, $y);
        $this->color = $color;
        $this->opacity = $opacity;
    }

    public function setPosition(int $x, int $y)
    {
        $this->position->setXY($x, $y);

        return $this;
    }

    public function setFill(string $color, float $opacity)
    {
        $this->color = $color;
        $this->opacity = $opacity;

        return $this;
    }
}