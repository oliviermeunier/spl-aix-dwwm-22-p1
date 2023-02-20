<?php

class Rectangle {

    // Ici je suis à l'intérieur de la classe

    // 1. Constantes  de classe


    // 2. Propriétés (caractéristiques)

    /**
     * Visibilité : 
     *      public : accessible partout
     *      private : accessible uniquement à l'intérieur de la classe
     */
    private int $x;
    private int $y;
    private int $width;
    private int $height;
    private string $color;
    private float $opacity;

    // 3. Méthodes (actions => fonctions)

    /**
     * Constructeur 
     * Appelé dès la construction de l'objet
     * Souvent utilisé pour initialiser des propriétés
     */
    public function __construct(
        int $x = 0, 
        int $y = 0, 
        int $width = 10, 
        int $height = 5, 
        string $color = 'grey', 
        float $opacity = 1)
    {
        $this->x = $x;
        $this->y = $y;
        $this->width = $width;
        $this->height = $height;
        $this->color = $color;
        $this->opacity = $opacity;
    }

    /**
     * Getters : récupèrent et retournent la valeur des propriétés
     * Setters : prennent une valeur en paramètre et l'affecte à une propriété
     */
    // function getX(): int 
    // {
    //     return $this->x;
    // }

    // function setX(int $x)
    // {   
    //     $this->x = $x;
    // }
    public function setPosition(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;

        return $this;
    }

    public function setSize(int $width, int $height)
    {
        $this->width = $width;
        $this->height = $height;

        return $this;
    }

    public function setFill(string $color, float $opacity)
    {
        $this->color = $color;
        $this->opacity = $opacity;

        return $this;
    }

    function draw()
    {
        return '<rect x="'.$this->x.'" y="'.$this->y.'" width="'.$this->width.'" height="'.$this->height.'" fill="'.$this->color.'" opacity="'.$this->opacity.'" />';
    }
}


// Là je suis à l'extérieur de la classe