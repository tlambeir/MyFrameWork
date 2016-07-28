<?php
require_once("httpcontroller.php");
class HeroesController extends httpController{

    function __construct($actionWith) {
        parent::__construct($actionWith);
        $this->model = new Hero();
    }

    public function GET() {
        $array = $this->fetchAll();
        require_once('views/json.php');
    }

    public function POST() {
        $this->model->setName($this->post->name)
            ->setImagePath($this->post->imagePath)
            ->setPosX($this->post->posX)
            ->setPosY($this->post->posY);
        $array = $this->save();
        require_once('views/json.php');
    }

    public function PUT() {
        $this->model->setId($this->post->id)
            ->setName($this->post->name)
            ->setImagePath($this->post->imagePath)
            ->setPosX($this->post->posX)
            ->setPosY($this->post->posY);
        $array = $this->save();
        require_once('views/json.php');
    }
}
