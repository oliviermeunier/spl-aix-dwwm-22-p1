<?php

abstract class Shape {

    protected int $x;
    protected int $y;
    protected string $color;
    protected float $opacity;

    abstract public function draw();

    public function __construct(
        int $x = 0, 
        int $y = 0, 
        string $color = 'grey', 
        float $opacity = 1)
    {
        $this->x = $x;
        $this->y = $y;
        $this->color = $color;
        $this->opacity = $opacity;
    }

    public function setPosition(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;

        return $this;
    }

    public function setFill(string $color, float $opacity)
    {
        $this->color = $color;
        $this->opacity = $opacity;

        return $this;
    }
}