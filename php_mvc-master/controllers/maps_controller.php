<?php
require_once ("http_controller.php");
  class MapsController extends httpController{

      function __construct($actionWith) {
          parent::__construct($actionWith);
          $this->model = new Map();
      }

      public function GET() {
          $array = $this->fetchAll();
          require_once('views/json.php');
      }

      public function POST() {
          $this->model->setName($this->post->name)
              ->setImagePath($this->post->imagePath);
          $array = $this->save();
          require_once('views/json.php');
      }

      public function PUT() {
          $this->model->setId($this->post->id)
              ->setName($this->post->name)
              ->setImagePath($this->post->imagePath);
          $array = $this->save();
          require_once('views/json.php');
      }
  }