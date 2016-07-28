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
     * @var int
     */
    public $gridSeperation;

    /**
     * @var string
     */
    public $gridColor;

    /**
     * @var string
     */
    public $gridEnabled;

    /**
     * @param $gridSeperation
     * @return $this
     */
    public function setGridSeperation($gridSeperation)
    {
        $this->gridSeperation = $gridSeperation;
        return $this;
    }

    /**
     * @param $gridColor
     * @return $this
     */
    public function setGridColor($gridColor)
    {
        $this->gridColor = $gridColor;
        return $this;
    }

    /**
     * @param $gridEnabled
     * @return $this
     */
    public function setGridEnabled($gridEnabled)
    {
        $this->gridEnabled = $gridEnabled;
        return $this;
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
                ->setName($result['name'])
                ->setGridColor($result['gridColor'])
                ->setGridEnabled($result['gridEnabled'])
                ->setGridSeperation($result['gridSeperation']);
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
            ->setName($result['name'])
            ->setGridColor($result['gridColor'])
            ->setGridEnabled($result['gridEnabled'])
            ->setGridSeperation($result['gridSeperation']);
        return $map;
    }

    public function save(){
        if(!$this->id){
            $map = $this->insert(array(
                "imagePath" => $this->imagePath,
                "name" => $this->name,
                "gridColor" => $this->gridColor,
                "gridEnabled" => $this->gridEnabled,
                "gridSeperation" => $this->gridSeperation,
            ));
        } else {
            $map = $this->update(array(
                "id" => $this->id,
                "imagePath" => $this->imagePath,
                "name" => $this->name,
                "gridColor" => $this->gridColor,
                "gridEnabled" => $this->gridEnabled,
                "gridSeperation" => $this->gridSeperation,
            ));
        }
        unset($map->table);
        return $map;
    }
}