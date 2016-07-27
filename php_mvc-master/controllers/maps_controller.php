<?php
  class MapsController {

      private $actionWith;

      public function __construct($actionWith) {
          $this->actionWith = $actionWith;
      }

    public function GET() {
        // we store all the maps in a variable
        $map = new Map();
        $maps = array();
        if(!$this->actionWith){
            $maps = $map->fetchAll();
        } else {
            $maps[] = $map->FetchById($this->actionWith);
        }
        require_once('views/maps/json.php');
    }

      public function POST() {
          // we store all the maps in a variable
          $post = json_decode(file_get_contents("php://input"));
          $map = new Map();
          $map->setName($post->name)
              ->setImagePath($post->imagePath);
          $maps = array();
          $map = $map->save();
          unset($map->table);
          $maps[] = $map;
          require_once('views/maps/json.php');
      }

      public function PUT() {
          // we store all the maps in a variable
          $post = json_decode(file_get_contents("php://input"));
          $map = new Map();
          $map->setId($post->id)
              ->setName($post->name)
              ->setImagePath($post->imagePath);
          $maps = array();
          $map = $map->save();
          unset($map->table);
          $maps[] = $map;
          require_once('views/maps/json.php');
      }

      public function DELETE(){
          $map = new Map();
          $map->setId($this->actionWith);
          $map->delete();
      }
  }
?>