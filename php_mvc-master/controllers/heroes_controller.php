<?php
  class HeroesController {

    public function home() {
      require_once('views/heroes/home.php');
    }

    public function error() {
      require_once('views/heroes/error.php');
    }
  }
?>