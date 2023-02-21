<?php

class Rectangle extends Shape {

    // Ici je suis à l'intérieur de la classe

    // 1. Constantes  de classe


    // 2. Propriétés (caractéristiques)

    /**
     * Visibilité : 
     *      public : accessible partout
     *      private : accessible uniquement à l'intérieur de la classe
     *      protected : accessible dans la classe et dans les classes enfants (qui en héritent)
     */
    
    private int $width;
    private int $height;

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
        parent::__construct($x, $y, $color, $opacity);
        $this->width = $width;
        $this->height = $height;
    }

    public function setSize(int $width, int $height)
    {
        $this->width = $width;
        $this->height = $height;

        return $this;
    }

    function draw()
    {
        return '<rect x="'.$this->x.'" y="'.$this->y.'" width="'.$this->width.'" height="'.$this->height.'" fill="'.$this->color.'" opacity="'.$this->opacity.'" />';
    }
}


// Là je suis à l'extérieur de la classe