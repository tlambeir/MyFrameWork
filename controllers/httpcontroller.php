<?php
class httpController {

    public $post;
    public $actionWith;
    public $model;

    /**
     * httpController constructor.
     * @param $actionWith
     */
    function __construct($actionWith) {
        $this->actionWith = $actionWith;
        $this->post = json_decode(file_get_contents("php://input"));;
    }

    /**
     * @return mixed
     */
    public function fetchAll(){
        if(!$this->actionWith){
            $array = $this->model->fetchAll();
        } else {
            $array = $this->model->FetchById($this->actionWith);
        }
        return $array;
    }

    /**
     * @return mixed
     */
    public function save(){
        $model = $this->model->save();
        return $model;
    }

    public function DELETE(){
        $this->model->setId($this->actionWith);
        $this->model->delete();
    }


    public function error()
    {
        require_once('views/error.php');
    }
}