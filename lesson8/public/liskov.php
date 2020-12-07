<?php

class Reqtangle
{
    protected $width;
    protected $height;

    public function setWidth($width): void
    {
        $this->width = $width;
    }

    public function setHeight($height): void
    {
        $this->height = $height;
    }

    public function calc()
    {
        return $this->height * $this->width;
    }
}

class Scware extends Reqtangle
{
    public function setWidth($width): void
    {
        $this->width = $width;
        $this->height = $width;
    }

    public function setHeight($height): void
    {
        $this->height = $height;
        $this->width = $height;
    }
}

$figure  = new Scware();
$figure->setHeight(4);
$figure->setWidth(5);
echo $figure->calc();
