<?php


namespace app\components;


use app\base\BaseComponent;
use app\database\FacultiesTable;
use app\model\Faculty;

class FacultiesComponent extends BaseComponent
{
    private $table;

    public function __construct()
    {
        $this->table = new FacultiesTable();
    }

    public function getAll()
    {
        $faculties = $this->table->get("*");

        if (empty($faculties)) {
            return null;
        }
        else {
            return $faculties;
        }
    }

    public function getById($id)
    {
        $faculties = $this->table->get("*", ['id' => $id]);

        if (empty($faculties)) {
            return null;
        }
        else {
            return $faculties[0];
        }
    }

    public function add($name)
    {
        $faculty = new Faculty($name);

        $insert = $this->table->insert($faculty);

        if (!is_array($insert)) {
            return true;
        }
        else {
            var_dump($insert);
        }
    }

    public function edit($id, $name)
    {
        $update = $this->table->update(['name' => $name], ['id' => $id]);

        if (is_array($update)) {
            return $update[0] . " " . $update[2];
        }
        else {
            return true;
        }
    }

    public function delete($id)
    {
        $delete = $this->table->delete(['id' => $id]);

        if (is_array($delete)) {
            return $delete[0] . " " . $delete[2];
        }
        else {
            return true;
        }
    }
}