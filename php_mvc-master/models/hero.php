<?php
class Hero {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly

    public $id;
    public $name;
    public $posX;
    public $posY;
    public $imagePath;


    public function __construct($id, $name, $posX, $posY, $imagePath) {
        $this->id      = $id;
        $this->name  = $name;
        $this->posX = $posX;
        $this->posY  = $posY;
        $this->imagePath = $imagePath;
    }

    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM heroes');

        // we create a list of Post objects from the database results
        foreach($req->fetchAll() as $post) {
            $list[] = new Post(
                $post['id'],
                $post['name'],
                $post['posX'],
                $post['posY'],
                $post['author']
            );
        }

        return $list;
    }

    public static function find($id) {
        $db = Db::getInstance();
        // we make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM heroes WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));
        $post = $req->fetch();

        return new Post(
            $post['id'],
            $post['name'],
            $post['posX'],
            $post['posY'],
            $post['author']
        );
    }
}