<?php
require_once("model.php");
class Map extends Model{

    /**
     * @var string
     */
    public $table = "maps";

    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $imagePath;


    /**
     * @param $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $imagePath
     * @return $this
     */
    public function setImagePath($imagePath)
    {
        $this->imagePath = $imagePath;
        return $this;
    }

    /**
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return array
     */
    public function fetchAll() {
        $list = array();
        // we create a list of Post objects from the database results
        foreach($this->all() as $result) {
            $map = new Map();
            $map->setId($result['id'])
                ->setImagePath($result['imagePath'])
                ->setName($result['name']);
            $list[] = $map;
        }

        return $list;
    }

    /**
     * @param $id
     * @return Map
     */
    public function FetchById($id) {
        $result = $this->find($id);
        $map = new Map();
        $map->setId($result['id'])
            ->setImagePath($result['imagePath'])
            ->setName($result['name']);
        return $map;
    }

    public function save(){
        if(!$this->id){
            $map = $this->insert(array(
                "imagePath" => $this->imagePath,
                "name" => $this->name
            ));
        } else {
            $map = $this->update(array(
                "id" => $this->id,
                "imagePath" => $this->imagePath,
                "name" => $this->name
            ));
        }
        unset($map->table);
        return $map;
    }
}