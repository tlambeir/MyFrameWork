<?php
require_once("model.php");
class Hero extends Model{

    public $id;
    public $name;
    public $posX;
    public $posY;
    public $imagePath;
    /**
     * @var string
     */
    public $table = "heroes";

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

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
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
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
     * @return mixed
     */
    public function getPosX()
    {
        return $this->posX;
    }

    /**
     * @param $posX
     * @return $this
     */
    public function setPosX($posX)
    {
        $this->posX = $posX;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPosY()
    {
        return $this->posY;
    }

    /**
     * @param $posY
     * @return $this
     */
    public function setPosY($posY)
    {
        $this->posY = $posY;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImagePath()
    {
        return $this->imagePath;
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
     * @return array
     */
    public function fetchAll() {
        $list = array();
        // we create a list of Post objects from the database results
        foreach($this->all() as $result) {
            $hero = new hero();
            $hero->setId($result['id'])
                ->setImagePath($result['imagePath'])
                ->setName($result['name'])
                ->setPosY($result['posY'])
                ->setPosX($result['posX']);
            $list[] = $hero;
        }
        return $list;
    }

    /**
     * @param $id
     * @return Hero
     */
    public function FetchById($id) {
        $result = $this->find($id);
        $hero = new hero();
        $hero->setId($result['id'])
            ->setImagePath($result['imagePath'])
            ->setName($result['name'])
            ->setPosY($result['posY'])
            ->setPosX($result['posX']);
        return $hero;
    }

    /**
     * @return mixed
     */
    public function save(){
        if(!$this->id){
            $hero = $this->insert(array(
                "imagePath" => $this->imagePath,
                "name" => $this->name,
                "posX" => $this->posX,
                "posY" => $this->posY
            ));
        } else {
            $hero = $this->update(array(
                "id" => $this->id,
                "imagePath" => $this->imagePath,
                "name" => $this->name,
                "posX" => $this->posX,
                "posY" => $this->posY
            ));
        }
        unset($hero->table);
        return $hero;
    }
}