<?php
class Model {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly

    public function all() {
        $db = Db::getInstance();
        $req = $db->query(sprintf('SELECT * FROM %s',$this->table));
        return $req->fetchAll();
    }

    public function find($id) {
        $db = Db::getInstance();
        // we make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare(sprintf('SELECT * FROM %s WHERE id = :id',$this->table));
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));
        return $req->fetch();
    }

    public function insert($fieldValues){
        $db = Db::getInstance();
        $sql = sprintf("INSERT INTO %s (".$this->getFieldNames($fieldValues, '').") VALUES(".$this->getFieldNames($fieldValues, ':').")",$this->table);
        $req = $db->prepare($sql);
        $req->execute($fieldValues);
        return $this->FetchById($db->lastInsertId());
    }

    public function update($fieldValues){
        $db = Db::getInstance();
        $updateArray = array();
        foreach($fieldValues as $name => $value){
            $updateArray[] = $name. " = :".$name;
        }
        $sql = sprintf("UPDATE %s set %s where id=:id",$this->table, implode(",",$updateArray));
        $req = $db->prepare($sql);
        $req->execute($fieldValues);
        return $this->FetchById($fieldValues["id"]);
    }

    private function getFieldNames($fieldValues, $pre){
        $fieldNames = array();
        foreach($fieldValues as $fieldName => $value){
            $fieldNames[] = $pre.$fieldName;
        }
        return implode(",",$fieldNames);
    }

    public function delete(){
        $db = Db::getInstance();
        $req = $db->prepare(sprintf('DELETE FROM %s WHERE id = :id',$this->table));
        $req->execute(array("id"=>$this->id));
    }
}